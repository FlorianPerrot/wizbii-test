<?php

namespace App\EventSubscriber;

use App\Event\CollectEvent;
use App\Mapping\TrackingMapping;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class CollectSubscriber
 * @package App\EventSubscriber
 */
class CollectSubscriber implements EventSubscriberInterface
{

    /**
     * @var TrackingMapping
     */
    private $trackingMapping;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * CollectSubscriber constructor.
     * @param TrackingMapping $trackingMapping
     * @param ValidatorInterface $validator
     */
    public function __construct(TrackingMapping $trackingMapping, ValidatorInterface $validator)
    {
        $this->trackingMapping = $trackingMapping;
        $this->validator = $validator;
    }


    /**
     * @param CollectEvent $event
     */
    public function onAppCollect(CollectEvent $event)
    {
        $data = $event->getData();
        $tracking = $this->trackingMapping->denormalize($data);
        $violations = $this->validator->validate($tracking);
        $event->setViolations($violations);
        $event->setTracking($tracking);
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
           'app.collect' => 'onAppCollect',
        ];
    }
}
