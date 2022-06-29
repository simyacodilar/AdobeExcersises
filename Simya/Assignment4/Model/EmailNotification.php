<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Simya\Assignment4\Model;

use Magento\Customer\Api\Data\CustomerInterface;

class EmailNotification extends \Magento\Customer\Model\EmailNotification
{
    /**
     * Constant self::NEW_ACCOUNT_EMAIL_REGISTERED               welcome email, when confirmation is disabled
     */
    public const TEMPLATE_TYPES = [
        self::NEW_ACCOUNT_EMAIL_REGISTERED => self::XML_PATH_REGISTER_EMAIL_TEMPLATE,
    ];

    /**
     * Send email with new account related information
     *
     * @param CustomerInterface $customer
     * @param string $type
     * @param string $backUrl
     * @param int|null $storeId
     * @param string $sendemailStoreId
     * @return void
     */
    public function newAccount(
        CustomerInterface $customer,
        $type = self::NEW_ACCOUNT_EMAIL_REGISTERED,
        $backUrl = '',
        $storeId = null,
        $sendemailStoreId = null
    ): void {
        $types = self::TEMPLATE_TYPES;
    }
}
