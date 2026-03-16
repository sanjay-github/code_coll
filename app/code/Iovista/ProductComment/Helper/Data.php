<?php

namespace Iovista\ProductComment\Helper;

use Iovista\ProductComment\Model\ProductComment;
use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    /**
     * Get statuses with their codes
     *
     * @return array
     */
    public function getStatuses()
    {
        return [
            ProductComment::STATUS_APPROVED => __('Approved'),
            ProductComment::STATUS_PENDING => __('Pending'),
            ProductComment::STATUS_NOT_APPROVED => __('Not Approved')
        ];
    }

    /**
     * Get comment statuses as option array
     *
     * @return array
     */
    public function getStatusesOptionArray()
    {
        $result = [];
        foreach ($this->getStatuses() as $value => $label) {
            $result[] = ['value' => $value, 'label' => $label];
        }

        return $result;
    }
}
