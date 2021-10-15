<?php
declare(strict_types=1);

namespace Magenest\Student\Model\ResourceModel\Student;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * @var string
     */
    protected $_idFieldName = 'student_id';


    protected function _construct()
    {
        $this->_init(
            \Magenest\Student\Model\Student::class,
            \Magenest\Student\Model\ResourceModel\Student::class
        );
    }
}

