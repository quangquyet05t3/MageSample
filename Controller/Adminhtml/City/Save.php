<?php
namespace TripFuser\MageSample\Controller\Adminhtml\City;

class Save extends \Magento\Backend\App\Action
{
    private $cityFactory;

    private $resultJsonFactory;
    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \TripFuser\MageSample\Model\CityFactory $cityFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \TripFuser\MageSample\Model\CityFactory $cityFactory
    ) {
        parent::__construct($context);
        $this->resultJsonFactory = $resultJsonFactory;
        $this->cityFactory = $cityFactory;
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        /** @var \Magento\Framework\Controller\Result\Json $resultJson */
        $resultJson = $this->resultJsonFactory->create();
        /** @var \TripFuser\MageSample\Model\City $city */
        $city = $this->cityFactory->create();
        $city->setData($data);
        try {
            $city->save();
        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            $this->messageManager->addError($e->getMessage());
        } catch (\RuntimeException $e) {
            $this->messageManager->addError($e->getMessage());
        } catch (\Exception $e) {
            $this->messageManager->addException($e, __('Something went wrong while saving the city'));
        }
        $resultJson->setData($data);
        return $resultJson;
    }
}