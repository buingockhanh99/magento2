<?php
/**
 * View
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Blog\Block\Post;


use Magenest\Blog\Model\BlogFactory;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Result\PageFactory;

class View extends Template
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;
    protected $blogFactory;
    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        BlogFactory $blogFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->blogFactory = $blogFactory;
        parent::__construct($context);
    }

    private function getDataModel()
    {
        $id = $this->getRequest()->getParam('id');
        if (!$id) {
            return false;
        }
        $blog = $this->blogFactory->create()->load($id);
        if (!$blog->getId()) {
            return false;
        }

        return $blog;
    }

    public function getTitle()
    {
        $data = $this->getDataModel();
        return $data['title'];
    }

    public function getContent()
    {
        $data = $this->getDataModel();
        return $data['content'];
    }

    public function  getDescription()
    {
        $data = $this->getDataModel();
        return $data['description'];
    }

}
