<?php

namespace App\Document;

use App\Exception\InvalidPropertyException;
use Symfony\Component\Routing\Exception\InvalidParameterException;

class Tracking
{
    private $id;

    //General
    private $version;
    private $tracking_id;
    private $data_source;
    private $queue_time;
    private $cache_burster;

    //Hit Type
    private $hit_type;

    //Content Information
    private $document_location;
    private $document_referer;
    private $screen_name;

    //Wizbii - User
    private $wizbii_creator_type;
    private $wizbii_user_id;
    private $wizbii_user_uui;

    //Event Tracking
    private $event_category;
    private $event_action;
    private $event_label;
    private $event_value;

    //Traffic Sources
    private $campaign_name;
    private $campaign_source;
    private $campaign_medium;
    private $campaign_keyword;
    private $campaign_content;

    //App Type
    private $application_name;
    private $application_version;

    /**
     * @param string $name
     * @return mixed
     */
    public function get($name)
    {
        return $this->$name;
    }


    /**
     * @param string $name
     * @param mixed $value
     * @return $this
     */
    public function set($name, $value)
    {
        $this->$name = $value;
        return $this;
    }
}