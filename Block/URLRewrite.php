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
class URLRewrite extends \Magento\Framework\View\Element\Template
{
    public function __construct(\Magento\Framework\View\Element\Template\Context $context)
    {
        parent::__construct($context);
    }

    public function Result() {
        return __("URL Rewrite");
    }
}
