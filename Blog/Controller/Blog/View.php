<?php
/**
 * View
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Blog\Controller\Blog;


use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magenest\Blog\Model\BlogFactory;

class View extends \Magento\Framework\App\Action\Action
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

    /**
     * Default customer account page
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {

        return $this->resultPageFactory->create();
    }
}
