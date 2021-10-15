<?php
declare(strict_types=1);

namespace Magenest\Student\Api\Data;

interface StudentInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const DOB = 'dob';
  //  const CLASS = 'class';
    const STUDENT_ID = 'student_id';
    const ADDRESS = 'address';
    const NAME = 'name';

    /**
     * Get student_id
     * @return string|null
     */
    public function getStudentId();

    /**
     * Set student_id
     * @param string $studentId
     * @return \Magenest\Student\Api\Data\StudentInterface
     */
    public function setStudentId($studentId);

    /**
     * Get name
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \Magenest\Student\Api\Data\StudentInterface
     */
    public function setName($name);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Magenest\Student\Api\Data\StudentExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Magenest\Student\Api\Data\StudentExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Magenest\Student\Api\Data\StudentExtensionInterface $extensionAttributes
    );

    /**
     * Get dob
     * @return string|null
     */
    public function getDob();

    /**
     * Set dob
     * @param string $dob
     * @return \Magenest\Student\Api\Data\StudentInterface
     */
    public function setDob($dob);

    /**
     * Get class
     * @return string|null
     */
    public function getClass();

    /**
     * Set class
     * @param string $class
     * @return \Magenest\Student\Api\Data\StudentInterface
     */
    public function setClass($class);

    /**
     * Get address
     * @return string|null
     */
    public function getAddress();

    /**
     * Set address
     * @param string $address
     * @return \Magenest\Student\Api\Data\StudentInterface
     */
    public function setAddress($address);
}

