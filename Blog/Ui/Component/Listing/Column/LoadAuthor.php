<?php
/**
 * LoadAuthor
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Blog\Ui\Component\Listing\Column;


use Magenest\Blog\Model\Blog;
use Magenest\Blog\Model\ResourceModel\Blog\CollectionFactory;

class LoadAuthor implements \Magento\Framework\Data\OptionSourceInterface
{

    protected $collectionFactory;
    protected $pageFactory;
    protected $blogFactory;


    public function __construct(
        \Magento\User\Model\ResourceModel\User\CollectionFactory $collectionFactory,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magenest\Blog\Model\BlogFactory $blogFactory


    )
    {
        $this->pageFactory = $pageFactory;
        $this->blogFactory = $blogFactory;
        $this->collectionFactory = $collectionFactory;


    }

    /**
     * @inheritDoc
     */
    public function toOptionArray()
    {

        $post = $this->collectionFactory->create();
        $options = [];


        foreach ($post as $item) {
            $options[] = [
                'value' => $item->getData('user_id'),
                'label' => $item->getData('username')
            ];
        }

        return $options;

    }

}
