jQuery(document).ready(function() {

  jQuery('#btn-upload').on('click',function(){
    var image = wp.media({
      title: 'Upload image for My Book',
      multiple: false
    }).open().on('select', function(){
      var uploadedImage = image.state().get('selection').first();
      var getImage = uploadedImage.toJSON().url;
      jQuery('#show-image').html('<img src="'+getImage+'" style="height:50px; width:50px;">');
      jQuery('#image_name').val(getImage);
    });
  });

  jQuery('#my-book').DataTable();

  jQuery('#frmAddBook').validate({
    submitHandler:function(){
      console.log(jQuery('#frmAddBook').serialize());
    }
  });

  jQuery('#frmEditBook').validate({
    submitHandler:function(){
      console.log(jQuery('#frmEditBook').serialize());
    }
  });


});