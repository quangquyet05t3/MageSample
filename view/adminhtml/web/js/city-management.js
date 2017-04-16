require(
    [
        'jquery',
        'Magento_Ui/js/modal/modal',
        'mage/mage',
        'uiRegistry'
    ],
    function(
        $,
        modal,
        mage,
        registry
        ) {


        var options = {
            type: 'popup',
            responsive: true,
            innerScroll: true,
            title: 'City Management',
            buttons: [{
                text: $.mage.__('Save'),
                class: 'action-default primary save',
                click: function () {
                    alert('Save City');
                    $('#popup-modal').modal('closeModal');

                }
            }]
        };
        modal(options, $('#popup-modal'));
        $("#addCity").on("click",function(event){
            event.preventDefault();
            $('#popup-modal').modal('openModal');
        });
    }
);
