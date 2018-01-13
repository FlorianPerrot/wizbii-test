<?php
/**
 * User: Florian Perrot
 * Date: 04/01/18
 * Time: 19:04
 */

namespace App\Controller\Api;

use App\Event\CollectEvent;
use App\KernelEvents;
use Symfony\Bridge\Doctrine\ManagerRegistry;
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
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var \Symfony\Bridge\Doctrine\ManagerRegistry
     */
    private $mr;

    /**
     * DefaultApiController constructor.
     *
     * @param EventDispatcherInterface $eventDispatcher
     * @param ManagerRegistry $mr
     */
    public function __construct(EventDispatcherInterface $eventDispatcher, ManagerRegistry $mr)
    {
        $this->eventDispatcher = $eventDispatcher;
        $this->mr = $mr;
    }


    /**
     * Collect tracking information
     * @param Request $request
     * @return Response
     */
    public function collect(Request $request)
    {
        /** @var DocumentManager $dm */
        $dm = $this->mr->getManager();

        if ($request->getMethod() == Request::METHOD_GET) {
            $data = $request->query->all();
        }
        elseif ($request->getMethod() == Request::METHOD_POST) {
            $data = $request->request->all();
        }

        $events = $this->processData($data, $request->getMethod() == Request::METHOD_POST);

        $json_response = ['status' => 'KO'];
        foreach ($events as $event) {
            $nbErrors = count($event->getViolations());
            if ($nbErrors > 0) {
                $json_response['errors'][] = [
                    'target' => $request->query->all(),
                    'violations' => $event->getViolations()->count()
                ];
            }
            else $dm->persist($event->getTracking());
        }

        if (!empty($events) && empty($json_response['errors'])) {
            $json_response['status'] = 'OK';
        }

        $dm->flush();

        return new JsonResponse($json_response);
    }


    /**
     * @param $data
     * @param boolean $multiple
     * @return CollectEvent[]
     */
    private function processData($data, $multiple)
    {
        $events = [];
        if ($multiple) {
            foreach ($data as $item) {
                $events[] = new CollectEvent($item);
            }
        }
        else {
            $events[] = new CollectEvent($data);
        }

        foreach ($events as $event) {
            $this->eventDispatcher->dispatch(KernelEvents::COLLECT, $event);
        }

        return $events;
    }
}