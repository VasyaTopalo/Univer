<?php

namespace Univer\Blog\Model\ResourceModel\Category;

use Univer\Blog\Model\ResourceModel\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'category_id';
    protected $_eventPrefix = 'univer_blog_category_collection';
    protected $_eventObject = 'univer_blog_category_collection';
    protected $flagStoreFilter = false;

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Univer\Blog\Model\Category', 'Univer\Blog\Model\ResourceModel\Category');
    }

    /**
     * @param $store
     * @return $this
     */
    public function addStoreFilter($store)
    {
        $this->storeFilter('category_id', 'univer_blog_category_store', $store);
        return $this;
    }

    /**
     * Join Left univer_blog_post_category table
     */
    public function joinPostTable()
    {
        $this->addFilterToMap('category_id', 'main_table.category_id');
        $this->getSelect()->joinLeft(
            ['post_category' => $this->getTable('univer_blog_post_category')],
            'main_table.category_id = post_category.category_id',
            'post_id'
        );
    }

    /**
     * @return AbstractCollection
     */
    protected function _afterLoad()
    {
        $this->performAfterLoad('univer_blog_category_store', 'category_id');
        return parent::_afterLoad();
    }
}
