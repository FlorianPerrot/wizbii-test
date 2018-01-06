<?php
/**
 * User: Florian Perrot
 * Date: 04/01/18
 * Time: 19:06
 */

namespace App\Controller;

use App\Document\Tracking;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator;

/**
 * Class DefaultController
 * @package App\Controller
 */
class DefaultController extends Controller
{

    /**
     * Index - redirect to wizbii doc
     * @return Response
     */
    public function index()
    {
        return new RedirectResponse('https://analytics.wizbii.com/doc.html');
    }

}