<?php
declare(strict_types=1);

namespace Magenest\Student\Controller\Adminhtml\Student;

class Edit extends \Magenest\Student\Controller\Adminhtml\Student
{

    protected $resultPageFactory;


    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context, $coreRegistry);
    }

    /**
     * Edit action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('student_id');
        $model = $this->_objectManager->create(\Magenest\Student\Model\Student::class);

        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This Student no longer exists.'));

                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->_coreRegistry->register('magenest_student_student', $model);

        // 3. Build edit form
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $this->initPage($resultPage)->addBreadcrumb(
            $id ? __('Edit Student') : __('New Student'),
            $id ? __('Edit Student') : __('New Student')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Students'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? __('Edit Student %1', $model->getId()) : __('New Student'));
        return $resultPage;
    }
}

