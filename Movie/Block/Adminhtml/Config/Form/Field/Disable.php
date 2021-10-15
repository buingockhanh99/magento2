<?php
/**
 * Disable
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Movie\Block\Adminhtml\Config\Form\Field;


use Magenest\Movie\Model\ResourceModel\Movie\CollectionMovieFactory as MovieCollection;
use Magenest\Movie\Model\ResourceModel\Actor\CollectionActorFactory as ActorCollection;
use Magento\Backend\Block\Template\Context;
use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\View\Helper\SecureHtmlRenderer;


class Disable extends Field
{
    protected $_actorCollection;
    protected $_movieCollection;

    public function __construct(
        Context $context,
        ActorCollection $actorCollection,
        MovieCollection $movieCollection,
        array $data = [],
        SecureHtmlRenderer $secureRenderer = null
    )
    {
        $this->_actorCollection = $actorCollection;
        $this->_movieCollection = $movieCollection;
        parent::__construct($context, $data, $secureRenderer);
    }

    protected function getRows($id)
    {
        if ($id == "magenestactor") {
            return $this->_actorCollection->create()->count();
        } elseif ($id == "magenestmovie") {
            return $this->_movieCollection->create()->count();
        }
    }

    protected function _renderValue(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        $element->addData([
            'value'    => $this->getRows($element->getFieldConfig()['id']),
            'readonly' => 'readonly'
        ]);
        return parent::_renderValue($element);
    }
}
