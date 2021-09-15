@extends('layouts.app')

@section('content')
<!-- layout -->
<div class="layout">

    <!-- navigation -->
    <nav class="navigation">
        <div class="nav-group">
            <ul>
                <li class="logo">
                    <a href="#">
                        <img src="./dist/media/img/logo.png" alt="logo">
                    </a>
                </li>
                <li class="navigation-action-button dropright" title="New" data-placement="right">
                    <a href="#" data-intro-js="1" data-toggle="dropdown">
                        <i class="mdi mdi-plus"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#newGroup">Add Group</a>
                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#intiveUsers">Invite users</a>
                    </div>
                </li>
                <li>
                    <a class="active" data-intro-js="2" data-left-sidebar="chats" href="#" data-toggle="tooltip"
                       title="Chats" data-placement="right">
                        <span class="badge badge-warning"></span>
                        <i data-feather="message-circle"></i>
                    </a>
                </li>
                <li>
                    <a data-left-sidebar="friends" href="#" data-toggle="tooltip"
                       title="Friends" data-placement="right">
                        <span class="badge badge-danger"></span>
                        <i data-feather="user"></i>
                    </a>
                </li>
                <li>
                    <a data-left-sidebar="favorites" data-toggle="tooltip" title="Groups" data-placement="right"
                       href="#">
                        <i data-feather="users"></i>
                    </a>
                </li>
                <li class="brackets">

                </li>

                <li class="d-none d-lg-block" data-toggle="tooltip" title="Notifications" data-placement="right">
                    <a href="#" data-toggle="modal" data-right-sidebar="notifications">
                        <i class="mdi mdi-bell-outline"></i>
                    </a>
                </li>
                <li data-toggle="tooltip" title="{{Auth::user()->name}}" data-placement="right">
                    <a href="./login.html" data-intro-js="3" data-toggle="dropdown">
                        <figure class="avatar avatar-sm">
                            <img src="{{asset(Auth::user()->avatar)}}" class="rounded-circle" alt="image">
                        </figure>
                    </a>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#editProfile">Edit
                            profile</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="dropdown-item text-danger">Logout</a>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    <!-- ./ navigation -->

    <!-- Chat left sidebar -->
    <div id="chats" class="left-sidebar open">
        <div class="left-sidebar-header">
            <form>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button class="btn" type="button">
                            <i class="ti-search"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control" placeholder="Search chats">
                </div>
            </form>
        </div>
        <div class="left-sidebar-content">
            <ul class="list-group list-group-flush">
                <li class="list-group-item active">
                    <div>
                        <figure class="avatar mr-3">
                            <img src="./dist/media/img/avatar6.jpg" class="rounded-circle" alt="image">
                        </figure>
                    </div>
                    <div class="users-list-body">
                        <div>
                            <h5>Maribel Mallon</h5>
                            <p>I sent you all the files. Good luck with 😃</p>
                        </div>
                        <div class="users-list-action">
                            <small class="text-muted">11:05 AM</small>
                            <div class="action-toggle">
                                <div class="dropdown">
                                    <a data-toggle="dropdown" href="#">
                                        <i class="mdi mdi-dots-horizontal"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">Open</a>
                                        <a href="#" data-right-sidebar="user-profile" class="dropdown-item">Profile</a>
                                        <a href="#" class="dropdown-item">Add to archive</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item text-danger example-delete-chat">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li data-intro-js="5" class="list-group-item unread-chat">
                    <figure class="avatar avatar-state-success mr-3">
                        <span class="avatar-title bg-secondary rounded-circle">T</span>
                    </figure>
                    <div class="users-list-body">
                        <div>
                            <h5>Townsend Seary</h5>
                            <p>What's up, how are you?</p>
                        </div>
                        <div class="users-list-action">
                            <div class="new-message-count">3</div>
                            <small>03:41 PM</small>
                            <div class="action-toggle">
                                <div class="dropdown">
                                    <a data-toggle="dropdown" href="#">
                                        <i class="mdi mdi-dots-horizontal"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">Open</a>
                                        <a href="#" data-right-sidebar="user-profile" class="dropdown-item">Profile</a>
                                        <a href="#" class="dropdown-item">Add to archive</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item text-danger example-delete-chat">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </div>
    <!-- ./ Chat left sidebar -->

    <!-- Friends left sidebar -->
    <div id="friends" class="left-sidebar">
        <div class="left-sidebar-header">
            <form>
                <h4 class="mb-4">Friends</h4>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button class="btn" type="button">
                            <i class="ti-search"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control" placeholder="Search friends">
                </div>
            </form>
        </div>
        <div class="left-sidebar-content">
            <ul class="list-group list-group-flush">
                @foreach ($friends as $item)
                <li class="list-group-item">
                    <div>
                        <figure class="avatar mr-3">
                            <img src="{{$item->user->avatar??'/static/avatar.jpg'}}" class="rounded-circle" alt="image">
                        </figure>
                    </div>
                    <div class="users-list-body">
                        <div>
                            <h5>{{$item->user->name??'--'}}</h5>
                            <p>{{$item->user->email??'--'}}</p>
                        </div>
                        <div class="users-list-action">
                            <div class="action-toggle">
                                <div class="dropdown">
                                    <a data-toggle="dropdown" href="#">
                                        <i class="mdi mdi-dots-horizontal"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">New chat</a>
                                        <a href="#" data-right-sidebar="user-profile"
                                           class="dropdown-item">Profile</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item text-danger">Block</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- ./ Friends left sidebar -->

    <!-- Favorites left sidebar -->
    <div id="favorites" class="left-sidebar">
        <div class="left-sidebar-header">
            <form>
                <h4 class="mb-4">Favorites</h4>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button class="btn" type="button">
                            <i class="ti-search"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control" placeholder="Search favorites">
                </div>
            </form>
        </div>
        <div class="left-sidebar-content">
            <ul class="list-group list-group-flush users-list">
                <li class="list-group-item">
                    <div class="users-list-body">
                        <div>
                            <h5>Jennica Kindred</h5>
                            <p>I know how important this file is to you. You can trust me ;)</p>
                        </div>
                        <div class="users-list-action">
                            <div class="action-toggle">
                                <div class="dropdown">
                                    <a data-toggle="dropdown" href="#">
                                        <i class="mdi mdi-dots-horizontal"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">Open</a>
                                        <a href="#" class="dropdown-item">Remove favorites</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="users-list-body">
                        <div>
                            <h5>Marvin Rohan</h5>
                            <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                        </div>
                        <div class="users-list-action">
                            <div class="action-toggle">
                                <div class="dropdown">
                                    <a data-toggle="dropdown" href="#">
                                        <i class="mdi mdi-dots-horizontal"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">Open</a>
                                        <a href="#" class="dropdown-item">Remove favorites</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="users-list-body">
                        <div>
                            <h5>Frans Hanscombe</h5>
                            <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                        </div>
                        <div class="users-list-action">
                            <div class="action-toggle">
                                <div class="dropdown">
                                    <a data-toggle="dropdown" href="#">
                                        <i class="mdi mdi-dots-horizontal"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">Open</a>
                                        <a href="#" class="dropdown-item">Remove favorites</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="users-list-body">
                        <div>
                            <h5>Karl Hubane</h5>
                            <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                        </div>
                        <div class="users-list-action">
                            <div class="action-toggle">
                                <div class="dropdown">
                                    <a data-toggle="dropdown" href="#">
                                        <i class="mdi mdi-dots-horizontal"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">Open</a>
                                        <a href="#" class="dropdown-item">Remove favorites</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- ./ Favorites left sidebar -->

    <!-- Archived left sidebar -->
    <div id="archived" class="left-sidebar">
        <div class="left-sidebar-header">
            <form>
                <h4 class="mb-4">Archived</h4>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button class="btn" type="button">
                            <i class="ti-search"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control" placeholder="Search archived">
                </div>
            </form>
        </div>
        <div class="left-sidebar-content">
            <ul class="list-group list-group-flush users-list">
                <li class="list-group-item">
                    <figure class="avatar mr-3">
                        <span class="avatar-title bg-danger rounded-circle">M</span>
                    </figure>
                    <div class="users-list-body">
                        <div>
                            <h5>Mercedes Pllu</h5>
                            <p>I know how important this file is to you. You can trust me ;)</p>
                        </div>
                        <div class="users-list-action">
                            <div class="action-toggle">
                                <div class="dropdown">
                                    <a data-toggle="dropdown" href="#">
                                        <i class="mdi mdi-dots-horizontal"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">Open</a>
                                        <a href="#" class="dropdown-item">Restore</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item text-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <figure class="avatar mr-3">
                        <span class="avatar-title bg-secondary rounded-circle">R</span>
                    </figure>
                    <div class="users-list-body">
                        <div>
                            <h5>Rochelle Golley</h5>
                            <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                        </div>
                        <div class="users-list-action">
                            <div class="action-toggle">
                                <div class="dropdown">
                                    <a data-toggle="dropdown" href="#">
                                        <i class="mdi mdi-dots-horizontal"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">Open</a>
                                        <a href="#" class="dropdown-item">Restore</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item text-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- ./ Archived left sidebar -->

    <!-- chat -->
    <div class="chat"> <!-- no-message -->
        <div class="chat-preloader d-none">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div class="no-message-container">
            <div class="row mb-5">
                <div class="col-md-4 offset-4">
                    <img src="./dist/media/svg/chat_empty.svg" class="img-fluid" alt="image">
                </div>
            </div>
            <p class="lead">Choose a chat or start a <a href="#" data-left-sidebar="friends">new chat</a>.</p>
        </div>
        <div class="chat-header">
            <div class="chat-header-user">
                <figure class="avatar avatar-state-success">
                    <img src="./dist/media/img/avatar6.jpg" class="rounded-circle" alt="image">
                </figure>
                <div>
                    <h5>Maribel Mallon</h5>
                    <small class="text-success">Online</small>
                </div>
            </div>
            <div class="chat-header-action">
                <ul class="list-inline" data-intro-js="7">
                    <li class="list-inline-item d-inline d-lg-none">
                        <a href="#" class="btn btn-danger btn-floating example-chat-close">
                            <i class="mdi mdi-arrow-left"></i>
                        </a>
                    </li>

                    <li class="list-inline-item">
                        <a href="#" class="btn btn-dark btn-floating" data-toggle="dropdown">
                            <i class="mdi mdi-dots-horizontal"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item example-close-selected-chat">Close chat</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item text-danger example-block-user">Block</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="chat-body">
            <div class="messages">
                <div class="message-item in">
                    <div class="message-avatar">
                        <figure class="avatar avatar-sm">
                            <img src="./dist/media/img/avatar6.jpg" class="rounded-circle" alt="image">
                        </figure>
                        <div>
                            <h5>Maribel Mallon</h5>
                            <div class="time">10:12 PM</div>
                        </div>
                    </div>
                    <div class="message-content">
                        <div class="message-text">Hello, Blondy Neeson 😃</div>
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Reply</a>
                                <a href="#" class="dropdown-item">Forward</a>
                                <a href="#" class="dropdown-item">Copy</a>
                                <a href="#" class="dropdown-item">Starred</a>
                                <a href="#" class="dropdown-item example-delete-message">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="message-item in">
                    <div class="message-content">
                        <div class="message-text">How do you feel today? I want to ask you something.</div>
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Reply</a>
                                <a href="#" class="dropdown-item">Forward</a>
                                <a href="#" class="dropdown-item">Copy</a>
                                <a href="#" class="dropdown-item">Starred</a>
                                <a href="#" class="dropdown-item example-delete-message">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="message-item out">
                    <div class="message-avatar">
                        <figure class="avatar avatar-sm">
                            <img src="./dist/media/img/avatar9.jpg" class="rounded-circle" alt="image">
                        </figure>
                        <div>
                            <h5>Matteo Reedy</h5>
                            <div class="time">01:20 PM <i class="mdi mdi-check-all text-info ml-1"></i></div>
                        </div>
                    </div>
                    <div class="message-content">
                        <div class="message-text">
                            Hello 😃
                            <br>
                            <br>
                            All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as
                            necessary, making this the first true generator on the Internet. It uses a dictionary of
                            over 200 Latin words, combined with a handful of model sentence structures, to generate
                            Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free
                            from repetition, injected humour, or non-characteristic words etc.
                        </div>
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item">Reply</a>
                                <a href="#" class="dropdown-item">Forward</a>
                                <a href="#" class="dropdown-item">Copy</a>
                                <a href="#" class="dropdown-item">Starred</a>
                                <a href="#" class="dropdown-item example-delete-message">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="message-item in">
                    <div class="message-avatar">
                        <figure class="avatar avatar-sm">
                            <img src="./dist/media/img/avatar6.jpg" class="rounded-circle" alt="image">
                        </figure>
                        <div>
                            <h5>Maribel Mallon</h5>
                            <div class="time">10:43 AM</div>
                        </div>
                    </div>
                    <div class="message-content">
                        <audio controls>
                            <source src="https://www.w3schools.com/tags/horse.ogg" type="audio/ogg">
                            <source src="https://www.w3schools.com/tags/horse.mp3" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Reply</a>
                                <a href="#" class="dropdown-item">Forward</a>
                                <a href="#" class="dropdown-item">Copy</a>
                                <a href="#" class="dropdown-item">Starred</a>
                                <a href="#" class="dropdown-item example-delete-message">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="message-item out">
                    <div class="message-avatar">
                        <figure class="avatar avatar-sm">
                            <img src="./dist/media/img/avatar9.jpg" class="rounded-circle" alt="image">
                        </figure>
                        <div>
                            <h5>Matteo Reedy</h5>
                            <div class="time">
                                10:43 AM
                                <i class="mdi mdi-check-all text-info ml-1"></i>
                            </div>
                        </div>
                    </div>
                    <div class="message-content">
                        <audio controls>
                            <source src="https://www.w3schools.com/tags/horse.ogg" type="audio/ogg">
                            <source src="https://www.w3schools.com/tags/horse.mp3" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item">Reply</a>
                                <a href="#" class="dropdown-item">Forward</a>
                                <a href="#" class="dropdown-item">Copy</a>
                                <a href="#" class="dropdown-item">Starred</a>
                                <a href="#" class="dropdown-item example-delete-message">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="message-item out">
                    <div class="message-content">
                        <div class="message-text">You are good ❤❤</div>
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item">Reply</a>
                                <a href="#" class="dropdown-item">Forward</a>
                                <a href="#" class="dropdown-item">Copy</a>
                                <a href="#" class="dropdown-item">Starred</a>
                                <a href="#" class="dropdown-item example-delete-message">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="message-item in">
                    <div class="message-avatar">
                        <figure class="avatar avatar-sm">
                            <img src="./dist/media/img/avatar6.jpg" class="rounded-circle" alt="image">
                        </figure>
                        <div>
                            <h5>Maribel Mallon</h5>
                            <div class="time">11:59 PM</div>
                        </div>
                    </div>
                    <div class="message-content">
                        <div class="message-text">I want to send you a file.</div>
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Reply</a>
                                <a href="#" class="dropdown-item">Forward</a>
                                <a href="#" class="dropdown-item">Copy</a>
                                <a href="#" class="dropdown-item">Starred</a>
                                <a href="#" class="dropdown-item example-delete-message">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="message-item in">
                    <div class="message-content message-file">
                        <div class="message-text d-flex">
                            <div class="file-icon">
                                <i class="mdi mdi-file-pdf-box-outline"></i>
                            </div>
                            <div>
                                <div>test-filename.pdf <small class="text-muted small">(50KB)</small></div>
                                <ul class="list-inline mt-2">
                                    <li class="list-inline-item mb-0">
                                        <a href="#" class="btn btn-sm btn-light-success btn-floating" title="View">
                                            <i class="mdi mdi-link"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item mb-0">
                                        <a href="#" class="btn btn-sm btn-light-success btn-floating"
                                           title="Download">
                                            <i class="mdi mdi-download"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Reply</a>
                                <a href="#" class="dropdown-item">Forward</a>
                                <a href="#" class="dropdown-item">Copy</a>
                                <a href="#" class="dropdown-item">Starred</a>
                                <a href="#" class="dropdown-item example-delete-message">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="message-item messages-divider sticky-top" data-label="Yesterday"></div>
                <div class="message-item out">
                    <div class="message-avatar">
                        <figure class="avatar avatar-sm">
                            <img src="./dist/media/img/avatar9.jpg" class="rounded-circle" alt="image">
                        </figure>
                        <div>
                            <h5>Matteo Reedy</h5>
                            <div class="time">07:45 AM <i class="mdi mdi-check-all text-info ml-1"></i></div>
                        </div>
                    </div>
                    <div class="message-content">
                        <div class="message-text">Thank you so much. These files are very important to me. I guess
                            you didn't make any changes
                            to these files. So I need the original versions of these files. Thank you very much
                            again.
                        </div>
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item">Reply</a>
                                <a href="#" class="dropdown-item">Forward</a>
                                <a href="#" class="dropdown-item">Copy</a>
                                <a href="#" class="dropdown-item">Starred</a>
                                <a href="#" class="dropdown-item example-delete-message">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="message-item in">
                    <div class="message-avatar">
                        <figure class="avatar avatar-sm">
                            <img src="./dist/media/img/avatar6.jpg" class="rounded-circle" alt="image">
                        </figure>
                        <div>
                            <h5>Maribel Mallon</h5>
                            <div class="time">07:15 AM</div>
                        </div>
                    </div>
                    <div class="message-content">
                        <div class="message-text">I'm about to send the other file now.</div>
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Reply</a>
                                <a href="#" class="dropdown-item">Forward</a>
                                <a href="#" class="dropdown-item">Copy</a>
                                <a href="#" class="dropdown-item">Starred</a>
                                <a href="#" class="dropdown-item example-delete-message">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="message-item out">
                    <div class="message-avatar">
                        <figure class="avatar avatar-sm">
                            <img src="./dist/media/img/avatar9.jpg" class="rounded-circle" alt="image">
                        </figure>
                        <div>
                            <h5>Matteo Reedy</h5>
                            <div class="time">07:45 AM <i class="mdi mdi-check-all text-info ml-1"></i></div>
                        </div>
                    </div>
                    <div class="message-content">
                        <div>
                            <div class="message-content-images">
                                <a href="./dist/media/img/image1.jpg" data-fancybox="images">
                                    <img src="./dist/media/img/image1.jpg" alt="image">
                                </a>
                                <a href="./dist/media/img/image2.jpg" data-fancybox="images">
                                    <img src="./dist/media/img/image2.jpg" alt="image">
                                </a>
                                <a href="./dist/media/img/image3.jpg" data-fancybox="images">
                                    <img src="./dist/media/img/image3.jpg" alt="image">
                                </a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item">Reply</a>
                                <a href="#" class="dropdown-item">Forward</a>
                                <a href="#" class="dropdown-item">Copy</a>
                                <a href="#" class="dropdown-item">Starred</a>
                                <a href="#" class="dropdown-item example-delete-message">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="message-item in">
                    <div class="message-avatar">
                        <figure class="avatar avatar-sm">
                            <img src="./dist/media/img/avatar6.jpg" class="rounded-circle" alt="image">
                        </figure>
                        <div>
                            <h5>Maribel Mallon</h5>
                            <div class="time">08:00 AM</div>
                        </div>
                    </div>
                    <div class="message-content">
                        <div class="message-text">I thank you. We are glad to help you. 😃</div>
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Reply</a>
                                <a href="#" class="dropdown-item">Forward</a>
                                <a href="#" class="dropdown-item">Copy</a>
                                <a href="#" class="dropdown-item">Starred</a>
                                <a href="#" class="dropdown-item example-delete-message">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="message-item out">
                    <div class="message-avatar">
                        <figure class="avatar avatar-sm">
                            <img src="./dist/media/img/avatar9.jpg" class="rounded-circle" alt="image">
                        </figure>
                        <div>
                            <h5>Matteo Reedy</h5>
                            <div class="time">09:23 AM <i class="mdi mdi-check-all text-info ml-1"></i></div>
                        </div>
                    </div>
                    <div class="message-content">
                        <div class="message-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A,
                            exercitationem inventore
                            quaerat quos repellendus sunt? Assumenda dolor earum optio quis?
                        </div>
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item">Reply</a>
                                <a href="#" class="dropdown-item">Forward</a>
                                <a href="#" class="dropdown-item">Copy</a>
                                <a href="#" class="dropdown-item">Starred</a>
                                <a href="#" class="dropdown-item example-delete-message">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="message-item out">
                    <div class="message-content">
                        <div class="message-text">😃 😃 ❤ ❤</div>
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item">Reply</a>
                                <a href="#" class="dropdown-item">Forward</a>
                                <a href="#" class="dropdown-item">Copy</a>
                                <a href="#" class="dropdown-item">Starred</a>
                                <a href="#" class="dropdown-item example-delete-message">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="message-item in">
                    <div class="message-avatar">
                        <figure class="avatar avatar-sm">
                            <img src="./dist/media/img/avatar6.jpg" class="rounded-circle" alt="image">
                        </figure>
                        <div>
                            <h5>Maribel Mallon</h5>
                            <div class="time">08:00 AM</div>
                        </div>
                    </div>
                    <div class="message-content">
                        <div class="video-block">
                            <a data-fancybox
                               href="https://www.youtube.com/watch?v=c5nhWy7Zoxg&list=PLmUBwxvdqHq-2La24tH5J55DwBdUwZnoI&ab_channel=FrameStockFootages">
                                <i class="mdi mdi-play-circle-outline"></i>
                            </a>
                        </div>
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Reply</a>
                                <a href="#" class="dropdown-item">Forward</a>
                                <a href="#" class="dropdown-item">Copy</a>
                                <a href="#" class="dropdown-item">Starred</a>
                                <a href="#" class="dropdown-item example-delete-message">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="message-item messages-divider" data-label="1 message unread"></div>
                <div class="message-item in">
                    <div class="message-avatar">
                        <figure class="avatar avatar-sm">
                            <img src="./dist/media/img/avatar6.jpg" class="rounded-circle" alt="image">
                        </figure>
                        <div>
                            <h5>Maribel Mallon</h5>
                            <div class="time">11:05 AM</div>
                        </div>
                    </div>
                    <div class="message-content">
                        <div class="message-text">I sent you all the files. Good luck with 😃</div>
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Reply</a>
                                <a href="#" class="dropdown-item">Forward</a>
                                <a href="#" class="dropdown-item">Copy</a>
                                <a href="#" class="dropdown-item">Starred</a>
                                <a href="#" class="dropdown-item example-delete-message">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="message-item in in-typing">
                    <div class="message-content">
                        <div class="message-text">
                            <div class="writing-animation">
                                <div class="writing-animation-line"></div>
                                <div class="writing-animation-line"></div>
                                <div class="writing-animation-line"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="chat-footer" data-intro-js="6">
            <form class="d-flex">
                <div class="dropdown">
                    <button class="btn btn-light-info btn-floating mr-3" data-toggle="dropdown" title="Emoji"
                            type="button">
                        <i class="mdi mdi-face"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-big p-0">
                        <div class="dropdown-menu-search">
                            <input type="text" class="form-control" placeholder="Search emoji">
                        </div>
                        <div class="emojis chat-emojis">
                            <ul>
                                <li>😁</li>
                                <li>😂</li>
                                <li>😃</li>
                                <li>😄</li>
                                <li>😅</li>
                                <li>😆</li>
                                <li>😉</li>
                                <li>😊</li>
                                <li>😋</li>
                                <li>😌</li>
                                <li>😍</li>
                                <li>😏</li>
                                <li>😒</li>
                                <li>😓</li>
                                <li>😔</li>
                                <li>😖</li>
                                <li>😘</li>
                                <li>😝</li>
                                <li>😠</li>
                                <li>😢</li>
                                <li>🙅</li>
                                <li>🙆</li>
                                <li>🙇</li>
                                <li>🙈</li>
                                <li>🙉</li>
                                <li>🙊</li>
                                <li>🙋</li>
                                <li>🙌</li>
                                <li>🙍</li>
                                <li>🙎</li>
                                <li>🙏</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-light-info btn-floating mr-3" data-toggle="dropdown" title="Emoji"
                            type="button">
                        <i class="mdi mdi-plus"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">Location</a>
                        <a href="#" class="dropdown-item">Attach</a>
                        <a href="#" class="dropdown-item">Document</a>
                        <a href="#" class="dropdown-item">File</a>
                        <a href="#" class="dropdown-item">Video</a>
                    </div>
                </div>
                <input type="text" class="form-control form-control-main" placeholder="Write a message.">
                <div>
                    <button class="btn btn-primary ml-2 btn-floating" type="submit">
                        <i class="mdi mdi-send"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- ./ chat -->

</div>
<!-- ./ layout -->

@include('components.notifications')

@component('components.profile')
@endcomponent

@component('components.invite')
@endcomponent

@component('components.addgroup')
@endcomponent

@component('components.edit_profile')
@endcomponent

@endsection
