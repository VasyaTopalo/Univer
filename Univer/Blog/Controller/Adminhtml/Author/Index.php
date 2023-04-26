<?php

namespace Univer\Blog\Controller\Adminhtml\Author;

use Univer\Blog\Controller\Adminhtml\AbstractAuthor;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;

class Index extends AbstractAuthor
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Univer_Blog::author';

    /**
     * @return ResultInterface|ResponseInterface
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Univer_Blog::univer_blog');
        $resultPage->getConfig()->getTitle()->prepend(__('Author List'));
        return $resultPage;
    }
}
