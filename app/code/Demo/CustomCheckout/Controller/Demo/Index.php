<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Demo\CustomCheckout\Controller\Demo;

use Magento\Framework\App\Action\HttpGetActionInterface as HttpGetActionInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

/**
 * Redirect guest customer for registration.
 */
class Index extends Action implements HttpGetActionInterface
{
    private \Magento\Framework\Controller\Result\JsonFactory $jsonResultFactory;

    /**
     * @param Context $context
     */
    public function __construct(
        Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $jsonResultFactory
    ) {
        parent::__construct($context);
        $this->jsonResultFactory = $jsonResultFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        /** @var string|null $orderId */
        $data = ['firstname' => 'Sanjay', 'lastname' => 'Chaudhary'];
        $result = $this->jsonResultFactory->create();
        $result->setData($data);
        return $result;
    }
}
