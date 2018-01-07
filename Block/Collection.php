<?php
/**
 * Copyright © 2016 TripFuser. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace TripFuser\MageSample\Block;

/**
 * Class Collection
 * @package TripFuser\MageSample\Block
 */
class Collection extends \Magento\Framework\View\Element\Template
{
    protected $_productCollectionFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory
    )
    {
        $this->_productCollectionFactory = $productCollectionFactory;
        parent::__construct($context);
    }

    public function getProductCollection() {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->setPageSize(3); // fetching only 3 products
        return $collection;
    }
}
