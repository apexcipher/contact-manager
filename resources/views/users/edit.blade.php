
@include('includes.navigation');

<div class="container">

  <h2>Update Users</h2>  
<form role="form" method="post" action="{{Request::root()}}/users/edit-users-post" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
 <input type="hidden" value="<?php echo $users->id ?>"   name="users_id">


      <div class="form-group">
    <label for="first_name">First_name:</label>
    <input type="text" value="<?php echo $users->first_name ?>" class="form-control" id="first_name" name="first_name">
  </div>
    <div class="form-group">
    <label for="last_name">Last_name:</label>
    <input type="text" value="<?php echo $users->last_name ?>" class="form-control" id="last_name" name="last_name">
  </div>
    <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" value="<?php echo $users->email ?>" class="form-control" id="email" name="email">
  </div>
  <div class="form-group">
<label for="gender">Gender:</label>

<input type="radio" name="gender" value="MALE"  <?php if($users->gender == "MALE"){ echo "checked"; } ?> > MALE
<input type="radio" name="gender" value=" FEMALE"  <?php if($users->gender == " FEMALE"){ echo "checked"; } ?> >  FEMALE</div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@include('includes.footer');
