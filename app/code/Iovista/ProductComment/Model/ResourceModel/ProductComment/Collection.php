<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Iovista\ProductComment\Model\ResourceModel\ProductComment;

/**
 * Review collection resource model
 *
 * @api
 * @since 100.0.2
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    protected $_idFieldName = 'comment_id';

    /**
     * Define module
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Iovista\ProductComment\Model\ProductComment::class,
            \Iovista\ProductComment\Model\ResourceModel\ProductComment::class
        );
    }
}
