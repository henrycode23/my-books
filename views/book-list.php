<?php
    global $wpdb;
    $all_books = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT * FROM ".my_book_table()." ORDER BY id DESC", ""
        ), ARRAY_A
    );

    // print_r($all_books);

    // function display_all_books(){
    //     if( count($all_books) < 0 ){
    //         $serial_number_init = 1;
    //         foreach( $all_books as $key => $value ){
    //             echo "<tr>";
    //             echo "<td>".$serial_number_init."</td>";
    //             echo "<td>".$value['name']."</td>";
    //             echo "<td>".$value['author']."</td>";
    //             echo "<td>".$value['about']."</td>";
    //             echo "<td>".$value['book_image']."</td>";
    //             echo "<td>".$value['created_at']."</td>";
    //             echo "<td><a class='btn btn-info' href='javascript:void(0)'>Edit</a><a class='btn btn-danger' href='javascript:void(0)'>Delete</a></td>";
    //             echo "</tr>";
    //         }
    //     }
    // }


?>

<div class="container">
  <div class="row">
  <br>
  <div class="alert alert-info">
    <h5>My Book List</h5>
  </div>
  <div class="panel panel-primary">
    <div class="panel-heading">My Book List</div>
      <div class="panel-body">
        <table id="my-book" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Sr No.</th>
                    <th>Name</th>
                    <th>Author</th>
                    <th>About</th>
                    <th>Book Image</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if( count($all_books) > 0 ){
                        $serial_number_init = 1;
                        foreach( $all_books as $key => $value ){
                            echo "<tr>";
                            echo "<td>".$serial_number_init++."</td>";
                            echo "<td>".$value['name']."</td>";
                            echo "<td>".$value['author']."</td>";
                            echo "<td>".$value['about']."</td>";
                            echo "<td><img src='".$value['book_image']."' style='height=80px;width:80px;'></td>";
                            echo "<td>".$value['created_at']."</td>";
                            echo "<td><a class='btn btn-info' href='javascript:void(0)'>Edit</a><a class='btn btn-danger' href='javascript:void(0)'>Delete</a></td>";
                            echo "</tr>";
                        }
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Sr No.</th>
                    <th>Name</th>
                    <th>Author</th>
                    <th>About</th>
                    <th>Book Image</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>