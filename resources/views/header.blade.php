<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>APPONIX</title>
    <!-- Favicon icon -->
    <link rel="icon" type="public/assets/image/png" sizes="16x16" href="{{ url('public/icon/apponix-favicon.png') }}">
    <!-- Pignose Calender -->
    <link href="{{ url('public/assets/plugins/pg-calendar/css/pignose.calendar.min.css') }}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{ url('public/assets/plugins/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet"
        href="{{ url('public/assets/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css') }}">
    {{-- sweet alert --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous"></script>
    {{-- for advertise show --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- for toogle switch --}}
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
        rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{{ url('public/assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}"
        rel="stylesheet">
    <link href="{{ url('public/assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="{{ url('') }}">
                    <b class="logo-abbr"><img style="fill: white" src="{{ url('public/icon/man-user.png') }}"
                            alt="{{ url('') }}"> </b>
                    <span class="logo-compact">Admin Panel</span>
                    {{-- <img src="{{url('public/assets/images/logo-compact.png')}}" alt="{{url('')}}"> --}}
                    <span class="brand-title">
                        <h3 style="color: white"> Admin Panel<h3>
                                {{-- <img src="{{url('public/assets/images/logo-text.png')}}" alt="{{url('')}}"> --}}
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>


                <div class="header-right">
                    <ul class="clearfix">
                        {{-- <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-email-outline"></i>
                                <span class="badge badge-pill gradient-1">5</span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">3 New Messages</span>  
                                    <a href="javascript:void()" class="d-inline-block">
                                        <span class="badge badge-pill gradient-1">3</span>
                                    </a>
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li class="notification-unread">
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/1.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Saiful Islam</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="notification-unread">
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/2.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Adam Smith</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Can you do me a favour?</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/3.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Barak Obama</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/4.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Hilari Clinton</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hello</div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </li> --}}
                        {{-- <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-bell-outline"></i>
                                <span class="badge badge-pill gradient-2">3</span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">2 New Notifications</span>  
                                    <a href="javascript:void()" class="d-inline-block">
                                        <span class="badge badge-pill gradient-2">5</span>
                                    </a>
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Events near you</h6>
                                                    <span class="notification-text">Within next 5 days</span> 
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Event Started</h6>
                                                    <span class="notification-text">One hour ago</span> 
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Event Ended Successfully</h6>
                                                    <span class="notification-text">One hour ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Events to Join</h6>
                                                    <span class="notification-text">After two days</span> 
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </li> --}}
                        {{-- <li class="icons dropdown d-none d-md-flex">
                            <a href="javascript:void(0)" class="log-user"  data-toggle="dropdown">
                                <span>English</span>  <i class="fa fa-angle-down f-s-14" aria-hidden="true"></i>
                            </a>
                            <div class="drop-down dropdown-language animated fadeIn  dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li><a href="javascript:void()">English</a></li>
                                        <li><a href="javascript:void()">Dutch</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li> --}}

                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="{{ url('public/assets/images/user/1.png') }}" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        {{-- <li>
                                            <a href="app-profile.html"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li> --}}
                                        {{-- <li>
                                            <a href="javascript:void()">
                                                <i class="icon-envelope-open"></i> <span>Inbox</span> <div class="badge gradient-3 badge-pill gradient-1">3</div>
                                            </a>
                                        </li> --}}

                                        <li>
                                            <a href="ChangeAdminPassword"><i class="icon-key"></i> <span>Change
                                                    Password</span></a>
                                        </li>
                                        <hr class="my-2">
                                        <li><a href="{{ url('logout') }}"><i class="icon-lock"></i>
                                                <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="header-right">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><a
                                    data-toggle="modal" data-target="#basicModal" href="{{ url('') }}"><i
                                        class="mdi mdi-bell"></i></a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- notification model --}}
        {{-- success --}}
        @if (Session::has('success'))
            <script>
                swal("Success", "", "success");

            </script>
        @endif

        <div class="modal fade" id="basicModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Send Notification</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('pushNotification') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label> Title</label>
                                <input type="text" class="form-control" name="title" required>
                            </div>
                            <div class="form-group">
                                <label> Body</label>
                                <textarea class="form-control" name="body" required></textarea>
                            </div>
                            <div class="form-group">
                                <label> Image</label>
                                <input type="file" class="form-control" name="image" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Send Notification</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                        {{-- <button type="button" class="btn btn-primary">send</button> --}}
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    {{-- <h4><li class="nav-label"><a href="{{url('')}}">Dashboard</a></li></h4> --}}
                    <li>
                        <a class="" href="{{ url('') }}" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                        {{-- <ul aria-expanded="false">
                            <li><a href="./index.html">Home 1</a></li>
                            <!-- <li><a href="./index-2.html">Home 2</a></li> -->
                        </ul> --}}
                    </li>
                    {{-- <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Layouts</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./layout-blank.html">Blank</a></li>
                            <li><a href="./layout-one-column.html">One Column</a></li>
                            <li><a href="./layout-two-column.html">Two column</a></li>
                            <li><a href="./layout-compact-nav.html">Compact Nav</a></li>
                            <li><a href="./layout-vertical.html">Vertical</a></li>
                            <li><a href="./layout-horizontal.html">Horizontal</a></li>
                            <li><a href="./layout-boxed.html">Boxed</a></li>
                            <li><a href="./layout-wide.html">Wide</a></li>
                            
                            
                            <li><a href="./layout-fixed-header.html">Fixed Header</a></li>
                            <li><a href="layout-fixed-sidebar.html">Fixed Sidebar</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li class="nav-label">Apps</li> --}}



                    <li>
                        <a href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-list"></i> <span class="nav-text">CATEGORY</span>
                        </a>
                        <ul aria-expanded="false" class="collapse in">
                            <li><a href="{{ url('add_category') }}">- Add Category</a></li>
                            <li><a href="{{ url('category_table') }}">- Category List</a></li>

                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-sliders"></i><span class="nav-text">APPS</span>
                        </a>
                        <ul aria-expanded="false" class="collapse in">
                            <li><a href="{{ url('addApp') }}">- Add App</a></li>
                            <li><a href="{{ url('app_table') }}">- App List</a></li>
                        </ul>
                    </li>
                    {{-- <li>
                        <a  href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-music"></i><span class="nav-text">RINGTONE</span>
                        </a>
                        <ul aria-expanded="false" class="collapse in">
                            <li><a href="{{url('AddRingtone')}}">- Add ringtone</a></li>
                            <li><a href="{{url('RingtoneTable')}}">- Ringtone List</a></li>
                        </ul>
                    </li> --}}
                    <li>
                        <a href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-picture-o"></i><span class="nav-text">WALLPAPER</span>
                        </a>
                        <ul aria-expanded="false" class="collapse in">
                            <li><a href="{{ url('AddWallpaper') }}">- Add wallpaper</a></li>
                            <li><a href="{{ url('WallpaperTable') }}">- wallpaper List</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ url('show_ad') }}" aria-expanded="false">
                            <i class="fa fa-th-large"></i> <span class="nav-text">ADVERTISEMENT</span>
                        </a>
                        {{-- <ul aria-expanded="false">
                            <li><a href="{{url('show_ad')}}">Show </a></li>
                          
                        </ul> --}}
                    </li>

                    {{-- <li class="nav-label">UI Components</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-grid menu-icon"></i><span class="nav-text">UI Components</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./ui-accordion.html">Accordion</a></li>
                            <li><a href="./ui-alert.html">Alert</a></li>
                            <li><a href="./ui-badge.html">Badge</a></li>
                            <li><a href="./ui-button.html">Button</a></li>
                            <li><a href="./ui-button-group.html">Button Group</a></li>
                            <li><a href="./ui-cards.html">Cards</a></li>
                            <li><a href="./ui-carousel.html">Carousel</a></li>
                            <li><a href="./ui-dropdown.html">Dropdown</a></li>
                            <li><a href="./ui-list-group.html">List Group</a></li>
                            <li><a href="./ui-media-object.html">Media Object</a></li>
                            <li><a href="./ui-modal.html">Modal</a></li>
                            <li><a href="./ui-pagination.html">Pagination</a></li>
                            <li><a href="./ui-popover.html">Popover</a></li>
                            <li><a href="./ui-progressbar.html">Progressbar</a></li>
                            <li><a href="./ui-tab.html">Tab</a></li>
                            <li><a href="./ui-typography.html">Typography</a></li>
                        <!-- </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-layers menu-icon"></i><span class="nav-text">Components</span>
                        </a>
                        <ul aria-expanded="false"> -->
                            <li><a href="./uc-nestedable.html">Nestedable</a></li>
                            <li><a href="./uc-noui-slider.html">Noui Slider</a></li>
                            <li><a href="./uc-sweetalert.html">Sweet Alert</a></li>
                            <li><a href="./uc-toastr.html">Toastr</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="widgets.html" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Widget</span>
                        </a>
                    </li>
                    <li class="nav-label">Forms</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-note menu-icon"></i><span class="nav-text">Forms</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./form-basic.html">Basic Form</a></li>
                            <li><a href="./form-validation.html">Form Validation</a></li>
                            <li><a href="./form-step.html">Step Form</a></li>
                            <li><a href="./form-editor.html">Editor</a></li>
                            <li><a href="./form-picker.html">Picker</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Table</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Table</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./table-basic.html" aria-expanded="false">Basic Table</a></li>
                            <li><a href="./table-datatable.html" aria-expanded="false">Data Table</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Pages</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-notebook menu-icon"></i><span class="nav-text">Pages</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./page-login.html">Login</a></li>
                            <li><a href="./page-register.html">Register</a></li>
                            <li><a href="./page-lock.html">Lock Screen</a></li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                                <ul aria-expanded="false">
                                    <li><a href="./page-error-404.html">Error 404</a></li>
                                    <li><a href="./page-error-403.html">Error 403</a></li>
                                    <li><a href="./page-error-400.html">Error 400</a></li>
                                    <li><a href="./page-error-500.html">Error 500</a></li>
                                    <li><a href="./page-error-503.html">Error 503</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li> --}}
                </ul>
            </div>
        </div>
        <div class="content-body">
