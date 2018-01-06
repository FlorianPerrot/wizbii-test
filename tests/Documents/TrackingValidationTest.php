<?php
/**
 * User: Florian Perrot
 * Date: 04/01/18
 * Time: 19:22
 */

namespace App\Tests\Documents;

use App\Document\Tracking;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class TrackingTest
 * @package App\Tests\Documents
 */
class TrackingValidationTest extends KernelTestCase
{

    /**
     * @var ValidatorInterface
     */
    private $validator;

    public function testValidTracking()
    {
        $tracking = new Tracking();
        $tracking->set('version', 1);
        $tracking->set('hit_type', 'pageview');
        $tracking->set('wizbii_creator_type', 'profile');
        $tracking->set('wizbii_user_id', 'test-user');
        $tracking->set('wizbii_user_uuid', '38b728b0e0b4f594760d4b3e58797ae1');
        $tracking->set('tracking_id', 'UA-1234-1');
        $tracking->set('data_source', 'apps');
        $tracking->set('application_name', 'WizbiiStudentAndroid');

        $violations = $this->validator->validate($tracking);
        $this->assertEquals(0, count($violations));
    }

    public function testFormatTrackingId()
    {
        $tracking = new Tracking();

        $tracking->set('tracking_id', 'INVALID-FORMAT');
        $violations = $this->validator->validate($tracking);
        $this->assertTrue($this->searchErrorOn('tracking_id', $violations));

        $tracking->set('tracking_id', 'UA-1234-1');
        $violations = $this->validator->validate($tracking);
        $this->assertfalse($this->searchErrorOn('tracking_id', $violations));
    }

    private function searchErrorOn($propertyPath, $violations)
    {
        /** @var ConstraintViolation $violation */
        foreach ($violations as $violation) {
            if ($violation->getPropertyPath() == $propertyPath) return TRUE;
        }
        return FALSE;
    }

    public function setUp()
    {
        $kernel = self::bootKernel();
        $this->validator = $kernel->getContainer()->get('validator');
    }
}