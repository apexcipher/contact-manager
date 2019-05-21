@include('includes.navigation');
<div class="container-fluid">
    <h2>Manage Contacts_shared</h2>
    @if(Session::has('message'))
    <div class="alert alert-success">
        <strong><span class="glyphicon glyphicon-ok"></span>{{ Session::get('message') }}</strong>
    </div>
    @endif
    {{-- {{dd($contacts_shareds)}} --}}
    @if(count($contacts_shareds)>0)
    <table class="table table-hover">
        <thead>
            <tr>
                <th>SL No</th>
                <th>name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1 ?>
            @foreach($contacts_shareds as $contacts_shared)
            <tr>
                <td>{{$i}} </td>
                <td> <a href="{{Request::root()}}/shared_contacts/view-shared_contacts/{{$contacts_shared->id}}"> {{$contacts_shared->first_name }}{{$contacts_shared->last_name }}</a> </td>
                <td>
                   {{--  <a href="{{Request::root()}}/contacts_shared/change-status-contacts_shared/{{$contacts_shared->id }}"> @if($contacts_shared->status==0) {{"Activate"}} @else {{"Dectivate"}} @endif </a> --}}
                    <a href="{{Request::root()}}/shared_contacts/edit-contacts_shared/{{$contacts_shared->id}}">Edit</a>
                    <a href="{{Request::root()}}/shared_contacts/delete-contacts_shared/{{$contacts_shared->id}}" onclick="return confirm('are you sure to delete')">Delete</a>
                </td>
            </tr>
            <?php $i++;  ?>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="alert alert-info" role="alert">
        <strong>No Contacts_shareds Found!</strong>
    </div>
    @endif
</div>
@include('includes.footer');
