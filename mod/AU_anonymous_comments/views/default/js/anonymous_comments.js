define(['require', 'jquery'], function(require, $) {

    $('.moderation-controls').insertBefore($('form.elgg-form-comment-save'));

    $(document).on('change', '.moderated-comment input[type="checkbox"]', function(e) {
        var val = $(this).val();
        var $hidden_inputs = $('.moderation-controls .hidden-inputs');
        if ($(this).is(':checked')) {
            
            // add hidden input to our form
            if (!$('input[value="'+val+'"]', $hidden_inputs).length) {
                var $html = '<input type="hidden" name="guid[]" value="'+val+'">';
                $($html).appendTo($hidden_inputs);
            }
            
        }
        else {
            
            // remove hidden input from our form
            if ($('input[value="'+val+'"]', $hidden_inputs).length) {
                $('input[value="'+val+'"]', $hidden_inputs).remove();
            }
            
            // uncheck the select-all checkbox
            $('.moderation-controls input[type="checkbox"]').removeAttr('checked');
        }
    });
    
    
    $(document).on('click', '.moderation-controls input[type="checkbox"]', function(e) {
        if ($(this).is(':checked')) {
            // check all others
            $('.moderated-comment input[type="checkbox"]').each(function(index, elem) {
                $(elem).attr("checked", "checked").trigger('change');
            });
        }
        else {
            $('.moderated-comment input[type="checkbox"]').each(function(index, elem) {
                $(elem).removeAttr('checked').trigger('change');
            });
        }
    });
});