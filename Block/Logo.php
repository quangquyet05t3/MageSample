<?php
/**
 * Copyright © 2016 TripFuser. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace TripFuser\MageSample\Block;

/**
 * Class Logo
 * @package TripFuser\MageSample\Block
 */
class Logo extends \Magento\Framework\View\Element\Template
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

    /**
     * Get logo image URL
     *
     * @return string
     */
    public function getLogoSrc()
    {
        return $this->_logo->getLogoSrc();
    }

    /**
     * Get logo text
     *
     * @return string
     */
    public function getLogoAlt()
    {
        return $this->_logo->getLogoAlt();
    }

    /**
     * Get logo width
     *
     * @return int
     */
    public function getLogoWidth()
    {
        return $this->_logo->getLogoWidth();
    }

    /**
     * Get logo height
     *
     * @return int
     */
    public function getLogoHeight()
    {
        return $this->_logo->getLogoHeight();
    }
}
