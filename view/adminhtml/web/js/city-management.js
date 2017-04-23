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
                                reloadGrid();
                                resetData();
                            }else{
                                alert('error');
                            }
                        }
                    });
                }
            }]
        };

        var optionsConfirm = {
            type: 'popup',
            title: $.mage.__('Confirmation delete'),
            modalClass: 'comfirm_delete_city',
            buttons: [
                {
                    text: $.mage.__('Cancel'),
                    class: 'action-secondary',
                    click: function () {
                        this.closeModal();
                    }
                },
                {
                    text: $.mage.__('Delete'),
                    class: 'action-primary',
                    click: function () {
                        var action = $('#action_delete').text();
                        $('#confirm_init').modal('closeModal');
                        $.ajax({
                            showLoader: false,
                            url: action,
                            data: '',
                            type: "GET"
                        }).done(function (data) {
                            reloadGrid();
                        }).error(function (data, status) {
                            alert(status); //show error
                        });
                    }
                }
            ]
        };

        var reloadGrid = function () {
            var target = registry.get('city_listing.city_listing_data_source');
            if (target && typeof target === 'object') {
                target.set('params.t ', Date.now());
            }
        };

        modal(options, $('#popup-modal'));
        modal(optionsConfirm, $('#confirm_init'));

        $("#addCity").on("click",function(event){
            event.preventDefault();
            resetData();
            $('#popup-modal').modal('openModal');
        });
        $('#country_id').on('change', function(){
            var countryId = $(this).val();
            var callBackUrl = $('#callback-url').val();
            jQuery.ajax({
                type: 'POST',
                url: callBackUrl,
                data: 'country_id='+countryId,
                dataType:'json',
                showLoader: true,
                success: function (data) {
                    if(!data.error) {
                        $('#region_id').empty();
                        for(var i=0;i<data.length;i++){
                            $('#region_id').append('<option value="'+data[i].value+'">'+data[i].label+'</option>');
                        }
                    }else{
                        alert('error');
                    }
                }
            });
        });


    }
);

function editCity(url) {
    jQuery.ajax({
        url:url,
        type:'GET',
        data: '',
        showLoader: true,
        success:function(data){
            jQuery('#city_id').val(data.city.city_id);
            jQuery('#region_id').empty();
            for(var i=0;i<data.regions.length;i++){
                jQuery('#region_id').append('<option value="'+data.regions[i].value+'">'+data.regions[i].label+'</option>');
            }
            jQuery('#country_id').val(data.city.country_id);
            jQuery('#region_id').val(data.city.region_id);
            jQuery('#default_name').val(data.city.default_name);
            jQuery('#location').val(data.city.location);
            jQuery('#popup-modal').modal('openModal');
        }
    });
}

function deleteCity(url) {
    jQuery('#action_delete').text(url);
    jQuery('#confirm_init').modal('openModal');
}

function resetData() {
    jQuery('#city_id').val('');
    jQuery('#country_id').val('');
    jQuery('#region_id').empty();
    jQuery('#region_id').append('<option value="">Please select a region, state or province.</option>');
    jQuery('#default_name').val('');
    jQuery('#location').val('');

}





