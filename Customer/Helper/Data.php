<?php
/**
 * Data
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Customer\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Customer\Api\CustomerRepositoryInterface;

class Data extends AbstractHelper
{
    protected $customerRepository;
    public function __construct(
        Context $context,
        CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
        parent::__construct($context);
    }
    public function getAttributeValue($customerId)
    {
        $customer = $this->customerRepository->getById($customerId);
        return $customer->getCustomAttribute('customer_entity_varchar');
    }
}
