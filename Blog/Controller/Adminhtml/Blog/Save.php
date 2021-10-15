<?php
/**
 * Save
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Blog\Controller\Adminhtml\Blog;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Event\ManagerInterface;
use Magenest\Blog\Model\BlogFactory;

class Save extends \Magento\Backend\App\Action
{
    protected $dataPersistor;
    protected $collectionFactory;
    protected $eventManager;
    protected $modelBlog;

    public function __construct(
        BlogFactory $modelBlog,
        ManagerInterface $eventManager,
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor,
        \Magenest\Blog\Model\ResourceModel\Blog\CollectionFactory $collectionFactory

    ) {
        $this->modelBlog = $modelBlog;
        $this->dataPersistor = $dataPersistor;
        $this->eventManager = $eventManager;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $id = $this->getRequest()->getParam('id');
            $model = $this->modelBlog->create()->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addErrorMessage(__('This Category no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }
            //check url
            $url_rewrite = $this->collectionFactory->create()->getData();
            foreach ($url_rewrite as $item)
            {
                if($item['url_rewrite'] ==  $data['url_rewrite']) {
                    $this->messageManager->addErrorMessage(__('This category has the same URL.'));
                    return $resultRedirect->setPath('*/*/');
                }
            }


            $model->setData($data);

            try {
                $model->save();

                $this->eventManager->dispatch('magenest_blog_save',['request' => $this->getRequest(),'model' =>$model,'data'=>$data ]);

                $this->messageManager->addSuccessMessage(__('You saved the Blog.'));
                $this->dataPersistor->clear('magenest_blog');

                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Blog.'));
            }

            $this->dataPersistor->set('magenest_blog', $data);
            return $resultRedirect->setPath('*/*/edit', ['id' => $this->getRequest()->getParam('id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}
