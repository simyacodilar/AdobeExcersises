define([
    'jquery',
    'uiComponent',
    'Magento_Customer/js/customer-data'
], function ($, Component, customerData) {
    'use strict';

    return Component.extend({
        /** @inheritdoc */
        initialize: function () {
            this._super();
            let emi_plans = customerData.get('customer-gender-section');
            let pdctprice = Number(this.price);
            let currency = this.currency;
            let html = [];
            let startEmi;
            $.each(emi_plans().emi, function (index, value) {
                let Tenure = value.tenure;
                let InterestRate = value.interest;
                let Interst_amount = pdctprice * (InterestRate / 100);
                let Intersted_amount = pdctprice + Interst_amount;
                let PlanAmount = Intersted_amount / Tenure;
                if (index == 0) {
                    startEmi = currency + PlanAmount.toFixed(2);
                }
                html[index] = '<td>' + currency + PlanAmount.toFixed(2) + 'x' + Tenure + 'm</td><td>' + currency + Interst_amount.toFixed(2) + '(' + InterestRate + '%)</td><td>' + currency + Intersted_amount.toFixed(2) + '</td>';
            });
            this.startEmi = startEmi;
            this.customeremi = html;
        }
    });
});
