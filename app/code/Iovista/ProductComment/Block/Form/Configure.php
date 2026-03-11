<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Iovista\ProductComment\Block\Form;

/**
 * Comment form block
 *
 * @api
 * @since 100.0.2
 */
class Configure extends \Iovista\ProductComment\Block\Form
{
    /**
     * Get comment product id
     *
     * @return int
     */
    public function getProductId()
    {
        return (int)$this->getRequest()->getParam('product_id', false);
    }
}
