<?php
/**
 * User: Florian Perrot
 * Date: 06/01/18
 * Time: 15:58
 */

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultApiControllerTest extends WebTestCase
{
    public function testGetApiController()
    {
        $client = static::createClient();
        $client->request('GET', '/collect', [
            't'  => 'pageview',
            'dl' => 'http://www.wizbii.com/bar',
            'ec' => 'adc',
            'el' => 'client',
            'ea' => 'Click Masthead',
            'ds' => 'web',
            'cn' => 'bpce',
            'cs' => 'wizbii',
            'cm' => 'web',
            'ck' => 'erasmus',
            'cc' => 'foobar'
        ]);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}