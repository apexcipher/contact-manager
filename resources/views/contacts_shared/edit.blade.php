@include('includes.navigation');
<div class="container">
    <h2>Update Contacts_shared</h2>
    <form role="form" method="post" action="{{Request::root()}}/contacts_shared/edit-contacts_shared-post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" value="<?php echo $contacts_shared->id ?>" name="contacts_shared_id">
        <div class="form-group">
            <label for="user_contacts_id">User_contacts_id:</label>
            <input type="text" value="<?php echo $contacts_shared->user_contacts_id ?>" class="form-control" id="user_contacts_id" name="user_contacts_id">
        </div>
        <div class="form-group">
            <label for="users_id">Users_id:</label>
            <input type="text" value="<?php echo $contacts_shared->users_id ?>" class="form-control" id="users_id" name="users_id">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@include('includes.footer');
