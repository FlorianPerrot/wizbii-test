<?php
/**
 * User: Florian Perrot
 * Date: 06/01/18
 * Time: 18:49
 */

namespace App\Tests\Mapping;


use App\Document\Tracking;
use App\Mapping\TrackingMapping;
use PHPUnit\Framework\TestCase;

class TrackingMappingTest extends TestCase
{

    public function testCorrectMapping()
    {
        $mapping = new TrackingMapping([
            'version' => 'v',
            'screen_name' => 'sn'
        ]);

        $tracking = new Tracking();
        $tracking->set('version', 1);
        $this->assertEquals($mapping->denormalize(['v' => 1]), $tracking);

        $tracking->set('screen_name', 'test');
        $this->assertEquals($mapping->normalize($tracking), ['v' => 1, 'sn' => 'test']);
    }

    public function testInvalidMapping()
    {
        $mapping = new TrackingMapping([
            'version' => 'v',
            'screen_name' => 'sn'
        ]);

        $tracking = new Tracking();
        $tracking->set('invalid fields', 1);
        $this->assertEquals($mapping->normalize($tracking), []);

        $tracking = new Tracking();
        $this->assertEquals($mapping->denormalize(['invalid query' => 1]), $tracking);
    }
}