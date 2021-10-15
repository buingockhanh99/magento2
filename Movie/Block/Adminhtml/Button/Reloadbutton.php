<?php
/**
 * Reloadbutton
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Movie\Block\Adminhtml\Button;


class Reloadbutton extends \Magento\Config\Block\System\Config\Form\Field
{
    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        ///c2
        $element->setData('type','button');
        $element->setData('value','Reload');
        $element->setData('name','btn');
        $element->setData('onclick','location.reload()');

        return $element->getElementHtml();

        // C1
//      $buttonBlock = $this->getForm()->getLayout()->createBlock(\Magento\Backend\Block\Widget\Button::class);
//        $data = [
//            'label' => 'Reaload',
//
//            'onclick' => 'reload()',
//        ];
//        $html = $buttonBlock->setData($data)->toHtml();
//        return $html;



    }

}
