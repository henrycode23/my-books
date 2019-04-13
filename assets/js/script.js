// jQuery(document).ready(function() {
//     jQuery('#book').DataTable();
    

//     ////////////////////////////////////////////////////////
//    //              Upload image
//    ////////////////////////////////////////////////////////
// 	jQuery('#btn_upload').on("click", function(){
// 		var image = wp.media({
// 			title: "Upload Image for Ebuenga Book",
// 			multiple: false
// 		}).open().on("select", function(){
// 			var uploaded_image = image.state().get("selection").first();
// 			var getImage = uploaded_image.toJSON().url
// 			jQuery("#show-image").html("<img src='"+getImage+"' style='height:80px; width:80px; border-radius:4px; box-shadow: 4px 4px 8px black;'> ");
// 			jQuery("#image_name").val(getImage);
// 			jQuery("#photo_name").val(getImage);
// 		})
// 	});


//     ////////////////////////////////////////////////////////
//    //               Insert Book data
//    ////////////////////////////////////////////////////////
// 	jQuery('#frmAddBook').validate({
// 		submitHandler:function(){
// 			var postdata = "action=ebuengabooklibrary&param=save_book&"+jQuery("#frmAddBook").serialize();
// 			jQuery.post(ebuenga_ajax, postdata, function(response){
// 				var data = jQuery.parseJSON(response);
// 				if(data.status==1){
// 					clear();
// 					jQuery.notifyBar({
// 						cssClass: 'success',
// 						html: '<div class="alert alert-success message" align="center">'+data.message+'</div>'
// 					});
// 					setTimeout(function(){
// 						// window.location.reload();
// 						location.reload();
// 					}, 500)
// 				}else{

// 				}
// 			});
// 		}
// 	});

// 	////////////////////////////////////////////////////////
//    //               Update data
//    ////////////////////////////////////////////////////////
// 	jQuery('#frmEditBook').validate({
// 		submitHandler:function(){
// 			var postdata = "action=ebuengabooklibrary&param=edit_book&"+jQuery("#frmEditBook").serialize();
// 			jQuery.post(ebuenga_ajax, postdata, function(response){
// 				var data = jQuery.parseJSON(response);
// 				if(data.status==1){
// 					jQuery.notifyBar({
// 						cssClass: 'success',
// 						html: '<div class="alert alert-success message" align="center">'+data.message+'</div>'
// 					});
// 					setTimeout(function(){
// 						// window.location.reload();
// 						location.reload();
// 					}, 500)
// 					window.location = "admin.php?page=book-list";
// 				}else{

// 				}
// 			});
// 		}
// 	});


// 	////////////////////////////////////////////////////////
//    //               Delete data
//    ////////////////////////////////////////////////////////
// 	jQuery(document).on("click", ".btnbookdelete", function(){
//   		var conf = confirm("Are you sure you want to delete?");
//   		if (conf) {
//   			var book_id = jQuery(this).attr("data-id");
//   			var postdata = "action=ebuengabooklibrary&param=delete_book&id="+book_id;
// 			jQuery.post(ebuenga_ajax, postdata, function(response){
// 				var data = jQuery.parseJSON(response);
// 				if(data.status==1){
// 					jQuery.notifyBar({
// 						cssClass: 'success',
// 						html: '<div class="alert alert-success message" align="center">'+data.message+'</div>'
// 					});
// 					setTimeout(function(){
// 						// window.location.reload();
// 						location.reload();
// 					}, 500)
// 				}else{

// 				}
// 			});
//   		}

// 	});


//     ////////////////////////////////////////////////////////
//    //               Insert category data
//    ////////////////////////////////////////////////////////
// 	jQuery('#frmAddCategory').validate({
// 		submitHandler:function(){
// 			var postdata = "action=ebuengabooklibrary&param=save_category&"+jQuery("#frmAddCategory").serialize();
// 			jQuery.post(ebuenga_ajax, postdata, function(response){
// 				var data = jQuery.parseJSON(response);
// 				if(data.status==1){
// 					clear();
// 					jQuery.notifyBar({
// 						cssClass: 'success',
// 						html: '<div class="alert alert-success message" align="center">'+data.message+'</div>'
// 					});
// 					setTimeout(function(){
// 						// window.location.reload();
// 						location.reload();
// 					}, 500)
// 				}else{

// 				}
// 			});
// 		}
// 	});


// 	////////////////////////////////////////////////////////
//    //               Insert Student data
//    ////////////////////////////////////////////////////////
// 	jQuery('#frmAddStudent').validate({
// 		submitHandler:function(){
// 			var postdata = "action=ebuengabooklibrary&param=save_student&"+jQuery("#frmAddStudent").serialize();
// 			jQuery.post(ebuenga_ajax, postdata, function(response){
// 				var data = jQuery.parseJSON(response);
// 				if(data.status==1){
// 					clear();
// 					jQuery.notifyBar({
// 						cssClass: 'success',
// 						html: '<div class="alert alert-success message" align="center">'+data.message+'</div>'
// 					});
// 					setTimeout(function(){
// 						// window.location.reload();
// 						location.reload();
// 					}, 500)
// 				}else{

// 				}
// 			});
// 		}
// 	});


// 	////////////////////////////////////////////////////////
//    //               Insert Borrower data
//    ////////////////////////////////////////////////////////
// 	jQuery('#frmAddBorrower').validate({
// 		submitHandler:function(){
// 			var postdata = "action=ebuengabooklibrary&param=save_borrower&"+jQuery("#frmAddBorrower").serialize();
// 			jQuery.post(ebuenga_ajax, postdata, function(response){
// 				var data = jQuery.parseJSON(response);
// 				if(data.status==1){
// 					clear();
// 					jQuery.notifyBar({
// 						cssClass: 'success',
// 						html: '<div class="alert alert-success message" align="center">'+data.message+'</div>'
// 					});
// 					setTimeout(function(){
// 						// window.location.reload();
// 						location.reload();
// 					}, 500)
// 				}else{

// 				}
// 			});
// 		}
// 	});


// 	function clear(){
//     	var name = jQuery('#name').val('');
//     	var age = jQuery('#age').val('');
//     	var age = jQuery('#age').val('');
//     	var address = jQuery('#address').val('');
//     	var address = jQuery('#address').val('');
//     	var email = jQuery('#email').val('');
//     	var email = jQuery('#email').val('');
//     	var photo_name = jQuery('#photo_name').val('');
//     	var isbn_num = jQuery('#isbn_num').val('');
//     	var title = jQuery('#title').val('');
//     	var category_name = jQuery('#category_name').val('');
//     	var category_description = jQuery('#category_description').val('');
//     	var author = jQuery('#author').val('');
//     	var contact = jQuery('#contact').val('');
//     	var datePublished = jQuery('#datePublished').val('');
//     	var status = jQuery('#status').val('');
//     	var description = jQuery('#description').val('');
//     	var image_name = jQuery('#image_name').val('');
//     }

// });