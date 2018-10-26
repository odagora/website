jQuery(function($) {
    // create references to the 2 dropdown fields for later use.

    var $makes_dd = $('[name="senderMake"]');
    var $models_dd = $('[name="senderLine"]');

    // run the populate_fields function, and additionally run it every time a value changes

    populate_fields();
    $('select').change(function() {
        populate_fields();
    });

    function populate_fields() {
        var data = {

            // action needs to match the action hook part after wp_ajax_nopriv_ and wp_ajax_ in the server side script.

            'action' : 'cf7_populate_values', 

            // pass all the currently selected values to the server side script.

            'senderMake' : $makes_dd.val(),
            'senderLine' : $models_dd.val()
        };

        // call the server side script, and on completion, update all dropdown lists with the received values.

        $.post(ajax_object.ajax_url, data, function(response) {
            all_values = response;

            $makes_dd.html('').append($('<option>').text(' '));
            $models_dd.html('').append($('<option>').text(' '));

            $.each(all_values.makes, function() {
                $option = $("<option>").text(this).val(this);
                if (all_values.current_make == this) {
                    $option.attr('selected','selected');
                }
                $makes_dd.append($option);
            });
            $.each(all_values.models, function() {
                $option = $("<option>").text(this).val(this);
                if (all_values.current_model == this) {
                    $option.attr('selected','selected');
                }
                $models_dd.append($option);
            });
        },'json');
    }
});