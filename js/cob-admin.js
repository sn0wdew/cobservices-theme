jQuery(document).ready(function($){
  var mediaUploader;

  $('#tips-upload-button').on('click', function(e){
    e.preventDefault();

    // Check if Media Uploader is defined
    if (mediaUploader){
      mediaUploader.open();
      return;
    }

    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: 'Choose a Background Image',
      button: {
        text: 'Chose Picture'
      },
      multiple: false
    });

    mediaUploader.on('select', function(){
      attachment = mediaUploader.state().get('selection').first().toJSON();
      $('#tips-bk-image').val(attachment.url);
    });

    mediaUploader.open();

  });

  $('#tips-upload-button-rm').on('click', function(e){
    e.preventDefault();
    $('#tips-bk-image').val('');
  });


});
