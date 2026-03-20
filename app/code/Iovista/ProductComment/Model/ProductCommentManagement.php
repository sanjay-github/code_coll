<?php
declare(strict_types=1);

namespace Iovista\ProductComment\Model;

use Iovista\ProductComment\Api\Data\ProductCommentInterface;
use Iovista\ProductComment\Model\Data\ProductCommentFactory;
use Iovista\ProductComment\Api\ProductCommentManagementInterface;
use Iovista\ProductComment\Model\ResourceModel\ProductComment\CollectionFactory;
use Magento\Framework\Exception\InputException;

class ProductCommentManagement implements ProductCommentManagementInterface
{
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;
    /**
     * @var ProductCommentFactory
     */
    private $productCommentFactory;

    public function __construct(
        CollectionFactory $collectionFactory,
        ProductCommentFactory $productCommentFactory
    )
    {
        $this->collectionFactory = $collectionFactory;
        $this->productCommentFactory = $productCommentFactory;
    }

    /**
     * @inheritdoc
     */
    public function getByProductId(int $productId): array
    {
        if ($productId <= 0) {
            throw new InputException(__('Product id must be greater than 0.'));
        }

        $collection = $this->collectionFactory->create();
        $collection->addFieldToFilter('product_id', $productId);
        $collection->addFieldToFilter('status', ProductComment::STATUS_APPROVED);
        $collection->setOrder('created_at', 'DESC');

        $items = [];
        foreach ($collection as $comment) {
            /** @var ProductCommentInterface $dataObject */
            $dataObject = $this->productCommentFactory->create();
            $dataObject->setCommentId((int) $comment->getData('comment_id'));
            $dataObject->setProductId((int) $comment->getData('product_id'));
            $dataObject->setNickname((string) $comment->getData('nickname'));
            $dataObject->setEmail((string) $comment->getData('email'));
            $dataObject->setComment((string) $comment->getData('comment'));
            $dataObject->setStatus((int) $comment->getData('status'));
            $dataObject->setCreatedAt((string) $comment->getData('created_at'));
            $items[] = $dataObject;
        }

        return $items;
    }
}

