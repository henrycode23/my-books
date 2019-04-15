<div class="container">
  <div class="row">
    <div class="alert alert-info">
      <h4>Book Update Page</h4>
    </div>
    <div class="panel panel-primary">
      <div class="panel-heading">Update Book</div>
      <div class="panel-body">
        <form class="form-horizontal" action="javascript:void(0)" id="frmEditBook">
          <div class="form-group">
            <label class="control-label col-sm-2" for="name">Name:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="author">Author:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="author" name="author" placeholder="Enter Author" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="about">About:</label>
            <div class="col-sm-10">
              <textarea name="about" id="about" class="form-control" cols="30" rows="10" placeholder="Enter About..."></textarea>
            </div>
          </div>
          <div class="form-group"> 
            <label class="control-label col-sm-2" for="book_image">Upload Book Image:</label>
            <div class="col-sm-10">
              <button type="button" class="btn btn-info">Upload Image</button>
            </div>
          </div>
          <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>