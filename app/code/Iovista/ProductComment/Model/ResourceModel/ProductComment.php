<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Iovista\ProductComment\Model\ResourceModel;

/**
 * ProductComment resource model
 *
 * @api
 * @since 100.0.2
 */
class ProductComment extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define main table. Define other tables name
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('product_comment', 'comment_id');
    }
}
