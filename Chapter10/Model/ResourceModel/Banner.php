<?php
/**
 * Banner
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Chapter10\Model\ResourceModel;
use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Banner extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('magenest_banner', 'banner_id');
    }

    protected  function  _afterSave(\Magento\Framework\Model\AbstractModel $object)
    {
        $image = $object->getData('image');
        if($image != null)
        {
            $imageUploader = \Magento\Framework\App\ObjectManager::getInstance()->get('Magenest\Chapter10\BannerImageUpload');
            $imageUploader->moveFileFromTmp($image);
        }
        return $this;
    }
}
