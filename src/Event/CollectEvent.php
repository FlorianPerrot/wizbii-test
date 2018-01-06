<?php
/**
 * User: Florian Perrot
 * Date: 06/01/18
 * Time: 16:40
 */

namespace App\Event;

use App\Document\Tracking;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class CollectEvent
 * @package App\Event
 */
class CollectEvent extends Event
{

    /**
     * @var array
     */
    private $data;

    /**
     * @var Tracking
     */
    private $tracking;

    /**
     * CollectEvent constructor.
     * @param array $data
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->tracking = new Tracking();
    }

    /**
     * @return Tracking
     */
    public function getTracking(): Tracking
    {
        return $this->tracking;
    }

    /**
     * @param Tracking $tracking
     */
    public function setTracking(Tracking $tracking)
    {
        $this->tracking = $tracking;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }
}