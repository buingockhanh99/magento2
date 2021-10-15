define(['jquery', 'uiComponent', 'ko'], function ($, Component, ko) {
        'use strict';

        var count = 0;
        var id;
        return Component.extend({
            defaults: {
                template: 'Magenest_Chapter10/setcolor',
                data: '',
            },


            initialize: function () {

                this.listModel = ko.observableArray([]);
                this.color = ko.observable();
                this.colorCode = ko.observable();
                this._super();
                this.initListModel();
            },


            initListModel: function () {
                var self = this;
                if (this.data == '') {
                    return;
                }
                $.each(this.data, function (key, value) {

                    var nameColor = "groups[post][fields][colorpicker][value][" + key + "][color]",
                        nameCode = "groups[post][fields][colorpicker][value][" + key + "][code]";
                    var listModelItem = {
                        color: value.color,
                        codeColor: value.code,
                        nameColor: nameColor,
                        nameCode: nameCode
                    };

                    self.listModel.push(listModelItem);
                    count++;

                });
                id = count + 1;
            },

            addNew: function () {
                // var nameColor = "groups[post][fields][colorpicker][value][element][][color]";
                // var nameCode = "groups[post][fields][colorpicker][value][element][][code]";
                var nameColor = "groups[post][fields][colorpicker][value][_" + id + "][color]";
                var nameCode = "groups[post][fields][colorpicker][value][_" + id + "][code]";
                this.listModel.push({
                    color: this.color(),
                    codeColor: this.colorCode(),
                    nameColor: nameColor,
                    nameCode: nameCode
                });
                id++;


            },

            /**
             * @param {String} attribute
             */
            removeTask: function (attribute) {
                this.listModel.remove(attribute);
            },


        });
    }
);







