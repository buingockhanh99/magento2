require(
    [
        'jquery',
        'Magento_Ui/js/modal/modal'
    ],
    function(
        $,
        modal
    ) {
        var options = {
            type: 'popup',
            responsive: true,
            innerScroll: true,
            title: 'Magenest',
            buttons: [{
                text: $.mage.__('Continue'),
                class: '',
                click: function () {
                    this.closeModal();
                }
            }]
        };

        var popup = modal(options, $('#popup-modal'));

        // $('#popup-modal').modal('openModal');
    }
);
