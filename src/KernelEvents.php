<?php
/**
 * User: Florian Perrot
 * Date: 06/01/18
 * Time: 16:39
 */

namespace App;


class KernelEvents
{

    /**
     * COLLECT tracking item
     * @Event("App\Event\CollectEvent")
     */
    const COLLECT = 'app.collect';
}