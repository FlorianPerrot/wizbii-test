<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class CollectSubscriber implements EventSubscriberInterface
{
    public function onAppCollect($event)
    {
        // ...
    }

    public static function getSubscribedEvents()
    {
        return [
           'app.collect' => 'onAppCollect',
        ];
    }
}
