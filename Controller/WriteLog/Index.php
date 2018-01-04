<?php
/**
 * Copyright © 2016 TripFuser. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace TripFuser\MageSample\Controller\WriteLog;

/**
 * Class Index
 * @package TripFuser\MageSample\Controller\WriteLog
 */
class Index extends \Magento\Framework\App\Action\Action
{
    protected $_logger;


    /**
     * @param  \Magento\Framework\App\Action\Context $context
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->_logger = $logger;
        parent::__construct(
            $context
        );
    }

    public function execute()
    {
        // saved in var/log/debug.log
        $this->_logger->debug('debug1234');
        //Output: [2017-02-22 04:48:44] main.DEBUG: debug1234 {"is_exception":false} []

        // Write to default log file: var/log/system.log
        $this->_logger->error('Error log');
        echo 'Write log success';
        exit;
    }
}