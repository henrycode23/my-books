jQuery(document).ready(function() {


  jQuery('#frmAddAuthor').validate({
    submitHandler:function(){
      var postdata = 'action=mybooklibrary&param=save_author&' + jQuery('#frmAddAuthor').serialize();
      jQuery.post(mybookajaxurl, postdata, function(response){
        var data = jQuery.parseJSON(response);
        if( data.status == 1 ){
          jQuery.notifyBar({ 
            cssClass:'success', 
            html:data.message 
          }); 
        }else{

        }
      });
    }
  });

  
  //==================== Image Upload Single and Shows to Frontend ====================
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



  //==================== DataTable Use ====================
  jQuery('#my-book').DataTable();



  //==================== AJAX Requests, Post Data for Adding Book to DB ====================
  jQuery('#frmAddBook').validate({
    submitHandler:function(){
      var postdata = 'action=mybooklibrary&param=save_book&' + jQuery('#frmAddBook').serialize();
      jQuery.post(mybookajaxurl, postdata, function(response){
        var data = jQuery.parseJSON(response);
        if( data.status == 1 ){
          jQuery.notifyBar({ 
            cssClass:'success', 
            html:data.message 
          }); 
        }else{

        }
      });
    }
  });



  jQuery('#frmEditBook').validate({
    submitHandler:function(){
      var postdata = 'action=mybooklibrary&param=edit_book&' + jQuery('#frmEditBook').serialize();
      jQuery.post( mybookajaxurl, postdata, function(response){
        var data = jQuery.parseJSON(response);
        if( data.status == 1 ){
          jQuery.notifyBar({
            cssClass:'success',
            html:data.message
          });
          setTimeout(function(){
            // window.location.reload();
            location.reload();
          },1300)
        } else{
          
        }
      } );
    }
  });




  jQuery(document).on('click', ".btnbookdelete", function(){
    var conf = confirm('Are you sure you want to delete?');
    if(conf){
      var book_id = jQuery(this).attr('data-id');
      var postdata = 'action=mybooklibrary&param=delete_book&id=' + book_id;
        jQuery.post( mybookajaxurl, postdata, function(response){
          var data = jQuery.parseJSON(response);
          if( data.status == 1 ){
            jQuery.notifyBar({
              cssClass:'success',
              html:data.message
            });
            setTimeout(function(){
              // window.location.reload();
              location.reload();
            },1300)
          } else{
            
          }
        } );
    }
  });




  jQuery(document).on('click', ".btnauthordelete", function(){
    var conf = confirm('Are you sure you want to delete?');
    if(conf){
      var author_id = jQuery(this).attr('data-id');
      var postdata = 'action=mybooklibrary&param=delete_author&id=' + author_id;
        jQuery.post( mybookajaxurl, postdata, function(response){
          var data = jQuery.parseJSON(response);
          if( data.status == 1 ){
            jQuery.notifyBar({
              cssClass:'success',
              html:data.message
            });
            setTimeout(function(){
              // window.location.reload();
              location.reload();
            },1300)
          } else{
            
          }
        } );
    }
  });


});