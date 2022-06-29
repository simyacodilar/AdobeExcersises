<?php

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Simya\Assignment4\Plugin;

class EmailNotification
{
    /**
     * Around Plugin mathod
     *
     * @param \Magento\Customer\Model\EmailNotification $subject
     * @param \Closure $proceed
     * @return \Magento\Customer\Model\EmailNotification
     */
    public function aroundNewAccount(\Magento\Customer\Model\EmailNotification $subject, \Closure $proceed)
    {
        return $subject;
    }
}
