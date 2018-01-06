<?php
/**
 * User: Florian Perrot
 * Date: 06/01/18
 * Time: 17:46
 */

namespace App\Mapping;


use App\Document\Tracking;

class TrackingMapping
{

    /**
     * @var array
     */
    private $mapping;

    /**
     * TrackingMapping constructor.
     * @param array $mapping
     */
    public function __construct(array $mapping)
    {
        $this->mapping = $mapping;
    }


    /**
     * WIP
     * @param Tracking $tracking
     * @return array
     */
    public function normalize(Tracking $tracking)
    {
        $data = [];
        foreach ($this->getAvailablesFields() as $field) {
            $value = $tracking->get($field);
            if (!empty($value)) {
                $data[$this->mapping[$field]] = $value;
            }
        }
        return $data;
    }

    /**
     * @param array $data
     * @return Tracking
     */
    public function denormalize(array $data)
    {
        $tracking = new Tracking();
        $available_keys = $this->getAvailableQuerys();
        foreach ($data as $key => $value) {
            if (in_array($key, $available_keys)) {
                $tracking->set(array_search($key, $this->mapping), $value);
            }
        }
        return $tracking;
    }

    /**
     * @return array
     */
    private function getAvailablesFields()
    {
        return array_keys($this->mapping);
    }

    /**
     * @return array
     */
    private function getAvailableQuerys()
    {
        return array_values($this->mapping);
    }
}