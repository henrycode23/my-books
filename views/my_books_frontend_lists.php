<?php
  global $wpdb;
  global $user_ID; // stores the user id of the login user
  $getallbooks = $wpdb->get_results(
      $wpdb->prepare(
        "SELECT * FROM ".my_book_table()." ORDER BY id DESC",""
      )
  );

  // print_r($getallbooks);

  if( count($getallbooks) > 0 ){
    foreach( $getallbooks as $key => $value ){
      ?>
      <div class="col-sm-4 owt-layout">
        <p><img src="<?php echo $value->book_image; ?>" style="height:100px;width:100px;"></p>
        <p><?php echo $value->name; ?></p>
        <p><?php echo get_author_details($value->author)['name']; ?></p>
        <p>
        <?php
          if($user_ID > 0){
            // login state
        ?>
            <a href="javascript:void(0)" class="btn btn-success owt-enroll-btn">Enroll Now</a>
        <?php
          } else{
            // logout state
        ?>
            <a href="<?php echo wp_login_url(); ?>" class="btn btn-success owt-enroll-btn">Login to Enroll</a>
        <?php
          }
        ?>
          
        </p>
      </div>
      <?php
    }
  }

?>



