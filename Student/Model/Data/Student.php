<?php
declare(strict_types=1);

namespace Magenest\Student\Model\Data;

use Magenest\Student\Api\Data\StudentInterface;

class Student extends \Magento\Framework\Api\AbstractExtensibleObject implements StudentInterface
{

    /**
     * Get student_id
     * @return string|null
     */
    public function getStudentId()
    {
        return $this->_get(self::STUDENT_ID);
    }

    /**
     * Set student_id
     * @param string $studentId
     * @return \Magenest\Student\Api\Data\StudentInterface
     */
    public function setStudentId($studentId)
    {
        return $this->setData(self::STUDENT_ID, $studentId);
    }

    /**
     * Get name
     * @return string|null
     */
    public function getName()
    {
        return $this->_get(self::NAME);
    }

    /**
     * Set name
     * @param string $name
     * @return \Magenest\Student\Api\Data\StudentInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Magenest\Student\Api\Data\StudentExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Magenest\Student\Api\Data\StudentExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Magenest\Student\Api\Data\StudentExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get dob
     * @return string|null
     */
    public function getDob()
    {
        return $this->_get(self::DOB);
    }

    /**
     * Set dob
     * @param string $dob
     * @return \Magenest\Student\Api\Data\StudentInterface
     */
    public function setDob($dob)
    {
        return $this->setData(self::DOB, $dob);
    }

    /**
     * Get class
     * @return string|null
     */
    public function getClass()
    {
        return $this->_get(self::CLASS);
    }

    /**
     * Set class
     * @param string $class
     * @return \Magenest\Student\Api\Data\StudentInterface
     */
    public function setClass($class)
    {
        return $this->setData(self::CLASS, $class);
    }

    /**
     * Get address
     * @return string|null
     */
    public function getAddress()
    {
        return $this->_get(self::ADDRESS);
    }

    /**
     * Set address
     * @param string $address
     * @return \Magenest\Student\Api\Data\StudentInterface
     */
    public function setAddress($address)
    {
        return $this->setData(self::ADDRESS, $address);
    }
}

