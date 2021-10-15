<?php
/**
 * Index
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Customer\Controller\Customer;


use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Framework\App\Action\Action
{

    protected $resultPageFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        return $this->resultPageFactory->create();
    }
}
