<div class="container-fluid">
  <br>
  <div class="alert alert-info">
    <h4>Author Add Page</h4>
  </div>
  <div class="panel panel-primary">
    <div class="panel-heading">Add New Book</div>
    <div class="panel-body">
      <form class="form-horizontal" action="javascript:void(0)" id="frmAddAuthor">
        <div class="form-group">
          <label class="control-label col-sm-2" for="name">Name:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="fb_link">FB Link:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="fb_link" name="fb_link" placeholder="Enter Facebook URL" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="about">About:</label>
          <div class="col-sm-10">
            <textarea name="about" id="about" class="form-control" cols="30" rows="10" placeholder="Enter About..."></textarea>
          </div>
        </div>
        <div class="form-group"> 
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success">Add Author</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>