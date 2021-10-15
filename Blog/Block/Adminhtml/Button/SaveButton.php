<?php
/**
 * SaveButton
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Blog\Block\Adminhtml\Button;

use Magenest\Blog\Block\Adminhtml\Category\GenericButton;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveButton extends GenericButton implements ButtonProviderInterface
{
    public function getButtonData()
    {
        return [
            'label' => __('Save'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
        ];
    }
}
