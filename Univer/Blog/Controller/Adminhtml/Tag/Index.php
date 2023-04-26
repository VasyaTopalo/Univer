<?php

namespace Univer\Blog\Controller\Adminhtml\Tag;

use Univer\Blog\Controller\Adminhtml\AbstractTag;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;

class Index extends AbstractTag
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Univer_Blog::tag';

    /**
     * @return ResultInterface|ResponseInterface
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Univer_Blog::univer_blog');
        $resultPage->getConfig()->getTitle()->prepend(__('Tag List'));
        return $resultPage;
    }
}
