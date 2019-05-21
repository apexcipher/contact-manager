@include('includes.navigation');
<div class="container-fluid">
    <h2>Manage Users</h2>
    @if(Session::has('message'))
    <div class="alert alert-success">
        <strong><span class="glyphicon glyphicon-ok"></span>{{ Session::get('message') }}</strong>
    </div>
    @endif
    @if(count($userss)>0)
    <table class="table table-hover  table-bordered table-responsive" id="datatables">
        <thead>
            <tr>
                <th>SL No</th>
                <th>first_name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1 ?>
            @foreach($userss as $users)
            <tr>
                <td>{{$i}} </td>
                <td> <a  class="btn btn-xs btn-default" href="{{Request::root()}}/users/view-users/{{$users->id}}"> {{$users->first_name }}</a> </td>
                <td>
                    {{-- <a  class="btn btn-xs btn-warning" href="{{Request::root()}}/users/change-status-users/{{$users->id }}"> @if($users->status==0) {{"Activate"}} @else {{"Dectivate"}} @endif </a> --}}
                    <a  class="btn btn-xs btn-warning" href="{{Request::root()}}/users/edit-users/{{$users->id}}">Edit</a>
                    <a  class="btn btn-xs btn-danger" href="{{Request::root()}}/users/delete-users/{{$users->id}}" onclick="return confirm('are you sure to delete')">Delete</a>
                </td>
            </tr>
            <?php $i++;  ?>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="alert alert-info" role="alert">
        <strong>No Userss Found!</strong>
    </div>
    @endif
</div>
@include('includes.footer');
