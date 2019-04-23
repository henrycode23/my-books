<?php
if( $_REQUEST['param'] == 'save_book' ){
  $wpdb->insert( my_book_table(), array(
    'name' => $_REQUEST['name'],
    'author' => $_REQUEST['author'],
    'about' => $_REQUEST['about'],
    'book_image' => $_REQUEST['image_name']
  ) );
  echo json_encode( array('status' => 1, 'message' => 'Book created successfully') );
} elseif( $_REQUEST['param'] == 'edit_book' ){
  $wpdb->update( my_book_table(), array(
    'name' => $_REQUEST['name'],
    'author' => $_REQUEST['author'],
    'about' => $_REQUEST['about'],
    'book_image' => $_REQUEST['image_name']
  ), array(
    'id' => $_REQUEST['book_id']
  ) );
  echo json_encode( array('status' => 1, 'message' => 'Book updated successfully') );
} elseif( $_REQUEST['param'] == 'delete_book' ){
    $wpdb->delete( my_book_table(), array(
      'id' => $_REQUEST['id']
    ) );
  echo json_encode( array('status' => 1, 'message' => 'Book deleted successfully') );
} elseif( $_REQUEST['param'] == 'save_author' ){
  $wpdb->insert( my_authors_table(), array(
    'name' => $_REQUEST['name'],
    'fb_link' => $_REQUEST['fb_link'],
    'about' => $_REQUEST['about']
  ) );
  echo json_encode( array('status' => 1, 'message' => 'Author created successfully') );
} elseif( $_REQUEST['param'] == 'delete_author' ){
  $wpdb->delete( my_authors_table(), array(
    'id' => $_REQUEST['id']
  ) );
echo json_encode( array('status' => 1, 'message' => 'Author deleted successfully') );
} elseif( $_REQUEST['param'] == 'save_student' ){
  // returns values to user_login_id / wp_users
  $student_id = $user_id = wp_create_user($_REQUEST['username'], $_REQUEST['password'], $_REQUEST['email']); 
  $user = new WP_User($student_id);
  $user->set_role("wp_book_user_key");
  $wpdb->insert( my_students_table(), array(
    'name' => $_REQUEST['name'],
    'email' => $_REQUEST['email'],
    'user_login_id' => $user_id
  ) );
  echo json_encode( array('status' => 1, 'message' => 'Student created successfully') );
}
// Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem voluptatibus illum asperiores consectetur eaque similique sint magnam? Eos, doloribus quia repudiandae ea earum eaque, ullam sunt et cupiditate, incidunt odit!