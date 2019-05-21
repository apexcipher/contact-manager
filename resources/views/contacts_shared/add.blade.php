@include('includes.navigation');
<div class="container">
    <h2>Add Contacts_shared</h2>
    <form role="form" method="post" action="{{Request::root()}}/contacts_shared/add-contacts_shared-post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="user_contacts_id">User_contacts_id:</label>
            <input type="text" class="form-control" id="user_contacts_id" name="user_contacts_id">
        </div>
        <div class="form-group">
            <label for="users_id">Users_id:</label>
            <input type="text" class="form-control" id="users_id" name="users_id">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@include('includes.footer');
