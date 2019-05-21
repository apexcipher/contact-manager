

@include('includes.navigation');

<div class="container">

  <h2>Add User Contacts</h2>  
<form role="form" method="post" action="{{Request::root()}}/user_contacts/add-user_contacts-post"  enctype="multipart/form-data" >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
    <label for="first_name">First name:</label>
    <input type="text" class="form-control" id="first_name" name="first_name">
  </div>
    <div class="form-group">
    <label for="middle_name">Middle name:</label>
    <input type="text" class="form-control" id="middle_name" name="middle_name">
  </div>
    <div class="form-group">
    <label for="last_name">Last name:</label>
    <input type="text" class="form-control" id="last_name" name="last_name">
  </div>
    <div class="form-group">
    <label for="primary_phone">Primary phone:</label>
    <input type="text" class="form-control" id="primary_phone" name="primary_phone">
  </div>
    <div class="form-group">
    <label for="secondary_phone">Secondary phone:</label>
    <input type="text" class="form-control" id="secondary_phone" name="secondary_phone">
  </div>
    <div class="form-group">
    <label for="email_id">Email id:</label>
    <input type="email" class="form-control" id="email_id" name="email_id">
  </div>
    <div class="form-group">
    <label for="user_image">User Image:</label>
    <input type="file" class="btn btn-primary" id="user_image" name="user_image">
  </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@include('includes.footer');
