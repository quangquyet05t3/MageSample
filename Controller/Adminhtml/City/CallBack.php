<?php
namespace TripFuser\MageSample\Controller\Adminhtml\City;

class CallBack extends \Magento\Backend\App\Action
{

    private $resultJsonFactory;

    private $regionFactory;
    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
     * @param \TripFuser\Core\Model\RegionFactory $regionFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \TripFuser\Core\Model\RegionFactory $regionFactory
    ) {
        parent::__construct($context);
        $this->resultJsonFactory = $resultJsonFactory;
        $this->regionFactory = $regionFactory;
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        /** @var \Magento\Framework\Controller\Result\Json $resultJson */
        $resultJson = $this->resultJsonFactory->create();

        $countryId = $data['country_id'];

        $regionFactory = $this->regionFactory->create();
        $regionCollection = $regionFactory->getCollection();
        $regionCollection->addFieldToFilter('country_id', array('eq' => $countryId));
        $listRegion = $regionCollection->toOptionArray();
        $resultJson->setData($listRegion);
        return $resultJson;
    }
}