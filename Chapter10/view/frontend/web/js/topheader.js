define(['jquery', 'uiComponent', 'ko'], function ($, Component, ko) {
        'use strict';

        return Component.extend({
            defaults: {
                template: 'Magenest_Chapter10/topheader',
                data: '',
            },

            initialize: function () {
                this.listModel = ko.observableArray([]);
                // this.textOption = ko.observable();
                // this.valueCode = ko.observable();
                this.valueSelect = ko.observable();
                this.color = ko.observable();
                this.codeValue = ko.observable();
                this._super();
                this.initListModel();
            },

            initListModel: function (){
                var self = this;
                if (this.data == '') {
                    return;
                }
                self.listModel.push({color: 'default', codeValue: '#ffffff'});
                $.each(this.data, function (key, value) {

                    var listModelItem = {
                        color: value.color, codeValue: value.code
                    };
                    self.listModel.push(listModelItem);
                });
            },

            setColor: function () {
                var codeColor = this.valueSelect();
                document.getElementsByTagName("body")[0].style.background = codeColor;
                console.log('Hello');

            }




        });
    }
);







