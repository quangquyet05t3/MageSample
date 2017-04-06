<?php
/**
 *
 */
namespace TripFuser\MageSample\Ui\DataProvider\City;

/**
 * DataProvider for product edit form
 */
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var \Magento\Ui\DataProvider\Modifier\PoolInterface
     */
    private $pool;

    /**
     * DataProvider constructor.
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param \TripFuser\MageSample\Model\ResourceModel\City\CollectionFactory $collectionFactory
     * @param \Magento\Ui\DataProvider\Modifier\PoolInterface $pool
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        \TripFuser\MageSample\Model\ResourceModel\City\CollectionFactory $collectionFactory,
        \Magento\Ui\DataProvider\Modifier\PoolInterface $pool,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
        $this->pool = $pool;
        $this->meta = $this->getMeta();
    }

    /**
     * {@inheritdoc}
     */
    public function getData()
    {
        // Get list Element
        $items = $this->getCollection()->toArray();

        return $items;
    }
}