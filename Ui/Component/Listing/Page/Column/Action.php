<?php
namespace TripFuser\MageSample\Ui\Component\Listing\Page\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;

class Action extends Column
{
    const ROW_EDIT_URL = 'magesample/city/edit';
    const ROW_DEL_URL = 'magesample/city/delete';

    protected $urlBuider;

    public function __construct(ContextInterface $context,
                                UiComponentFactory $uiComponentFactory,
                                UrlInterface $urlBuilder,
                                array $components,
                                array $data
    )
    {
        $this->urlBuider = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource) {
        if (isset($dataSource['data']['items']))  {
            foreach ($dataSource['data']['items'] as &$item) {
                $name = $this->getData('name');
                if (isset($item['city_id'])) {
                    $editUrl = $this->urlBuider->getUrl(
                        self::ROW_EDIT_URL,
                        ['id' => $item['city_id']]);
                    $deleteUrl = $this->urlBuider->getUrl(
                        self::ROW_DEL_URL,
                        ['id' => $item['city_id']]
                    );
                    $item[$name]['edit'] = [
                        'href' => 'javascript:editCity(\''.$editUrl.'\')',
                        'label' => __('Edit')
                    ];
                    $item[$name]['delete'] = [
                        'href' => 'javascript:deleteCity(\''.$deleteUrl.'\')',
                        'label' => __('Delete'),
                    ];
                }
            }
        }
        return $dataSource;
    }
}