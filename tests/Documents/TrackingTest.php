<?php
/**
 * User: Florian Perrot
 * Date: 04/01/18
 * Time: 19:22
 */

namespace App\Tests\Documents;

use App\Document\Tracking;
use PHPUnit\Framework\TestCase;

/**
 * Class TrackingTest
 * @package App\Tests\Documents
 */
class TrackingTest extends TestCase
{

    public function testSetProperty()
    {
        $trakingItem = new Tracking();
        $trakingItem->set('version', 5);

        $this->assertEquals($trakingItem->get('version'), 5);
    }

}