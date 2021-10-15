<?php
declare(strict_types=1);

namespace Magenest\Student\Model\ResourceModel;

class Student extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('magenest_student_student', 'student_id');
    }
}

