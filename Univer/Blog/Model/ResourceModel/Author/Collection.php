<?php

namespace Univer\Blog\Model\ResourceModel\Author;

use Univer\Blog\Model\ResourceModel\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'author_id';
    protected $_eventPrefix = 'univer_blog_author_collection';
    protected $_eventObject = 'univer_blog_author_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Univer\Blog\Model\Author', 'Univer\Blog\Model\ResourceModel\Author');
    }
}
