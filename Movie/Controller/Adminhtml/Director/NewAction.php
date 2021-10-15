<?php
/**
 * NewAction
 *
 * @copyright Copyright © 2021 magenest. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Movie\Controller\Adminhtml\Director;


class NewAction extends \Magenest\Movie\Controller\Adminhtml\Director
{
    /**
     * @var \Magento\Backend\Model\View\Result\ForwardFactory
     */
    protected $resultForwardFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory

    )
    {
        $this->resultForwardFactory = $resultForwardFactory;
        parent::__construct($context, $coreRegistry);
    }
    public function execute()
    {
        $resultForward = $this->resultForwardFactory->create();
        return $resultForward->forward('edit');
    }
}
