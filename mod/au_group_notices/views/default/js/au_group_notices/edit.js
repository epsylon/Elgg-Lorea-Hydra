define(['require', 'jquery'], function(require, $) {
    $("#au-show-notices").click(function() {
        $(".au-group-notice-blurb-inner").toggle();
    });

    $(".au-group-notice-blurb").click(function() {
        $(this).next().toggle();
    });
});