<?php
namespace TripFuser\MageSample\Controller\Adminhtml\URLRewrite;


class Index extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\UrlRewrite\Model\ResourceModel\UrlRewriteFactory
     */
    protected $_urlRewriteFactory;

    /**
     * @param Context $context
     * @param \Magento\UrlRewrite\Model\ResourceModel\UrlRewriteFactory $urlRewriteFactory
     */
    public function __construct(
        Context $context,
        \Magento\UrlRewrite\Model\ResourceModel\UrlRewriteFactory $urlRewriteFactory
    ) {
        //$this->_eavAttributeFactory = $eavAttributeFactory;
        $this->_urlRewriteFactory = $urlRewriteFactory;
        parent::__construct(
            $context
        );
    }

    public function execute()
    {
        /** @var \Magento\UrlRewrite\Model\UrlRewrite  $urlRewriteModel */
        $urlRewriteModel = $this->_urlRewriteFactory->create();
        /* set current store id */
        $urlRewriteModel->setStoreId(1);
        /* this url is not created by system so set as 0 */
        $urlRewriteModel->setIsSystem(0);
        /* unique identifier - set random unique value to id path */
        $urlRewriteModel->setIdPath(rand(1, 100000));
        /* set actual url path to target path field */
        $urlRewriteModel->setTargetPath("www.example.com/customModule/customController/customAction");
        /* set requested path which you want to create */
        $urlRewriteModel->setRequestPath("www.example.com/xyz");
        /* set current store id */
        $urlRewriteModel->save();



    }
}