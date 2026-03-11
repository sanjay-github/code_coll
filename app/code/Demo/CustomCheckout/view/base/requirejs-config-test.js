var config = {
    'config': {
        'mixins': {
           'Magento_Checkout/js/view/shipping': {
               'Demo_CustomCheckout/js/view/shipping-payment-mixin': true
           },
           'Magento_Checkout/js/view/payment': {
               'Demo_CustomCheckout/js/view/shipping-payment-mixin': true
           }
       }
    }
}

