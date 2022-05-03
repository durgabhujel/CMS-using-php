jQuery(document).ready(function($){
    $('.datepicker').datepicker();
    $('.show-subscribe-form').on('click', function(){
        $('.subscribe-form-wrapper').toggle();
        $(this).toggle();
    });
    $('.close-form').on('click', function(){
        $('.subscribe-form-wrapper').toggle();
        $('.show-subscribe-form').toggle();
    });
    $('.download-btn').on('click', function(e){
        return confirm('Do you want to download this file?');
    });

});