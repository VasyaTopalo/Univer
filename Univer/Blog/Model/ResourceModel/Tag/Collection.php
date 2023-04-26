<?php

namespace Univer\Blog\Model\ResourceModel\Tag;

use Univer\Blog\Model\ResourceModel\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'tag_id';
    protected $_eventPrefix = 'univer_blog_tag_collection';
    protected $_eventObject = 'univer_blog_tag_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Univer\Blog\Model\Tag', 'Univer\Blog\Model\ResourceModel\Tag');
    }

    /**
     * Join Left univer_blog_tag_post table
     */
    public function joinPostTable()
    {
        $this->addFilterToMap('tag_id', 'main_table.tag_id');
        $this->getSelect()->joinLeft(
            ['post_tag' => $this->getTable('univer_blog_tag_post')],
            'main_table.tag_id = post_tag.tag_id',
            'post_id'
        );
    }
}
