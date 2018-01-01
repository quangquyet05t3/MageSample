<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace TripFuser\MageSample\Cron;
class DisableJobs2
{
    /**
     * @var \TripFuser\MageSample\Model\City
     */
    protected $_job;

    /**
     * @param \TripFuser\MageSample\Model\City $job
     */
    public function __construct(
        \TripFuser\MageSample\Model\City $job
    ) {
        $this->_job = $job;
    }

    /**
     * Disable jobs which date is less than the current date
     *
     * @param \Magento\Cron\Model\Schedule $schedule
     * @return void
     */
    public function execute(\Magento\Cron\Model\Schedule $schedule)
    {
        $nowDate = date('Y-m-d');
        $jobsCollection = $this->_job->getCollection()
            ->addFieldToFilter('city_id', array ('eq' => 1));

        /** @var \TripFuser\MageSample\Model\City $job */
        foreach($jobsCollection AS $job) {
            $name = date('Y-m-d H:i:s', time());
            $job->setName($name);
            $job->save();
        }
    }
}