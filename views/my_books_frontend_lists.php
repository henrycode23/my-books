<?php
  global $wpdb;
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
        <p><?php echo $value->author; ?></p>
        <p><button class="btn btn-success">Enroll Now</button></p>
      </div>
      <?php
    }
  }

?>



