define([
    'jquery',
    'uiComponent',
    'ko',
    'mage/url'
], function ($, Component, ko, urlBuilder) {
    'use strict';
    return Component.extend({
        defaults: {
            template: 'Magestore_Student/student'
        },
        price: ko.observable(0),
        qty: ko.observable(0),
        pricex2: ko.observable(0),
        name: ko.observable('product name'),
        isShow: ko.observable(true),
        products: ko.observableArray([]),
        initialize: function () {
            var self = this;
            this._super();
            this.total = ko.computed(function () {
                return self.price() * self.qty();
            })

        },

        x2: function () {
            this.pricex2(this.price() * this.price());
        },

        hideProduct: function () {
            this.isShow(false);
        },

        showProduct: function () {
            var self = this;
            var url = urlBuilder.build('student/index/product');
            $.ajax(
                {
                    url: url,
                    method: 'get',
                    success: function(result) {
                        var obj = jQuery.parseJSON(result);
                        console.log(obj);
                        self.products(obj);
                    }
                }
            );
        }
    });
});