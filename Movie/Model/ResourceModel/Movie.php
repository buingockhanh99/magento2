<?php
/**
 * Movie
 *
 * @copyright Copyright © 2021 magenest. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Movie\Model\ResourceModel;


class Movie extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('magenest_movie', 'movie_id');
    }

//    protected  function  _afterSave(\Magento\Framework\Model\AbstractModel $object)
//    {
//        $image = $object->getData('image');
//        if($image != null)
//        {
//            $imageUploader = \Magento\Framework\App\ObjectManager::getInstance()->get('Magenest\Teacher\TeacherImageUpload');
//            $imageUploader->moveFileFromTmp($image);
//        }
//        return $this;
//    }
}
