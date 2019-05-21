@include('includes.header')
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">
            <img src="http://placehold.it/200x50&fontsize=25&text=Contact Manager" alt="LOGO">
        </a>
    </div>
    <!-- Top Menu Items -->
    <ul class=" nav navbar-right top-nav">
        <li><a href="#" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Stats"><i class="fa fa-bar-chart-o"></i>
            </a>
        </li>
        <li class="dropdown">
            <?php
                $userObj = Auth::user();
            ?>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo ucfirst($userObj->name); ?> <b class="fa fa-angle-down"></b></a>
            <ul class="dropdown-menu">
                <!-- 
                <li><a href="#"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                <li><a href="#"><i class="fa fa-fw fa-cog"></i> Change Password</a></li> 
                -->
                <li class="divider"></li>
                <li><a href="{{Request::root()}}/logout"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="investigaciones/favoritas"><i class="fa fa-fw fa-search"></i> Search </a>
            </li>
            <li class="sr-only">
                <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-user-plus"></i> Users <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                <ul id="submenu-1" class="collapse">
                    <li><a href="{{Request::root()}}/users"><i class="fa fa-angle-double-right"></i> List Users</a></li>
                    <li><a href="{{Request::root()}}/users/add-users"><i class="fa fa-angle-double-right"></i> Add Users</a></li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-user-plus"></i> Contacts <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                <ul id="submenu-2" class="collapse">
                    <li><a href="{{Request::root()}}/user_contacts"><i class="fa fa-angle-double-right"></i> List User Contacts</a></li>
                    <li><a href="{{Request::root()}}/user_contacts/add-user_contacts"><i class="fa fa-angle-double-right"></i>Add User Contacts</a></li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#submenu-3"><i class="fa fa-fw fa-user-plus"></i>Shared Contacts <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                <ul id="submenu-3" class="collapse">
                    <li><a href="{{Request::root()}}/shared_contacts"><i class="fa fa-fw fa-paper-plane-o"></i> Shared with You</a></li>
                    <li><a href="{{Request::root()}}/shared_contacts"><i class="fa fa-fw fa-paper-plane-o"></i> You Shared Contacts</a></li>
                    {{-- <li><a href="{{Request::root()}}/shared_contacts/add-shared_contacts"><i class="fa fa-angle-double-right"></i> Share Contacts</a></li> --}}
                </ul>
            </li>
            {{-- <li> --}}
                {{-- <a href="{{Request::root()}}/shared_contacts"><i class="fa fa-fw fa-paper-plane-o"></i> Shared Contacts</a> --}}
                {{-- </li> --}}
            <li>
                <a href="faq"><i class="fa fa-fw fa fa-question-circle"></i> FAQ</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row" id="main">
            <div class="col-sm-12 col-md-12" id="content">
                {{-- <h4 class="panel panel-default panel-body">Welcome {{Session::get('username')}}!</h4> --}}
