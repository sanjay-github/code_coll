<?php
declare(strict_types=1);

namespace Demo\MessageQueues\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\MessageQueue\PublisherInterface;
use Magento\Framework\Json\Helper\Data as JsonHelper;

class AfterProductSave implements ObserverInterface
{
    public function __construct(
        private readonly PublisherInterface $publisher,
        private readonly JsonHelper $jsonHelper
    ) {
    }

    public function execute(Observer $observer): void
    {
        $product = $observer->getEvent()->getProduct();
        if (!$product) {
            return;
        }

        $payload = $this->jsonHelper->jsonEncode([
            'event' => 'catalog_product_save_after',
            'product_id' => (int) $product->getId(),
            'sku' => (string) $product->getSku(),
        ]);

        $this->publisher->publish('notifycustomer.massmail', $payload ?: '');
    }
}
