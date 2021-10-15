<?php


namespace Magenest\Teacher\Model\ResourceModel;


class Teacher  extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('magenest_teacher_teacher', 'teacher_id');
    }

    protected  function  _afterSave(\Magento\Framework\Model\AbstractModel $object)
    {
        $image = $object->getData('image');
        if($image != null)
        {
            $imageUploader = \Magento\Framework\App\ObjectManager::getInstance()->get('Magenest\Teacher\TeacherImageUpload');
            $imageUploader->moveFileFromTmp($image);
        }
        return $this;
    }
}
