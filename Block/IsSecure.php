<?php
/**
 * Copyright © 2016 TripFuser. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace TripFuser\MageSample\Block;

/**
 * Class URLRewrite
 * @package TripFuser\MageSample\Block
 */
class IsSecure extends \Magento\Framework\View\Element\Template
{
    protected $_storeManager;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    )
    {
        $this->_storeManager = $storeManager;
        parent::__construct($context);
    }


    public function isFrontUrlSecure()
    {
        return $this->_storeManager->getStore()->isFrontUrlSecure();
    }

    public function isCurrentlySecure()
    {
        return $this->_storeManager->getStore()->isCurrentlySecure();
    }
}
