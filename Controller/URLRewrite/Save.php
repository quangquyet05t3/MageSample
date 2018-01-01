<?php
/**
 * Copyright © 2016 TripFuser. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace TripFuser\MageSample\Controller\URLRewrite;

/**
 * Class Save
 * @package TripFuser\MageSample\Controller\URLRewrite
 */
class Save extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\UrlRewrite\Model\UrlRewriteFactory
     */
    protected $_urlRewriteFactory;


    /**
     * @param Context $context
     * @param \Magento\UrlRewrite\Model\UrlRewriteFactory $urlRewriteFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\UrlRewrite\Model\UrlRewriteFactory $urlRewriteFactory
    ) {
        $this->_urlRewriteFactory = $urlRewriteFactory;
        parent::__construct(
            $context
        );
    }

    public function execute()
    {
        $urlRewriteModel = $this->_urlRewriteFactory->create();
        /* set current store id */
        $urlRewriteModel->setStoreId(1);
        /* this url is not created by system so set as 0 */
        $urlRewriteModel->setIsSystem(0);
        /* unique identifier - set random unique value to id path */
        $urlRewriteModel->setIdPath(rand(1, 100000));
        /* set actual url path to target path field */
        $urlRewriteModel->setTargetPath("magesample/urlrewrite/index");
        /* set requested path which you want to create */
        $urlRewriteModel->setRequestPath("rewrite");
        /* set current store id */
        $urlRewriteModel->save();
        echo 'success';
        exit;
    }
}