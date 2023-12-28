<!-- Main left sidebar menu -->
<div id="left-sidebar" class="sidebar">
    <a href="#" class="menu_toggle"><i class="fa fa-angle-left" style="margin-top: 7px;"></i></a>
    <div class="navbar-brand">
        <a href="index.html"><img src="{{asset('assets/images/icon.svg')}}" alt="Mooli Logo" class="img-fluid logo"><span>Mooli</span></a>
        <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="fa fa-close"></i></button>
    </div>
    <div class="sidebar-scroll">
        <div class="user-account">
            <div class="user_div">
                <img src="{{asset('assets/images/user.png')}}" class="user-photo" alt="User Profile Picture">
            </div>
            <div class="dropdown">
                <span>Web Developer,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{ Auth::user()->name; }}</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                    {{-- <li><a href="page-profile.html"><i class="fa fa-user"></i>My Profile</a></li> --}}
                    <div class="mt-3 space-y-1">
                        <x-responsive-nav-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                    {{-- <li><a href="app-inbox.html"><i class="fa fa-envelope"></i>Messages</a></li> --}}
                    {{-- <li><a href="setting.html"><i class="fa fa-gear"></i>Settings</a></li> --}}
                    {{-- <li class="divider"></li> --}}
                    {{-- <li><a href="page-login.html"><i class="fa fa-power-off"></i>Logout</a></li> --}}
                </ul>
            </div>
        </div>
        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul id="main-menu" class="metismenu animation-li-delay">
                <li class="header">Main</li>
                <li class="active"><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                {{-- <li class="header">Apps</li> --}}
                {{-- <li><a href="app-inbox.html"><i class="fa fa-envelope"></i> <span>Email</span> <span class="badge badge-default mr-0">12</span></a></li> --}}
                <li><a href="{{route('user')}}"><i class="fa fa-comments"></i> <span>Users</span></a></li>
                {{-- <li><a href="app-calendar.html"><i class="fa fa-calendar"></i> <span>Calendar</span></a></li> --}}
                {{-- <li><a href="app-todo.html"><i class="fa fa-th-list"></i> <span>Todo List</span></a></li>
                <li><a href="app-filemanager.html"><i class="fa fa-folder"></i> <span>File Manager</span></a></li>
                <li><a href="app-contacts.html"><i class="fa fa-address-book"></i> <span>Contacts</span></a></li>
                <li><a href="app-scrumboard.html"><i class="fa fa-tasks"></i> <span>Scrumboard</span></a></li>
                <li><a href="page-news.html"><i class="fa fa-globe"></i> <span>Blog</span></a></li>
                <li><a href="page-social.html"><i class="fa fa-share-alt-square"></i> <span>Social</span></a></li>
                <li class="header">Vendors</li>
                <li>
                    <a href="#uiElements" class="has-arrow"><i class="fa fa-diamond"></i><span>ui Elements</span></a>
                    <ul>
                        <li><a href="ui-helper-class.html">Helper Classes</a></li>
                        <li><a href="ui-bootstrap.html">Bootstrap UI</a></li>
                        <li><a href="ui-typography.html">Typography</a></li>
                        <li><a href="ui-tabs.html">Tabs</a></li>
                        <li><a href="ui-buttons.html">Buttons</a></li>
                        <li><a href="ui-icons.html">Icons</a></li>
                        <li><a href="ui-notifications.html">Notifications</a></li>
                        <li><a href="ui-colors.html">Colors</a></li>
                        <li><a href="ui-dialogs.html">Dialogs</a></li>
                        <li><a href="ui-list-group.html">List Group</a></li>
                        <li><a href="ui-media-object.html">Media Object</a></li>
                        <li><a href="ui-modals.html">Modals</a></li>
                        <li><a href="ui-nestable.html">Nestable</a></li>
                        <li><a href="ui-progressbars.html">Progress Bars</a></li>
                        <li><a href="ui-range-sliders.html">Range Sliders</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#forms" class="has-arrow"><i class="fa fa-pencil"></i><span>Forms Elements</span></a>
                    <ul>
                        <li><a href="forms-basic.html">Basic Elements</a></li>
                        <li><a href="forms-advanced.html">Advanced Elements</a></li>
                        <li><a href="forms-validation.html">Form Validation</a></li>
                        <li><a href="forms-wizard.html">Form Wizard</a></li>
                        <li><a href="forms-dragdropupload.html">Drag &amp; Drop Upload</a></li>
                        <li><a href="forms-cropping.html">Image Cropping</a></li>
                        <li><a href="forms-summernote.html">Summernote</a></li>
                        <li><a href="forms-editors.html">CKEditor</a></li>
                        <li><a href="forms-markdown.html">Markdown</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#Tables" class="has-arrow"><i class="fa fa-table"></i><span>Tables</span></a>
                    <ul>
                        <li><a href="table-normal.html">Normal Tables</a></li>
                        <li><a href="table-jquery-datatable.html">Jquery Datatables</a></li>
                        <li><a href="table-editable.html">Editable Tables</a></li>
                        <li><a href="table-color.html">Tables Color</a></li>
                        <li><a href="table-filter.html">Table Filter</a></li>
                        <li><a href="table-dragger.html">Table dragger</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#charts" class="has-arrow"><i class="fa fa-pie-chart"></i><span>Charts</span></a>
                    <ul>
                        <li><a href="chart-apex.html">Apex Charts</a></li>
                        <li><a href="chart-c3.html">C3 Charts</a></li>
                        <li><a href="chart-morris.html">Morris Chart</a></li>
                        <li><a href="chart-flot.html">Flot Chart</a></li>
                        <li><a href="chart-chartjs.html">ChartJS</a></li>
                        <li><a href="chart-jquery-knob.html">Jquery Knob</a></li>
                        <li><a href="chart-sparkline.html">Sparkline Chart</a></li>
                    </ul>
                </li>
                <li class="header">More Pages</li>
                <li><a href="widgets.html"><i class="fa fa-puzzle-piece"></i><span>Widgets</span></a></li>
                <li>
                    <a href="#Pages" class="has-arrow"><i class="fa fa-folder"></i><span>Pages</span></a>
                    <ul>
                        <li><a href="page-login.html">Login</a></li>
                        <li><a href="page-register.html">Register</a></li>
                        <li><a href="page-forgot-password.html">Forgot Password</a></li>
                        <li><a href="page-404.html">Page 404</a></li>
                        <li><a href="page-blank.html">Blank Page</a></li>
                        <li><a href="page-search-results.html">Search Results</a></li>
                        <li><a href="page-profile.html">Profile </a></li>
                        <li><a href="page-invoices.html">Invoices </a></li>
                        <li><a href="page-gallery.html">Image Gallery </a></li>
                        <li><a href="page-timeline.html">Timeline</a></li>
                        <li><a href="page-pricing.html">Pricing</a></li>
                    </ul>
                </li>
                <li><a href="map-jvectormap.html"><i class="fa fa-map"></i> <span>jVector Maps</span></a></li>
                <li class="extra_widget">
                    <div class="form-group">
                        <label class="d-block">Traffic this Month <span class="float-right">77%</span></label>
                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="d-block">Server Load <span class="float-right">50%</span></label>
                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- Right bar chat  -->
<div id="rightbar" class="rightbar">
    <div class="slim_scroll">
        <div class="chat_list">
            <form>
                <div class="input-group c_input_group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-magnifier"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Search...">
                </div>
            </form>
            <div class="body">
                <ul class="nav nav-tabs3 white mt-3 d-flex text-center">
                    <li class="nav-item flex-fill"><a class="nav-link active show" data-toggle="tab" href="#chat-Users">Chat</a></li>
                    <li class="nav-item flex-fill"><a class="nav-link" data-toggle="tab" href="#chat-Groups">Groups</a></li>
                    <li class="nav-item flex-fill"><a class="nav-link mr-0" data-toggle="tab" href="#chat-Contact">Contact</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane vivify fadeIn active show" id="chat-Users">
                        <ul class="right_chat list-unstyled mb-0 animation-li-delay">
                            <li class="online">
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object" src="assets/images/xs/avatar4.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Louis Henry <small class="text-muted font-12">10 min</small></span>
                                        <span class="message">How do you do?</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </a>
                            </li>
                            <li class="online">
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object " src="assets/images/xs/avatar5.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Debra Stewart <small class="text-muted font-12">15 min</small></span>
                                        <span class="message">I was wondering...</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </a>
                            </li>
                            <li class="offline">
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object " src="assets/images/xs/avatar2.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Lisa Garett <small class="text-muted font-12">18 min</small></span>
                                        <span class="message">I've forgotten how it felt before</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </a>
                            </li>
                            <li class="offline">
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object " src="assets/images/xs/avatar1.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Folisise Chosielie <small class="text-muted font-12">23 min</small></span>
                                        <span class="message">Wasup for the third time like...</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </a>
                            </li>
                            <li class="online">
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object " src="assets/images/xs/avatar3.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Marshall Nichols <small class="text-muted font-12">27 min</small></span>
                                        <span class="message">But we’re probably gonna need a new carpet.</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </a>
                            </li>
                            <li class="online">
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object " src="assets/images/xs/avatar5.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Debra Stewart <small class="text-muted font-12">38 min</small></span>
                                        <span class="message">It’s not that bad...</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </a>
                            </li>
                            <li class="offline">
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object " src="assets/images/xs/avatar2.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Lisa Garett <small class="text-muted font-12">45 min</small></span>
                                        <span class="message">How do you do?</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane vivify fadeIn" id="chat-Groups">
                        <ul class="right_chat list-unstyled mb-0 animation-li-delay">
                            <li class="online">
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object" src="assets/images/xs/avatar4.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">PHP Groups<small class="text-muted font-12">10 min</small></span>
                                        <span class="message">How do you do?</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </a>
                            </li>
                            <li class="offline">
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object " src="assets/images/xs/avatar2.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Family Groups <small class="text-muted font-12">18 min</small></span>
                                        <span class="message">I've forgotten how it felt before</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </a>
                            </li>
                            <li class="offline">
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object " src="assets/images/xs/avatar1.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Friends holic <small class="text-muted font-12">23 min</small></span>
                                        <span class="message">Wasup for the third time like...</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </a>
                            </li>
                            <li class="offline">
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object " src="assets/images/xs/avatar2.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">CL City 2 <small class="text-muted font-12">45 min</small></span>
                                        <span class="message">How do you do?</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane vivify fadeIn" id="chat-Contact">
                        <ul class="right_chat list-unstyled mb-0 animation-li-delay">
                            <li class="offline">
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object " src="assets/images/xs/avatar2.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">John Smith <small class="text-muted"><i class="fa fa-star"></i></small></span>
                                        <span class="message">johnsmith@info.com</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </a>
                            </li>
                            <li class="offline">
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object " src="assets/images/xs/avatar1.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Merri Diamond <small class="text-muted"><i class="fa fa-heart"></i></small></span>
                                        <span class="message">hermanbeck@info.com</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </a>
                            </li>
                            <li class="online">
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object" src="assets/images/xs/avatar4.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Louis Henry <small class="text-muted"><i class="fa fa-star"></i></small></span>
                                        <span class="message">maryadams@info.com</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </a>
                            </li>
                            <li class="online">
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object " src="assets/images/xs/avatar5.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Andrew Patrick <small class="text-muted"><i class="fa fa-star"></i></small></span>
                                        <span class="message">mikethimas@info.com</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </a>
                            </li>
                            <li class="online">
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object " src="assets/images/xs/avatar3.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Claire Peters <small class="text-muted"><i class="fa fa-heart"></i></small></span>
                                        <span class="message">clairepeters@info.com</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </a>
                            </li>
                            <li class="online">
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object " src="assets/images/xs/avatar5.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Debra Stewart <small class="text-muted"><i class="fa fa-star"></i></small></span>
                                        <span class="message">It’s not that bad...</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </a>
                            </li>
                            <li class="offline">
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object " src="assets/images/xs/avatar2.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Lisa Garett <small class="text-muted"><i class="fa fa-star"></i></small></span>
                                        <span class="message">eringonzales@info.com</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </a>
                            </li>
                            <li class="online">
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object" src="assets/images/xs/avatar4.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Louis Henry <small class="text-muted"><i class="fa fa-star"></i></small></span>
                                        <span class="message">susiewillis@info.com</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </a>
                            </li>
                            <li class="online">
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object " src="assets/images/xs/avatar5.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Debra Stewart <small class="text-muted"><i class="fa fa-star"></i></small></span>
                                        <span class="message">johnsmith@info.com</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sticky-note">
    <a href="javascript:void(0);" class="right_note"><i class="fa fa-close"></i></a>
    <div class="form-group c_form_group">
        <label>Write your note here</label>
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Enter here...">
            <div class="input-group-append"><button class="btn btn-dark btn-sm" type="button">Add</button></div>
        </div>
    </div>
    <div class="note-body">
        <div class="card note-item">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="font-10 text-muted">12 Apr 2020</span>
                </div>
                <div>
                    <a href="javascript:void(0);" class="star"><i class="fa fa-star-o"></i></a>
                    <a href="javascript:void(0);" class="delete"><i class="fa fa-trash"></i></a>
                </div>
            </div>
            <div class="note-detail">
                <span>Commit code on github branch development</span>
            </div>
        </div>
        <div class="card note-item">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="font-10 text-muted">12 Apr 2020</span>
                </div>
                <div>
                    <a href="javascript:void(0);" class="star active"><i class="fa fa-star-o"></i></a>
                    <a href="javascript:void(0);" class="delete"><i class="fa fa-trash"></i></a>
                </div>
            </div>
            <div class="note-detail">
                <span>Meeting with client for new project.</span>
            </div>
        </div>
        <div class="card note-item">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="font-10 text-muted">12 Apr 2020</span>
                </div>
                <div>
                    <a href="javascript:void(0);" class="star"><i class="fa fa-star-o"></i></a>
                    <a href="javascript:void(0);" class="delete"><i class="fa fa-trash"></i></a>
                </div>
            </div>
            <div class="note-detail">
                <span>making this the first true generator on the Internet</span>
            </div>
        </div>
        <div class="card note-item">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="font-10 text-muted">12 Apr 2020</span>
                </div>
                <div>
                    <a href="javascript:void(0);" class="star"><i class="fa fa-star-o"></i></a>
                    <a href="javascript:void(0);" class="delete"><i class="fa fa-trash"></i></a>
                </div>
            </div>
            <div class="note-detail">
                <span>it look like readable English. Many desktop publishing</span>
            </div>
        </div> --}}
    </div>
</div>
