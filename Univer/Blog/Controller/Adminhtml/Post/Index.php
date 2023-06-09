<?php

namespace Univer\Blog\Controller\Adminhtml\Post;

use Univer\Blog\Controller\Adminhtml\AbstractPost;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;

class Index extends AbstractPost
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Univer_Blog::post';

    /**
     * @return ResultInterface|ResponseInterface
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Univer_Blog::univer_blog');
        $resultPage->getConfig()->getTitle()->prepend(__('Post List'));
        return $resultPage;
    }
}
