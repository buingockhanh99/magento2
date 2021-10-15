<?php
/**
 * Director
 *
 * @copyright Copyright © 2021 magenest. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Movie\Controller\Adminhtml;


abstract class Director extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Magenest_Movie::Director';
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
            ->addBreadcrumb(__('Director'), __('Director'));
        return $resultPage;
    }
}
