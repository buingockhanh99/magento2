<?php
/**
 * Banner
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Chapter10\Controller\Adminhtml;
use \Magento\Backend\App\Action;

abstract class Banner extends Action
{
    const ADMIN_RESOURCE = 'Magenest_Chapter10::banner';
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
            ->addBreadcrumb(__('Banner'), __('Banner'));
        return $resultPage;
    }
}
