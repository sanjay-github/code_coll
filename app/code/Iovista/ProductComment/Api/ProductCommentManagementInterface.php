<?php
declare(strict_types=1);

namespace Iovista\ProductComment\Api;

use Iovista\ProductComment\Api\Data\ProductCommentInterface;

interface ProductCommentManagementInterface
{
    /**
     * Get approved comments by product id.
     *
     * @param int $productId
     * @return ProductCommentInterface[]
     */
    public function getByProductId(int $productId): array;
}

