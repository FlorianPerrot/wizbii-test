<?php
/**
 * User: Florian Perrot
 * Date: 04/01/18
 * Time: 19:04
 */

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ApiController
 * @package App\Controller
 */
class DefaultApiController extends Controller
{

    /**
     * Collect tracking information
     * @return Response
     */
    public function collect()
    {
        return new Response('COLLECT PATH', 200);
    }

}