<?php
declare(strict_types=1);

namespace Iovista\ProductComment\Model\Data;

use Iovista\ProductComment\Api\Data\ProductCommentInterface;
use Magento\Framework\DataObject;

class ProductComment extends DataObject implements ProductCommentInterface
{
    public function getCommentId(): int
    {
        return (int) $this->getData(self::COMMENT_ID);
    }

    public function setCommentId(int $commentId): ProductCommentInterface
    {
        return $this->setData(self::COMMENT_ID, $commentId);
    }

    public function getProductId(): int
    {
        return (int) $this->getData(self::PRODUCT_ID);
    }

    public function setProductId(int $productId): ProductCommentInterface
    {
        return $this->setData(self::PRODUCT_ID, $productId);
    }

    public function getNickname(): string
    {
        return (string) $this->getData(self::NICKNAME);
    }

    public function setNickname(string $nickname): ProductCommentInterface
    {
        return $this->setData(self::NICKNAME, $nickname);
    }

    public function getEmail(): string
    {
        return (string) $this->getData(self::EMAIL);
    }

    public function setEmail(string $email): ProductCommentInterface
    {
        return $this->setData(self::EMAIL, $email);
    }

    public function getComment(): string
    {
        return (string) $this->getData(self::COMMENT);
    }

    public function setComment(string $comment): ProductCommentInterface
    {
        return $this->setData(self::COMMENT, $comment);
    }

    public function getStatus(): int
    {
        return (int) $this->getData(self::STATUS);
    }

    public function setStatus(int $status): ProductCommentInterface
    {
        return $this->setData(self::STATUS, $status);
    }

    public function getCreatedAt(): string
    {
        return (string) $this->getData(self::CREATED_AT);
    }

    public function setCreatedAt(string $createdAt): ProductCommentInterface
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }
}

