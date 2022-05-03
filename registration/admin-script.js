jQuery(document).ready(function($){
    $('.image-delete-btn').on('click', function(e){
        return confirm('Are you sure you want to Delete?');
    });
    $('.ck-editor-field').ckeditor();
});