jQuery(document).ready(function($){
    $('.image-delete-btn').on('click', function(e){
        return confirm('Are you sure you want to Delete?');
    });
    $('.suscriber_news').on('click', function(e){
        return confirm('Are you sure you want to Delete This suscriber?');
    });
    $('.file-delete-btn').on('click', function(e){
        return confirm('Are you sure you want to Delete This file?');
    });
    $('.ck-editor-field').ckeditor();
    // CKEDITOR.replace('news_content', {
    //     height: 300,
    //     extraPlugins: 'filebrowser',
    //     // Configure your file manager integration. This example uses CKFinder 3 for PHP.
    //     filebrowserBrowseUrl: 'assets/js/ckfinder/ckfinder.html',
    //     filebrowserImageBrowseUrl: 'assets/js/ckfinder/ckfinder.html?type=Images',
    //     filebrowserUploadUrl: 'assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    //     filebrowserImageUploadUrl: 'assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    //     removeButtons: 'PasteFromWord'
    //   });
    var editor = CKEDITOR.replace( 'news_content' );
    CKFinder.setupCKEditor( editor );
    $('.datepicker').datepicker();
});