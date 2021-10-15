<?php
declare(strict_types=1);

namespace Magenest\Student\Controller\Adminhtml;

abstract class Student extends \Magento\Backend\App\Action
{

    const ADMIN_RESOURCE = 'Magenest_Student::top_level';
    protected $_coreRegistry;


    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry
    ) {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context);
    }


    public function initPage($resultPage)
    {
        $resultPage->setActiveMenu(self::ADMIN_RESOURCE)
            ->addBreadcrumb(__('Magenest'), __('Magenest'))
            ->addBreadcrumb(__('Student'), __('Student'));
        return $resultPage;
    }
}

