<div class="container-fluid">
  <br>
  <div class="alert alert-info">
    <h4>Student Add Page</h4>
  </div>
  <div class="panel panel-primary">
    <div class="panel-heading">Add New Student</div>
    <div class="panel-body">
      <form class="form-horizontal" action="javascript:void(0)" id="frmAddStudent">
        <div class="form-group">
          <label class="control-label col-sm-2" for="name">Name:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Email:</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="username">Username:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="password">Password:</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="confirm_password">Password:</label>
          <div class="col-sm-10">
            <input type="confirm_password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Enter Confirm Password" required>
          </div>
        </div>
        <div class="form-group"> 
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success">Add Student</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>