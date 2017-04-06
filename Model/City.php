<?php
namespace TripFuser\MageSample\Model;

use Magento\Framework\Model\AbstractModel;
use TripFuser\MageSample\Api\Data\CityInterface;

class City extends AbstractModel implements CityInterface
{

    /**
     * Initialize Core Place Model
     *
     * @return void
     */
    protected function _construct() {
        /* _init($resourceModel) */
        $this->_init('TripFuser\MageSample\Model\ResourceModel\City');
    }

    /**
     * Get Place entity 'place_id' value
     *
     * @api
     * @return int|null
     */
    public function getId() {
        return $this->getData(self::ID);
    }

    /**
     * Set Place entity 'place_id' value
     *
     * @api
     * @param int $value
     * @return $this
     */
    public function setId($value) {
        return $this->setData(self::ID, $value);
    }

    /**
     * Get Place entity 'city_id' value
     *
     * @api
     * @return int|null
     */
    public function getCityId() {
        return $this->getData(self::CITY_ID);
    }

    /**
     * Set Place entity 'city_id' value
     *
     * @api
     * @param int $value
     * @return $this
     */
    public function setCityId($value) {
        return $this->setData(self::CITY_ID, $value);
    }

    /**
     * Get Place entity 'name' value
     *
     * @api
     * @return string|null
     */
    public function getName() {
        return $this->getData(self::NAME);
    }

    /**
     * Set Place entity 'name' value
     *
     * @api
     * @param string $value
     * @return $this
     */
    public function setName($value) {
        return $this->setData(self::NAME, $value);
    }

    /**
     * Get Place entity 'location' value
     *
     * @api
     * @return string|null
     */
    public function getLocation() {
        return $this->getData(self::LOCATION);
    }

    /**
     * Set Place entity 'location' value
     *
     * @api
     * @param string $value
     * @return $this
     */
    public function setLocation($value) {
        return $this->setData(self::LOCATION, $value);
    }

    /**
     * Get Place entity 'name' value
     *
     * @api
     * @return string|null
     */
    public function getCountryName() {
        return $this->getData(self::COUNTRY_NAME);
    }

    /**
     * Set Place entity 'name' value
     *
     * @api
     * @param string $value
     * @return $this
     */
    public function setCountryName($value) {
        return $this->setData(self::COUNTRY_NAME, $value);
    }
}