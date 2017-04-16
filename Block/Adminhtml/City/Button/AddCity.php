<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace TripFuser\MageSample\Block\Adminhtml\City\Button;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class AddCity
 * @package TripFuser\MageSample\Block\Adminhtml\City\Button
 */
class AddCity implements ButtonProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function getButtonData()
    {
        return [
            'label' => __('Add City'),
            'class' => 'primary',
            'id' => 'addCity',
            'on_click' => '',
            'sort_order' => 20
        ];
    }
}