<?php

namespace Univer\Blog\Model\ResourceModel\Post;

use Univer\Blog\Model\ResourceModel\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'post_id';
    protected $_eventPrefix = 'univer_blog_post_collection';
    protected $_eventObject = 'univer_blog_post_collection';
    protected $flagStoreFilter = false;

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Univer\Blog\Model\Post', 'Univer\Blog\Model\ResourceModel\Post');
    }

    public function joinCategoryColumn()
    {
        $this->addFilterToMap('post_id', 'main_table.post_id');
        $this->getSelect()->joinLeft(
            ['category_post' => $this->getTable('univer_blog_post_category')],
            'main_table.post_id = category_post.post_id',
            'category_id'
        );
    }

    public function joinTagColumn()
    {
        $this->addFilterToMap('post_id', 'main_table.post_id');
        $this->getSelect()->joinLeft(
            ['tag_post' => $this->getTable('univer_blog_tag_post')],
            'main_table.post_id = tag_post.post_id',
            'tag_id'
        );
    }

    /**
     * @param $store
     * @return $this
     */
    public function addStoreFilter($store)
    {
        $this->storeFilter('post_id', 'univer_blog_post_store', $store);
        return $this;
    }

    /**
     * @return AbstractCollection
     */
    protected function _afterLoad()
    {
        $this->performAfterLoad('univer_blog_post_store', 'post_id');
        return parent::_afterLoad();
    }
}
