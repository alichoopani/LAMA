@extends('LAMA.layouts.app')


@section('content')


    <!-- begin #page-container -->
    <div id="page-container" class="fade page-sidebar-fixed page-header-fixed page-with-right-sidebar">
        <!-- begin #header -->
        <div id="header" class="header navbar-default">
            <!-- begin navbar-header -->
            <div class="navbar-header">
                <a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> <b></b> LAMA</a>
                <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- end navbar-header -->

            <!-- begin header-nav -->
            <ul class="navbar-nav navbar-right">
                <li id="select-role-li" class="dropdown-toggle"></li>

                <li id="select-organ-li" class="dropdown-toggle"></li>

                <li class="dropdown navbar-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                        <img class="user_avatar-field" src="{{ asset('/LAMA/templates/_1/assets/img/user/undefined-user.png') }}" onerror="this.src='default-image.jpg';" alt="" />
                        <span class="d-none d-md-inline username-filed"></span> <b class="caret"></b>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="/admin/logout" class="dropdown-item">Log Out</a>
                    </div>
                </li>
            </ul>
            <!-- end header navigation right -->
        </div>
        <!-- end #header -->

        <!-- begin #sidebar -->
        <div id="sidebar" class="sidebar">
            <!-- begin sidebar scrollbar -->
            <div data-scrollbar="true" data-height="100%">
                <!-- begin sidebar user -->
                <ul class="nav">
                    <li class="nav-profile">
                            <div class="image">
                                <img class="user_avatar-field" src="{{ asset('/LAMA/templates/_1/assets/img/user/undefined-user.png') }}" alt="" />
                            </div>
                            <div class="info ">
                                <strong class="name-filed"></strong>
                                <br>
                                <span class="label label-light">
                                    <strong class="role-title"></strong>
                                    <<
                                    <strong class="organ-title"></strong>
                                </span>

                            </div>
                    </li>

                </ul>
                <!-- end sidebar user -->
                <!-- begin sidebar nav -->
                <ul class="nav" id="menu">

                    <!-- begin sidebar minify button -->
                    <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
                    <!-- end sidebar minify button -->
                </ul>
                <!-- end sidebar nav -->
            </div>
            <!-- end sidebar scrollbar -->
        </div>
        <div class="sidebar-bg"></div>
        <!-- end #sidebar -->

        <!-- begin #content -->
        <div id="content" class="content">

            <div class="panel panel-inverse" data-sortable-id="ui-typography-4">

                <div class="panel-body">
                    <ol class="breadcrumb pull-left" id="module-path">
                    </ol>
                    <!-- begin page-header -->
                    <h1 class="page-header" id="module-title" style="text-align: right; direction: rtl"></h1>
                    <!-- end page-header -->
                </div>

            </div>






            <div class="row" id="module-section">
            </div>








        </div>
        <!-- end #content -->



        <!-- begin scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->

@endsection
