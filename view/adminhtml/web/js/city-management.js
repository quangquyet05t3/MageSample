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
                    var editForm = jQuery('#city-form');
                    var formData = editForm.serialize();
                    //Validate
                    var pop = this;
                    jQuery.ajax({
                        type: 'POST',
                        url: editForm.attr('action'),
                        data: formData,
                        dataType:'json',
                        success: function (data) {
                            if(!data.error) {
                                pop.closeModal();
                                //reloadGrid();
                            }else{
                                alert('error');
                            }
                        }
                    });
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
