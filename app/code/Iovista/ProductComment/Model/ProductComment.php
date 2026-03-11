<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Iovista\ProductComment\Model;

use Magento\Framework\DataObject;
use Magento\Catalog\Model\Product;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Validator\NotEmpty;
use Magento\Framework\Validator\ValidateException;
use Magento\Framework\Validator\ValidatorChain;
//use Iovista\ProductComment\Model\ResourceModel\Review\Product\Collection as ProductCollection;
//use Iovista\ProductComment\Model\ResourceModel\Review\Status\Collection as StatusCollection;

/**
 * ProductComment model
 *
 * @api
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @since 100.0.2
 */
class ProductComment extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Event prefix for observer
     *
     * @var string
     */
    protected $_eventPrefix = 'product_comment';

    public const CACHE_TAG = 'product_comment';

    /**
     * Approved comment status code
     */
    public const STATUS_APPROVED = 1;

    /**
     * Pending comment status code
     */
    public const STATUS_PENDING = 2;

    /**
     * Not Approved comment status code
     */
    public const STATUS_NOT_APPROVED = 3;

    /**
     * Initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Iovista\ProductComment\Model\ResourceModel\ProductComment::class);
    }
}
