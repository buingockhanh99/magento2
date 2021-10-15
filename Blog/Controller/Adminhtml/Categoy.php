<?php
/**
 * Categoy
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Blog\Controller\Adminhtml;


abstract class Categoy extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Magenest_Blog::Category';
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
            ->addBreadcrumb(__('Category'), __('Category'));
        return $resultPage;
    }
}
