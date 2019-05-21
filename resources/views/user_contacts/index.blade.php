@include('includes.navigation');
<div class="container-fluid">
    <h2>Manage User Contacts</h2>
    @if(Session::has('message'))
    <div class="alert alert-success">
        <strong><span class="glyphicon glyphicon-ok"></span>{{ Session::get('message') }}</strong>
    </div>
    @endif
    <div class="row">
        <button id="share" class="btn btn-success">Share contact</button>
    </div>
        <hr>


    @if(count($user_contactss)>0)
    <table class="table table-hover table-bordered table-responsive" id="datatables">
        <thead>
            <tr>
                <th width="5%"><input type="checkbox" class="check" value="ALL" id="ALL" title="Select All"></th>
                <th>Sr. No.</th>
                <th>Name</th>
                <th>Primary No.</th>
                <th>Secondary No.</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1 ?>
            @foreach($user_contactss as $user_contacts)
            <tr>
                <td> <input type="checkbox" class="check" value="{{$i}}" title="{{$i}}"> </td>
                <td>{{$i}} </td>
                <td> <a class="btn btn-xs btn-default" href="{{Request::root()}}/user_contacts/view-user_contacts/{{$user_contacts->id}}"> {{$user_contacts->first_name }}</a> </td>
                <td> {{ $user_contacts->primary_phone }} </td>
                <td> {{ $user_contacts->secondary_phone }} </td>
                <td> {{ $user_contacts->email_id }} </td>
                <td>
                    {{-- <a class="btn btn-xs btn-default" href="{{Request::root()}}/user_contacts/change-status-user_contacts/{{$user_contacts->id }}"> @if($user_contacts->status==0) {{"Activate"}} @else {{"Dectivate"}} @endif </a> --}}
                    <a class="btn btn-xs btn-warning" href="{{Request::root()}}/user_contacts/edit-user_contacts/{{$user_contacts->id}}">Edit</a>
                    <a class="btn btn-xs btn-danger" href="{{Request::root()}}/user_contacts/delete-user_contacts/{{$user_contacts->id}}" onclick="return confirm('are you sure to delete')">Delete</a>
                </td>
            </tr>
            <?php $i++;  ?>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="alert alert-info" role="alert">
        <strong>No User_contactss Found!</strong>
    </div>
    @endif
   
</div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <form role="form" method="post" id="sharedForm" action="{{Request::root()}}/contacts_shared/add-contacts_shared-post">
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Share With</h4>
                </div>
                <div class="modal-body">
                    <select class="form-control" name="shared_to" id="shared_to">
                        <option value="">select user</option>
                        @foreach($users as $usersKey => $usersValue)
                            <option value="<?php echo $usersValue->id ?>"><?php echo ucfirst($usersValue->name); ?></option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
                    <button type="submit" class="btn btn-success">Share</button>
                </div>
            </div>
        </form>
        <!-- Modal--> 
    </div>
</div>
@include('includes.footer');
<script type="text/javascript">
$('#share').on('click', function(e) {
    $('#myModal').modal('show');
});

jQuery(document).ready(function($) {
   /* 
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': {!! csrf_token() !!} }
    });*/

    $(document).on('submit', '#sharedForm', function(event) {
        event.preventDefault();

        var contactList = [];
        if($('#ALL').is(':checked')){
                contactList.push('ALL');
        }else{
            $('.check:checked').each(function(i, e) {
                contactList.push($(this).val());
            });
        }
        var $data = {   'contactList[]': contactList/*.join()*/, 
                        'shared_to':$('#shared_to').val(), 
                        "_token": "{{ csrf_token() }}" 
                    };
        console.log($data);
        $.ajax({
            url: 'shared_contacts/add-shared_contacts-post',
            type: "POST",
            dataType: "json",
            data: $data,
            success: function(res) {
                console.log(res);
                if (res.status) {
                    $('#myModal').modal('hide');
                    window.location.reload();
                } else {
                    alert('error');
                }
            }
        });

    });

});
</script>
