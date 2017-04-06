<?php
namespace TripFuser\MageSample\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Core City resource
 */
class City extends AbstractDb
{
    /**
     * Define main table
     *
     * @return void
     */
    protected function _construct() {
        /* _init($mainTable, $idFieldName) */
        $this->_init('tripfuser_country_region_city', 'city_id');
    }
}