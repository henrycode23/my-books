<?php
/*
Template Name: Frontend book page layout
*/
get_header(); // header.php of theme
?>

<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="alert alert-success">
        <h3>Online Web Tutor Courses</h3>
      </div>

      <?php echo do_shortcode( '[book_page]' ); ?>
    </div>
  </div>
</div>

<?php
get_footer(); // footer.php of theme
?>
