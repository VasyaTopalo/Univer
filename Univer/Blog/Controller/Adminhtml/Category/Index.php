<?php

namespace Univer\Blog\Controller\Adminhtml\Category;

use Univer\Blog\Controller\Adminhtml\AbstractCategory;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;

class Index extends AbstractCategory
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Univer_Blog::category';

    /**
     * @return ResultInterface|ResponseInterface
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Univer_Blog::univer_blog');
        $resultPage->getConfig()->getTitle()->prepend(__('Category List'));
        return $resultPage;
    }
}
