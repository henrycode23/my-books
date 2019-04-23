<?php
    global $wpdb;
    $all_students = $wpdb->get_results(
        $wpdb->prepare(
          "SELECT * FROM ".my_students_table()." ORDER BY id DESC", ""
        )
    );

    // print_r($all_students);
?>

<div class="container-fluid"> 
  <br>
  <div class="alert alert-info">
    <h5>My Student List</h5>
  </div>
  <div class="panel panel-primary">
    <div class="panel-heading">My Student List</div>
      <div class="panel-body">
        <table id="my-book" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Sr No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              <?php
                if( count($all_students) > 0 ){
                  $serial_number_init = 1;
                  foreach( $all_students as $key => $value ){
                    // access wp_users table via wp_my_students table column user_login_id
                    $userdetails = get_userdata( $value->user_login_id );
              ?>
                    <tr>
                      <td><?php echo $serial_number_init++; ?></td>
                      <td><?php echo $value->name; ?></td>
                      <td><?php echo $value->email; ?></td>
                      <td><?php echo $userdetails->user_login; ?></td>
                      <td><?php echo $value->created_at; ?></td>
                      <td>
                        <button class="btn btn-danger">Delete</button>
                      </td>
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