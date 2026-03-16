<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Iovista\ProductComment\Block\Product\View;

use Iovista\ProductComment\Model\ProductComment;
use Iovista\ProductComment\Model\ResourceModel\ProductComment\Collection as ProductCommentCollection;
use Magento\Catalog\Api\ProductRepositoryInterface;

/**
 * Detailed Product Comments
 *
 * @api
 * @since 100.0.2
 */
class ListView extends \Magento\Catalog\Block\Product\View
{

    /**
     * Comment collection
     *
     * @var ProductCommentCollection
     */
    protected $_commentsCollection;

    /**
     * Comment resource model
     *
     * @var \Iovista\ProductComment\Model\ResourceModel\ProductComment\CollectionFactory
     */
    protected $_commentsColFactory;

    /**
     * @param \Magento\Catalog\Block\Product\Context $context
     * @param \Magento\Framework\Url\EncoderInterface $urlEncoder
     * @param \Magento\Framework\Json\EncoderInterface $jsonEncoder
     * @param \Magento\Framework\Stdlib\StringUtils $string
     * @param \Magento\Catalog\Helper\Product $productHelper
     * @param \Magento\Catalog\Model\ProductTypes\ConfigInterface $productTypeConfig
     * @param \Magento\Framework\Locale\FormatInterface $localeFormat
     * @param \Magento\Customer\Model\Session $customerSession
     * @param ProductRepositoryInterface $productRepository
     * @param \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency
     * @param \Iovista\ProductComment\Model\ResourceModel\ProductComment\CollectionFactory $collectionFactory
     * @param array $data
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        \Magento\Catalog\Block\Product\Context $context,
        \Magento\Framework\Url\EncoderInterface $urlEncoder,
        \Magento\Framework\Json\EncoderInterface $jsonEncoder,
        \Magento\Framework\Stdlib\StringUtils $string,
        \Magento\Catalog\Helper\Product $productHelper,
        \Magento\Catalog\Model\ProductTypes\ConfigInterface $productTypeConfig,
        \Magento\Framework\Locale\FormatInterface $localeFormat,
        \Magento\Customer\Model\Session $customerSession,
        ProductRepositoryInterface $productRepository,
        \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency,
        \Iovista\ProductComment\Model\ResourceModel\ProductComment\CollectionFactory $collectionFactory,
        array $data = []
    ) {
        $this->_commentsColFactory = $collectionFactory;
        parent::__construct(
            $context,
            $urlEncoder,
            $jsonEncoder,
            $string,
            $productHelper,
            $productTypeConfig,
            $localeFormat,
            $customerSession,
            $productRepository,
            $priceCurrency,
            $data
        );
    }

    /**
     * Get product id
     *
     * @return int|null
     */
    public function getProductId()
    {
        $product = $this->_coreRegistry->registry('product');
        return $product ? $product->getId() : null;
    }

    /**
     * Prepare product comment list toolbar
     *
     * @return $this
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();

        $toolbar = $this->getLayout()->getBlock('product_comment_list.toolbar');
        if ($toolbar) {
            $toolbar->setCollection($this->getCommentsCollection());
            $this->setChild('toolbar', $toolbar);
        }

        return $this;
    }

    /**
     * Get collection of comments
     *
     * @return ProductCommentCollection
     */
    public function getCommentsCollection()
    {
        if (null === $this->_commentsCollection) {
            $this->_commentsCollection = $this->_commentsColFactory->create()
            ->addFieldToFilter(
                'status',
                ProductComment::STATUS_APPROVED
            )->addFieldToFilter(
                'product_id',
                $this->getProduct()->getId()
            )->setOrder('created_at', 'desc');
        }
        return $this->_commentsCollection;
    }
}
