<?php
/**
 * Copyright 2025 Adobe
 * All Rights Reserved.
 */
declare(strict_types=1);

namespace Iovista\ProductComment\Controller\Product;

use Magento\Framework\App\Action\HttpPostActionInterface as HttpPostActionInterface;
use Iovista\ProductComment\Controller\Product as ProductController;
use Magento\Framework\Controller\ResultFactory;
use Magento\Review\Model\Review;

/**
 * Class Post for posting the comment
 */
class Post extends ProductController implements HttpPostActionInterface
{
    /**
     * Submit new review action
     *
     * @return \Magento\Framework\Controller\Result\Redirect
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        if (!$this->formKeyValidator->validate($this->getRequest()) || false === $this->reviewsConfig->isEnabled()) {
            $resultRedirect->setUrl($this->_redirect->getRefererUrl());
            return $resultRedirect;
        }

        $data = $this->getRequest()->getPostValue();
        if (($product = $this->initProduct()) && !empty($data)) {
            /** @var \Magento\Review\Model\Review $review */
            $comment = $this->productCommentFactory->create()->setData($data);
            $comment->unsetData('comment_id');
            try {
                $comment->setProductId($product->getId())
                    ->setStatus(Review::STATUS_PENDING)
                    ->save();
                $this->messageManager->addSuccessMessage(__('You submitted your comment for moderation.'));
            } catch (\Exception $e) {
                $this->reviewSession->setFormData($data);
                $this->messageManager->addErrorMessage(__('We can\'t post your comment right now.').$e->getMessage());
            }
        }
        $redirectUrl = $this->reviewSession->getRedirectUrl(true);
        $resultRedirect->setUrl($redirectUrl ?: $this->_redirect->getRedirectUrl());
        return $resultRedirect;
    }
}
