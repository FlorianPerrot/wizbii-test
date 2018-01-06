<?php
/**
 * User: Florian Perrot
 * Date: 04/01/18
 * Time: 19:04
 */

namespace App\Controller\Api;

use App\Event\CollectEvent;
use App\KernelEvents;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ApiController
 * @package App\Controller
 */
class DefaultApiController extends Controller
{

    /**
     * Collect tracking information
     * @param Request $request
     * @param EventDispatcherInterface $eventDispatcher
     * @return Response
     */
    public function collect(Request $request, EventDispatcherInterface $eventDispatcher)
    {
        /** @var DocumentManager $dm */
        $dm = $this->get('doctrine.odm.mongodb.document_manager');

        $events = [];
        if ($request->getMethod() == Request::METHOD_GET) {
            $event = new CollectEvent($request->query->all());
            $eventDispatcher->dispatch(KernelEvents::COLLECT, $event);
            $events[] = $event;
        }
        else if ($request->getMethod() == Request::METHOD_POST) {
            foreach ($request->request as $bag) {
                $event = new CollectEvent($bag);
                $eventDispatcher->dispatch(KernelEvents::COLLECT, $event);
                $events[] = $event;
            }
        }

        $json_response = ['status' => 'OK'];
        foreach ($events as $event) {
            /** @var CollectEvent $event */
            if (!empty($event->getViolations())) {
                $json_response['errors'][] = [
                    'target' => $request->query->all(),
                    'violations' => $event->getViolations()->count()
                ];
            }
            else {
                $dm->persist($event->getTracking());
            }
        }

        if (!empty($json_response['errors'])) {
            $json_response['status'] = 'KO';
        }

        $dm->flush();

        return new JsonResponse($json_response);
    }

}