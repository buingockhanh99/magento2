<?php
declare(strict_types=1);

namespace Magenest\Student\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface StudentRepositoryInterface
{

    /**
     * Save Student
     * @param \Magenest\Student\Api\Data\StudentInterface $student
     * @return \Magenest\Student\Api\Data\StudentInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Magenest\Student\Api\Data\StudentInterface $student
    );

    /**
     * Retrieve Student
     * @param string $studentId
     * @return \Magenest\Student\Api\Data\StudentInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($studentId);

    /**
     * Retrieve Student matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magenest\Student\Api\Data\StudentSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Student
     * @param \Magenest\Student\Api\Data\StudentInterface $student
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Magenest\Student\Api\Data\StudentInterface $student
    );

    /**
     * Delete Student by ID
     * @param string $studentId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($studentId);
}

