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
                {{-- <li>
                    <a class="active" data-intro-js="2" data-left-sidebar="chats" href="#" data-toggle="tooltip"
                       title="Chats" data-placement="right">
                        <span class="badge badge-warning"></span>
                        <i data-feather="message-circle"></i>
                    </a>
                </li> --}}
                <li>
                    <a class="active" data-left-sidebar="friends" href="#" data-toggle="tooltip"
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
    {{-- <div id="chats" class="left-sidebar open">
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
    </div> --}}
    <!-- ./ Chat left sidebar -->

    <!-- Friends left sidebar -->
    <div id="friends" class="left-sidebar open">
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
                <li class="list-group-item" onclick="chat(this,'{{Auth::user()}}','{{$item->user}}')">
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
                                        <a href="#" class="dropdown-item" onclick="chat(this,'{{Auth::user()}}','{{$item->user}}')">Chatter</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" onclick="document.location.href='/friend/request/{{$item->id}}/3'" class="dropdown-item">Bloquer</a>
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
                    <input type="text" class="form-control" placeholder="Search Group">
                </div>
            </form>
        </div>
        <div class="left-sidebar-content">
            <ul class="list-group list-group-flush users-list">
                @foreach ($groups as $item)
                <li class="list-group-item" onclick="chatGroup(this,'{{$item}}')">
                    <div class="users-list-body">
                        <div>

                            <h5 class="font-weight-bold">{{$item->group->name}}</h5>
                            <p class="small text-muted">{{$item->group->topic}}</p>
                            <span class="small text-warning"  onclick="chatGroup(this,'{{$item}}')">Membres ({{$item->members->members??0}})</span>
                        </div>
                        <div class="users-list-action">
                            <div class="action-toggle">
                                <div class="dropdown">
                                    <a data-toggle="dropdown" href="#">
                                        <i class="mdi mdi-dots-horizontal"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item" onclick="chatGroup(this,'{{$item->group}}')">Open</a>
                                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#intiveGroup"  onclick="setGroupInvite(this,'{{$item}}')">Add Members</a>
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
                    <img  id="chat_image" src="./dist/media/img/avatar6.jpg" class="rounded-circle" alt="image">
                </figure>
                <div>
                    <h5 id="chat_name"></h5>
                    <small class="text-success" id="chat_info"></small>
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
{{-- ALL MESSAGES --}}
            </div>
        </div>
        <div class="chat-footer" id="chat-footer" data-intro-js="6">
            <form class="d-flex" id="send_message">
                @csrf
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
                            type="button" onclick="openFile(this)">
                        <i class="mdi mdi-plus"></i>
                    </button>
                    {{-- <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">File</a>
                    </div> --}}
                </div>
                <input type="hidden" name="to" id="user_to">
                <input type="hidden" name="group_id" id="group_id">
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
                <input type="text" class="form-control form-control-main" id="chat_message" name="message" placeholder="Write a message.">
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


@component('components.invite_group')
@endcomponent

@endsection

@section('script')
    <script>

        var is_group = 0;
        var last_group_id = 0;
        var group_id = 0;

        var user_id = 0;
        var last_id = 0;
        document.getElementById('chat_image').style.display = "none";
        document.getElementById('chat-footer').style.display = 'none';

        function chat(e,from,to) {
            document.getElementById('chat_name').innerHTML = JSON.parse(to).name;
            document.getElementById('chat_info').innerHTML = JSON.parse(to).email;
            document.getElementById('chat_image').style.display = "block";
            document.getElementById('chat_image').src = JSON.parse(to).avatar;
            document.getElementById('user_to').value = JSON.parse(to).id;
            document.getElementById('chat-footer').style.display = 'block';
            $('.messages').empty();
            load();
            loadUserChat(JSON.parse(from),JSON.parse(to));
        }

        function loadUserChat(from,to) {
            user_id = to.id;

            let request = $.ajax({
                url : '/get/message/'+user_id,
                type:'get',
                context: document.body,
            });

            request.done(function (response, textStatus, jqXHR){
            // Log a message to the console
                // console.log("Hooray, it worked!",response.chats);
                $('.messages').empty();

                response.chats.forEach(element => {
                    loadMessages(element,from,to);
                });
            });

            request.fail(function (jqXHR, textStatus, errorThrown){
                // Log the error to the console
                console.error(
                    "The following error occurred: "+
                    textStatus, errorThrown
                );
            });

            setInterval(() => {
                getLast(from,to,last_id);
            }, 2000);
        }

        function loadMessages(element,from,to) {
            if(element.user_from == user_id){
                send_message({
                    type: 'in',
                    text: element.message,
                    avatar: to.avatar,
                    name: to.name,
                    time: element.created_at
                });
            }else{
                send_message({
                    type: 'out',
                    text: element.message,
                    avatar: from.avatar,
                    name: "Moi",
                    time: element.created_at
                });
            }
            last_id = element.id;
        }

        function load(){
            $('.chat').addClass('no-message');
            $('.no-message-container').addClass('d-none');
            $('.chat-preloader').removeClass('d-none');
            $('.left-sidebar .list-group .list-group-item').removeClass('active');
            setTimeout(function () {
            $('.chat').addClass('open').removeClass('no-message');
            $('.no-message-container').removeClass('d-none');
            $('.chat-preloader').addClass('d-none');
            $('.chat .chat-body').scrollTop($('.chat .chat-body')[0].scrollHeight);
            }, 500);
        }

        $("#send_message").submit(function(e){
            e.preventDefault();

            var $form = $(this);

            if(is_group == 0){
                url = "/send/message";
            }else{
                url = "/send/group/message";
            }

            var serializedData = $form.serialize();

            var request = $.ajax({
                url: url,
                type:"post",
                context: document.body,
                data : serializedData
            });

            request.done(function (response, textStatus, jqXHR){
            // Log a message to the console
                // console.log("Hooray, it worked!",response);
            });

            request.fail(function (jqXHR, textStatus, errorThrown){
                // Log the error to the console
                console.error(
                    "The following error occurred: "+
                    textStatus, errorThrown
                );
            });

            document.getElementById('chat_message').value = "";
        });

        var send_message = function send_message(msg) {
            if (msg.type === 'in-typing') {
            $('.messages').append("<div class=\"message-item in in-typing\">\n                <div class=\"message-content\">\n                    <div class=\"message-text\">\n                        <div class=\"writing-animation\">\n                            <div class=\"writing-animation-line\"></div>\n                            <div class=\"writing-animation-line\"></div>\n                            <div class=\"writing-animation-line\"></div>\n                        </div>\n                    </div>\n                </div>\n            </div>");
            } else {
            $('.messages .message-item.in-typing').remove();
            $('.messages').append("<div class=\"message-item " + msg.type + "\">\n                <div class=\"message-avatar\">\n                    <figure class=\"avatar avatar-sm\">\n                        <img src="+ msg.avatar + " class=\"rounded-circle\" alt=\"image\">\n                    </figure>\n                    <div>\n                        <h5>" + msg.name + "</h5>\n                        <div class=\"time\">\n                            "+msg.time+"\n                            " + (msg.type === 'out' ? "<i class=\"ti-double-check text-info\"></i>" : "") + "\n                        </div>\n                    </div>\n                </div>\n                <div class=\"message-content\">\n                    <div class=\"message-text\">" + msg.text + "</div>\n                                    </div>\n            </div>");
            }
        };

        function getLast(from,to,last) {
            let url = '';

            url = '/get/last/message/'+user_id+'/'+last;

            // console.warn(url,"LAST");
            // console.warn(user_id,"User ID");
            // user_id = to.id;

            let request = $.ajax({
                url : '/get/last/message/'+user_id+'/'+last,
                type:'get',
                context: document.body,
            });

            request.done(function (response, textStatus, jqXHR){
            // Log a message to the console
                // console.warn(response,'LAST RESPO0NSE');

                response.chats.forEach(element => {
                    loadMessages(element,from,to);
                });
            });

            request.fail(function (jqXHR, textStatus, errorThrown){
                // Log the error to the console
                console.error(
                    "The following error occurred: "+
                    textStatus, errorThrown
                );
            });
        }

    </script>

    <script>

        function setGroupInvite(e,group) {
            let groupe = JSON.parse(group);
            document.getElementById('group_id').value = groupe.group_id;
            document.getElementById('total_group').innerHTML = "Total "+groupe.members.members;
            console.warn(groupe,"GROUP");
            document.getElementById('chat-footer').style.display = 'block';

            if(groupe.type == 1){
                document.getElementById('list_groups').style.display = 'block';
            }else{
                document.getElementById('list_groups').style.display = 'none';
            }
        }

        function chatGroup(e,group) {
            document.getElementById('chat_name').innerHTML = JSON.parse(group).group.name;
            document.getElementById('chat_info').innerHTML = JSON.parse(group).group.topic;
            document.getElementById('chat_image').style.display = "none";
            console.warn(group);
            document.getElementById('group_id_i').value = JSON.parse(group).group_id;
            document.getElementById('group_id').value = JSON.parse(group).group_id;
            document.getElementById('chat-footer').style.display = 'block';

            is_group = 1;
            group_id = JSON.parse(group).group_id;
            $('.messages').empty();
            load();
            loadGroupChat(JSON.parse(group));

            setInterval(() => {
                getLastGroup();
            }, 2000);
        }

        function loadGroupChat(group) {
            let request = $.ajax({
                url : '/get/group/message/'+group.group_id,
                type:'get',
                context: document.body,
            });

            request.done(function (response, textStatus, jqXHR){
            // Log a message to the console
                // console.log("Hooray, it worked!",response.chats);
                $('.messages').empty();

                response.chats.forEach(element => {
                console.warn('f : '+element.from,'u : '+response.user.id);

                    if(element.from != response.user.id){
                        send_message({
                            type: 'in',
                            text: element.message,
                            avatar: element.user.avatar,
                            name: element.user.name,
                            time: element.created_at
                        });
                    }else{
                        send_message({
                            type: 'out',
                            text: element.message,
                            avatar: element.user.avatar,
                            name: "Moi",
                            time: element.created_at
                        });
                    }
                    last_group_id = element.id;
                });
            });

            request.fail(function (jqXHR, textStatus, errorThrown){
                // Log the error to the console
                console.error(
                    "The following error occurred: "+
                    textStatus, errorThrown
                );
            });
        }

        function getLastGroup() {
            let url = '';


                url = '/get/group/last/message/'+group_id+'/'+last_group_id;


            // console.warn(url,"LAST");
            // console.warn(user_id,"User ID");
            // user_id = to.id;

            let request = $.ajax({
                url : url,
                type:'get',
                context: document.body,
            });

            request.done(function (response, textStatus, jqXHR){
            // Log a message to the console
                // console.warn(response,'LAST RESPO0NSE');

                response.chats.forEach(element => {
                    if(element.from != response.user.id){
                        send_message({
                            type: 'in',
                            text: element.message,
                            avatar: element.user.avatar,
                            name: element.user.name,
                            time: element.created_at
                        });
                    }else{
                        send_message({
                            type: 'out',
                            text: element.message,
                            avatar: element.user.avatar,
                            name: "Moi",
                            time: element.created_at
                        });
                    }
                    last_group_id = element.id;
                });
            });

            request.fail(function (jqXHR, textStatus, errorThrown){
                // Log the error to the console
                console.error(
                    "The following error occurred: "+
                    textStatus, errorThrown
                );
            });
        }

        function openFile(e) {
            var input = document.getElementById('file_message').click();

        }
    </script>
@endsection
