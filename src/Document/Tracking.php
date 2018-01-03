<?php

namespace App\Document;

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
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param mixed $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * @return mixed
     */
    public function getTrackingId()
    {
        return $this->tracking_id;
    }

    /**
     * @param mixed $tracking_id
     */
    public function setTrackingId($tracking_id)
    {
        $this->tracking_id = $tracking_id;
    }

    /**
     * @return mixed
     */
    public function getDataSource()
    {
        return $this->data_source;
    }

    /**
     * @param mixed $data_source
     */
    public function setDataSource($data_source)
    {
        $this->data_source = $data_source;
    }

    /**
     * @return mixed
     */
    public function getQueueTime()
    {
        return $this->queue_time;
    }

    /**
     * @param mixed $queue_time
     */
    public function setQueueTime($queue_time)
    {
        $this->queue_time = $queue_time;
    }

    /**
     * @return mixed
     */
    public function getCacheBurster()
    {
        return $this->cache_burster;
    }

    /**
     * @param mixed $cache_burster
     */
    public function setCacheBurster($cache_burster)
    {
        $this->cache_burster = $cache_burster;
    }

    /**
     * @return mixed
     */
    public function getHitType()
    {
        return $this->hit_type;
    }

    /**
     * @param mixed $hit_type
     */
    public function setHitType($hit_type)
    {
        $this->hit_type = $hit_type;
    }

    /**
     * @return mixed
     */
    public function getDocumentLocation()
    {
        return $this->document_location;
    }

    /**
     * @param mixed $document_location
     */
    public function setDocumentLocation($document_location)
    {
        $this->document_location = $document_location;
    }

    /**
     * @return mixed
     */
    public function getDocumentReferer()
    {
        return $this->document_referer;
    }

    /**
     * @param mixed $document_referer
     */
    public function setDocumentReferer($document_referer)
    {
        $this->document_referer = $document_referer;
    }

    /**
     * @return mixed
     */
    public function getScreenName()
    {
        return $this->screen_name;
    }

    /**
     * @param mixed $screen_name
     */
    public function setScreenName($screen_name)
    {
        $this->screen_name = $screen_name;
    }

    /**
     * @return mixed
     */
    public function getWizbiiCreatorType()
    {
        return $this->wizbii_creator_type;
    }

    /**
     * @param mixed $wizbii_creator_type
     */
    public function setWizbiiCreatorType($wizbii_creator_type)
    {
        $this->wizbii_creator_type = $wizbii_creator_type;
    }

    /**
     * @return mixed
     */
    public function getWizbiiUserId()
    {
        return $this->wizbii_user_id;
    }

    /**
     * @param mixed $wizbii_user_id
     */
    public function setWizbiiUserId($wizbii_user_id)
    {
        $this->wizbii_user_id = $wizbii_user_id;
    }

    /**
     * @return mixed
     */
    public function getWizbiiUserUui()
    {
        return $this->wizbii_user_uui;
    }

    /**
     * @param mixed $wizbii_user_uui
     */
    public function setWizbiiUserUui($wizbii_user_uui)
    {
        $this->wizbii_user_uui = $wizbii_user_uui;
    }

    /**
     * @return mixed
     */
    public function getEventCategory()
    {
        return $this->event_category;
    }

    /**
     * @param mixed $event_category
     */
    public function setEventCategory($event_category)
    {
        $this->event_category = $event_category;
    }

    /**
     * @return mixed
     */
    public function getEventAction()
    {
        return $this->event_action;
    }

    /**
     * @param mixed $event_action
     */
    public function setEventAction($event_action)
    {
        $this->event_action = $event_action;
    }

    /**
     * @return mixed
     */
    public function getEventLabel()
    {
        return $this->event_label;
    }

    /**
     * @param mixed $event_label
     */
    public function setEventLabel($event_label)
    {
        $this->event_label = $event_label;
    }

    /**
     * @return mixed
     */
    public function getEventValue()
    {
        return $this->event_value;
    }

    /**
     * @param mixed $event_value
     */
    public function setEventValue($event_value)
    {
        $this->event_value = $event_value;
    }

    /**
     * @return mixed
     */
    public function getCampaignName()
    {
        return $this->campaign_name;
    }

    /**
     * @param mixed $campaign_name
     */
    public function setCampaignName($campaign_name)
    {
        $this->campaign_name = $campaign_name;
    }

    /**
     * @return mixed
     */
    public function getCampaignSource()
    {
        return $this->campaign_source;
    }

    /**
     * @param mixed $campaign_source
     */
    public function setCampaignSource($campaign_source)
    {
        $this->campaign_source = $campaign_source;
    }

    /**
     * @return mixed
     */
    public function getCampaignMedium()
    {
        return $this->campaign_medium;
    }

    /**
     * @param mixed $campaign_medium
     */
    public function setCampaignMedium($campaign_medium)
    {
        $this->campaign_medium = $campaign_medium;
    }

    /**
     * @return mixed
     */
    public function getCampaignKeyword()
    {
        return $this->campaign_keyword;
    }

    /**
     * @param mixed $campaign_keyword
     */
    public function setCampaignKeyword($campaign_keyword)
    {
        $this->campaign_keyword = $campaign_keyword;
    }

    /**
     * @return mixed
     */
    public function getCampaignContent()
    {
        return $this->campaign_content;
    }

    /**
     * @param mixed $campaign_content
     */
    public function setCampaignContent($campaign_content)
    {
        $this->campaign_content = $campaign_content;
    }

    /**
     * @return mixed
     */
    public function getApplicationName()
    {
        return $this->application_name;
    }

    /**
     * @param mixed $application_name
     */
    public function setApplicationName($application_name)
    {
        $this->application_name = $application_name;
    }

    /**
     * @return mixed
     */
    public function getApplicationVersion()
    {
        return $this->application_version;
    }

    /**
     * @param mixed $application_version
     */
    public function setApplicationVersion($application_version)
    {
        $this->application_version = $application_version;
    }
}