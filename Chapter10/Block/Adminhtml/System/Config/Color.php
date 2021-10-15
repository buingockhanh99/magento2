<?php
/**
 * Color
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Chapter10\Block\Adminhtml\System\Config;


class Color extends \Magento\Config\Block\System\Config\Form\Field
{

    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        $this->setTemplate('Magenest_Chapter10::system/config/setcolor.phtml');
        return $this;
    }


    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
            return $this->_toHtml();
    }




}
