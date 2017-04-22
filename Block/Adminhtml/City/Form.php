<?php
namespace TripFuser\MageSample\Block\Adminhtml\City;

use \Magento\Backend\Block\Widget\Form\Generic;
class Form extends Generic
{
    protected $countryFactory;
    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Directory\Model\CountryFactory $countryFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Directory\Model\CountryFactory $countryFactory,
        array $data = []
    ) {
        parent::__construct($context, $registry, $formFactory, $data);
        $this->countryFactory = $countryFactory;
    }

    protected function _prepareForm()
    {
        // Read model from Registry


        // Set form data
        $this->setData('action', $this->getUrl('magesample/city/save'));
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create(
            [
                'data' => [
                    'id' => 'city-form',
                    'method' => 'post',
                    'action' => $this->getData('action')
                ]
            ]
        );

        //Case edit
        /*if ($model->getId()) {
            $fieldset->addField('city_id', 'hidden', ['name' => 'city_id']);
        }*/

        $listCountry = $this->getListCountry();
        $elements[] = $form->addField('country_id', 'select', array (
            'label' => __('Country'),
            'name' => 'country_id',
            'id' => 'country_id',
            'values' => $listCountry
        ));

        $elements[] = $form->addField('region_id', 'select', array (
            'label' => __('Region'),
            'name' => 'region_id',
            'id' => 'region_id'
        ));

        $elements[] = $form->addField(
            'default_name',
            'text',
            ['name' => 'default_name', 'label' => __('City Name'), 'title' => __('City Name'), 'required' => true]
        );

        $elements[] = $form->addField(
            'location',
            'text',
            ['name' => 'location', 'label' => __('Location'), 'title' => __('Location'), 'required' => true]
        );

        $elements[] = $form->addField(
            'callback-url',
            'hidden',
            ['value' => $this->getUrl('magesample/city/callback')]
        );

        foreach ($elements as $element) {
            $form->addElementToCollection($element);
        }

        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    }

    private function getListCountry() {
        $countryFactory = $this->countryFactory->create();
        $list = $countryFactory->getCollection()->toOptionArray();
        $list[0] = ['value' => '', 'label' => __('-- Please Select --')];
        return $list;
    }


}