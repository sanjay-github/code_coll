<?php
declare(strict_types=1);

namespace Iovista\ProductComment\Api\Data;

/**
 * Product comment data interface.
 */
interface ProductCommentInterface
{
    /**
     * Constants for keys of data array.
     */
    public const COMMENT_ID = 'comment_id';
    public const PRODUCT_ID = 'product_id';
    public const NICKNAME = 'nickname';
    public const EMAIL = 'email';
    public const COMMENT = 'comment';
    public const STATUS = 'status';
    public const CREATED_AT = 'created_at';

    /**
     * Get comment id.
     *
     * @return int
     */
    public function getCommentId(): int;

    /**
     * Set comment id.
     *
     * @param int $commentId
     * @return \Iovista\ProductComment\Api\Data\ProductCommentInterface
     */
    public function setCommentId(int $commentId): self;

    /**
     * Get product id.
     *
     * @return int
     */
    public function getProductId(): int;

    /**
     * Set product id.
     *
     * @param int $productId
     * @return \Iovista\ProductComment\Api\Data\ProductCommentInterface
     */
    public function setProductId(int $productId): self;

    /**
     * Get nickname.
     *
     * @return string
     */
    public function getNickname(): string;

    /**
     * Set nickname.
     *
     * @param string $nickname
     * @return \Iovista\ProductComment\Api\Data\ProductCommentInterface
     */
    public function setNickname(string $nickname): self;

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail(): string;

    /**
     * Set email.
     *
     * @param string $email
     * @return \Iovista\ProductComment\Api\Data\ProductCommentInterface
     */
    public function setEmail(string $email): self;

    /**
     * Get comment.
     *
     * @return string
     */
    public function getComment(): string;

    /**
     * Set comment.
     *
     * @param string $comment
     * @return \Iovista\ProductComment\Api\Data\ProductCommentInterface
     */
    public function setComment(string $comment): self;

    /**
     * Get status.
     *
     * @return int
     */
    public function getStatus(): int;

    /**
     * Set status.
     *
     * @param int $status
     * @return \Iovista\ProductComment\Api\Data\ProductCommentInterface
     */
    public function setStatus(int $status): self;

    /**
     * Get created at timestamp.
     *
     * @return string
     */
    public function getCreatedAt(): string;

    /**
     * Set created at timestamp.
     *
     * @param string $createdAt
     * @return \Iovista\ProductComment\Api\Data\ProductCommentInterface
     */
    public function setCreatedAt(string $createdAt): self;
}

