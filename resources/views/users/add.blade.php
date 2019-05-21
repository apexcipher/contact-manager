
@include('includes.navigation');


<div class="container">

  <h2>Add Users</h2>  
<form role="form" method="post" action="{{Request::root()}}/users/add-users-post" >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
    <label for="first_name">First name:</label>
    <input type="text" class="form-control" id="first_name" name="first_name">
  </div>
    <div class="form-group">
    <label for="last_name">Last name:</label>
    <input type="text" class="form-control" id="last_name" name="last_name">
  </div>
    <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
    <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="form-group">
<label for="gender">Gender:</label>

<input type="radio" name="gender" value="MALE"> MALE
<input type="radio" name="gender" value=" FEMALE">  FEMALE</div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@include('includes.footer');
