<?php
namespace TripFuser\MageSample\Controller\Adminhtml\City;

class Delete extends \Magento\Backend\App\Action
{
    protected $resultJsonFactory;
    protected $cityFactory;
    private $regionFactory;
    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
     * @param \TripFuser\MageSample\Model\CityFactory $cityFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \TripFuser\MageSample\Model\CityFactory $cityFactory,
        \TripFuser\Core\Model\RegionFactory $regionFactory
    ) {
        parent::__construct($context);
        $this->resultJsonFactory = $resultJsonFactory;
        $this->cityFactory = $cityFactory;
        $this->regionFactory = $regionFactory;
    }

    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Json $resultPageJson */
        $resultPageJson = $this->resultJsonFactory->create();
        $id = $this->getRequest()->getParam('id');
        if($id) {
            try {
                $cityFactory = $this->cityFactory->create();
                $cityFactory->load($id);
                $cityFactory->delete();
                $resultPageJson->setData([
                    'success' => true
                ]);
            } catch(\Exception $ex) {
                $resultPageJson->setData([
                    'error' => $ex->getMessage()
                ]);
            }

        }
        return $resultPageJson;
    }
}