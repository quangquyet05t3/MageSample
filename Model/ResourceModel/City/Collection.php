<?php

namespace TripFuser\MageSample\Model\ResourceModel\City;
/**
 * Core city collection
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define resource model and model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('TripFuser\MageSample\Model\City', 'TripFuser\MageSample\Model\ResourceModel\City');
    }

    /**
     * @return $this|void
     */
    protected function _initSelect()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        /** @var \Magento\Backend\Model\Auth\Session $user */
        parent::_initSelect();

        $this->getSelect()
            ->limit(10);
        return $this;
    }
}