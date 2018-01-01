<?php
namespace TripFuser\MageSample\Block\Widget;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class Sample extends Template implements BlockInterface {

    protected $_template = "widget/sample.phtml";

    public function getSampleValue() {
        return __("Sample Value");
    }

}