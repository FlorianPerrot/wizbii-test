<?php
/**
 * User: Florian Perrot
 * Date: 04/01/18
 * Time: 19:06
 */

namespace App\Controller;

use App\Document\Tracking;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 * @package App\Controller
 */
class DefaultController extends Controller
{

    /**
     * Index - test only
     * TODO: Create welcome page
     * @return Response
     */
    public function index()
    {
        $tra = new Tracking();
        $tra->set('version', 1);

        /** @var Doctrine\ODM\MongoDB\DocumentManager $dm */
        $dm = $this->get('doctrine_mongodb')->getManager();

        $dm->persist($tra);
        $dm->flush();

        return new Response('INDEX', 200);
    }

}