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

    /**
     * @var DocumentManager $dm
     */
    private $dm;

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

    public function testInvalidPostApiController()
    {
        $client = static::createClient();
        $trackingRepo = $this->dm->getRepository('App:Tracking');
        $nbTrackingItem = count($trackingRepo->findAll());

        $client->request('POST', '/collect', [
            [
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
            ]
        ]);

        //Status code ok
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        //Tracking element not insert
        $this->assertEquals(count($trackingRepo->findAll()), $nbTrackingItem);
    }

    public function testValidPostApiController()
    {
        $client = static::createClient();
        $trackingRepo = $this->dm->getRepository('App:Tracking');
        $nbTrackingItem = count($trackingRepo->findAll());

        $client->request('POST', '/collect', [
            [
                't'    => 'pageview',
                'dl'   => 'http://www.wizbii.com/bar',
                'ec'   => 'adc',
                'el'   => 'client',
                'ea'   => 'Click Masthead',
                'ds'   => 'web',
                'cn'   => 'bpce',
                'cs'   => 'wizbii',
                'cm'   => 'web',
                'ck'   => 'erasmus',
                'cc'   => 'foobar',
                'v'    => '1',
                'wui'  => 'test1',
                'wuui' => 'test',
                'tid'  => 'UA-1234-1'
            ],
            [
                't'    => 'pageview',
                'dl'   => 'http://www.wizbii.com/bar',
                'ec'   => 'adc',
                'el'   => 'client',
                'ea'   => 'Click Masthead',
                'ds'   => 'web',
                'cn'   => 'bpce',
                'cs'   => 'wizbii',
                'cm'   => 'web',
                'ck'   => 'erasmus',
                'cc'   => 'foobar',
                'v'    => '1',
                'wui'  => 'test2',
                'wuui' => 'test2',
                'tid'  => 'UA-2345-1'
            ]
        ]);

        //Status code ok
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        //Two tracking elements insert
        $this->assertEquals(count($trackingRepo->findAll()), $nbTrackingItem + 2);
    }

    public function setUp()
    {
        $kernel = self::bootKernel();
        $this->dm = $kernel->getContainer()->get('doctrine_mongodb')->getManager();
    }
}