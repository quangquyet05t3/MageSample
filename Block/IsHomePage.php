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
class IsHomePage extends \Magento\Framework\View\Element\Template
{
    protected $_logo;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Theme\Block\Html\Header\Logo $logo
    )
    {
        $this->_logo = $logo;
        parent::__construct($context);
    }

    public function isHomePage() {
        return $this->_logo->isHomePage();
    }
}
