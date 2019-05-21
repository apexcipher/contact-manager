
@include('includes.navigation');


<div class="container">

  <h2>Update User_contacts</h2>  
<form role="form" method="post" action="{{Request::root()}}/user_contacts/edit-user_contacts-post" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
 <input type="hidden" value="<?php echo $user_contacts->id ?>"   name="user_contacts_id">


      <div class="form-group">
    <label for="first_name">First_name:</label>
    <input type="text" value="<?php echo $user_contacts->first_name ?>" class="form-control" id="first_name" name="first_name">
  </div>
    <div class="form-group">
    <label for="middle_name">Middle_name:</label>
    <input type="text" value="<?php echo $user_contacts->middle_name ?>" class="form-control" id="middle_name" name="middle_name">
  </div>
    <div class="form-group">
    <label for="last_name">Last_name:</label>
    <input type="text" value="<?php echo $user_contacts->last_name ?>" class="form-control" id="last_name" name="last_name">
  </div>
    <div class="form-group">
    <label for="primary_phone">Primary_phone:</label>
    <input type="text" value="<?php echo $user_contacts->primary_phone ?>" class="form-control" id="primary_phone" name="primary_phone">
  </div>
    <div class="form-group">
    <label for="secondary_phone">Secondary_phone:</label>
    <input type="text" value="<?php echo $user_contacts->secondary_phone ?>" class="form-control" id="secondary_phone" name="secondary_phone">
  </div>
    <div class="form-group">
    <label for="email_id">Email_id:</label>
    <input type="email" value="<?php echo $user_contacts->email_id ?>" class="form-control" id="email_id" name="email_id">
  </div>
    <div class="form-group">
    <label for="user_image">User_image:</label>
    <input type="file" class="btn btn-primary" id="user_image" name="user_image">
  </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@include('includes.footer');
