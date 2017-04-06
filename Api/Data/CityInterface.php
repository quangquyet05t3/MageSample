<?php
namespace TripFuser\MageSample\Api\Data;
/**
 * @api
 */
interface CityInterface
{
    const ID = 'city_id';
    const CITY_ID = 'city_id';
    const NAME = 'default_name';
    const LOCATION  = 'location';
    const REGION_ID = 'city_id';
    const COUNTRY_ID = 'country_id';
    const COUNTRY_NAME = 'country_name';

    /**
     * Get Place entity 'place_id' value
     * @return int|null
     */
    public function getId();

    /**
     * Set Place entity 'place_id' value
     * @param int $value
     * @return $this
     */
    public function setId($value);

    /**
     * Get Place entity 'city_id' value
     * @return int|null
     */
    public function getCityId();

    /**
     * Set Place entity 'city_id' value
     * @param int $value
     * @return $this
     */
    public function setCityId($value);

    /**
     * Get Place entity 'name' value
     * @return string|null
     */
    public function getName();

    /**
     * Set Place entity 'name' value
     * @param string $value
     * @return $this
     */
    public function setName($value);

    /**
     * Get Place entity 'location' value
     * @return string|null
     */
    public function getLocation();

    /**
     * Set Place entity 'location' value
     * @param string $value
     * @return $this
     */
    public function setLocation($value);


    /**
     * Get Place entity 'name' value
     * @return string|null
     */
    public function getCountryName();

    /**
     * Set Place entity 'name' value
     * @param string $value
     * @return $this
     */
    public function setCountryName($value);





}