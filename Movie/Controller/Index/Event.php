<?php
/**
 * Event
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Movie\Controller\Index;


class Event extends \Magento\Framework\App\Action\Action
{
    /** @var \Magento\Framework\View\Result\PageFactory */
    protected $resultPageFactory;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory
        $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }
    public function execute() {
        $resultPage = $this->resultPageFactory->create();
        $this->_eventManager->dispatch('rename_magenest');
        return $resultPage;
    }
}
