<?php
/**
 * Teacher
 *
 * @copyright Copyright © 2021 magenest. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Teacher\Controller\Adminhtml;


abstract class Teacher extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Magenest_Teacher::top_teacher';
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
            ->addBreadcrumb(__('Teacher'), __('Teacher'));
        return $resultPage;
    }
}
