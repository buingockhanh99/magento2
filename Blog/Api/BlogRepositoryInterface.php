<?php
/**
 * BlogRepositoryInterface
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Blog\Api;


interface BlogRepositoryInterface
{

    /**
     * Save Student
     * @param \Magenest\Blog\Api\Data\BlogInterface $blog
     * @return \Magenest\Blog\Api\Data\BlogInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Magenest\Blog\Api\Data\BlogInterface $blog
    );

    /**
     * Retrieve Blog
     * @param string $id
     * @return \Magenest\Blog\Api\Data\BlogInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($id);

    /**
     * Retrieve Blog matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magenest\Blog\Api\Data\BlogSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Blog
     * @param \Magenest\Blog\Api\Data\BlogInterface $blog
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Magenest\Blog\Api\Data\BlogInterface $blog
    );

    /**
     * Delete Student by ID
     * @param string $id
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($id);
}
