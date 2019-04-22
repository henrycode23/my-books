<?php
  global $wpdb;
  $all_authors = $wpdb->get_results(
      $wpdb->prepare(
        "SELECT * FROM ".my_authors_table()." ORDER BY id DESC", ""
      ), ARRAY_A
  );

  // print_r($all_authors);
?>

<div class="container-fluid"> 
  <br>
  <div class="alert alert-info">
    <h5>My Author List</h5>
  </div>
  <div class="panel panel-primary">
    <div class="panel-heading">My Author List</div>
      <div class="panel-body">
        <table id="my-book" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Sr No.</th>
                    <th>Name</th>
                    <th>Fb Link</th>
                    <th>About</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              <?php
                if( count($all_authors) > 0 ){
                  $serial_number_init = 1;
                  foreach( $all_authors as $key => $value ){
              ?>
              <tr>
                <td><?php echo $serial_number_init++ ?></td>
                <td><?php echo $value['name'] ?></td>
                <td><?php echo $value['fb_link'] ?></td>
                <td><?php echo $value['about'] ?></td>
                <td><?php echo $value['created_at'] ?></td>
                <td><a href="#" class="btn btn-danger">Delete</a></td>
              </tr>
              <?php
                  }
                }
              ?>
            </tbody>
        </table>
      </div>
    </div>
</div>