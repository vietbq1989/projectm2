define([
    'jquery',
    'jquery/ui',
    'mage/validation',
    'mage/storage',
    'Magento_Checkout/js/model/url-builder',
], function ($, storage, urlBuilder) {
    $.widget("magestore.test", {

        _create: function () {
            console.log(this.options);
        },

        helloworld: function () {
            //alert('sdfsdfsdf');
        },
        submit: function(element){
            element.preventDefault();
            console.log(element);
            var self = this;
            payload = JSON.stringify({
                    login: {
                        'username': self.option.username,
                        'password': self.option.password,
                    }
                }
            );

            storage.post(
                self.getUrlForLogin(), payload, false
            ).done(
                function (result) {
                    console.log(result);
                }
            ).fail(
                function (response) {
                    console.log(response);
                }
            ).always(
                function () {
                    
                }
            );
        },
        getUrlForLogin: function(quote) {
            return urlBuilder.createUrl('/student/index/login', {});
        },
    });

    return $.magestore.test;
});