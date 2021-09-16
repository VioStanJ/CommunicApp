<!-- Notifications -->
<div class="right-sidebar" id="notifications">
    <div class="right-sidebar-header">
        <span class="right-sidebar-title">Notifications</span>
        <a data-right-sidebar="settings" title="Settings" href="#">
            <i class="mdi mdi-cog"></i>
        </a>
        <a href="#" class="right-sidebar-close">
            <i class="mdi mdi-close"></i>
        </a>
    </div>
    <div class="right-sidebar-content">
        <ul class="list-group list-group-flush">
            @foreach ($invitations as $item)
                <li class="list-group-item py-3 px-0 d-flex justify-content-between">
                    <div class="d-flex">
                        <figure class="avatar avatar-state-warning mr-3">
                            <span class="avatar-title bg-info-bright text-info rounded-circle">
                                <i class="mdi mdi-server"></i>
                            </span>
                        </figure>
                        <div>
                            <div>{{$item->friend->name}}</div>
                            <span class="text-muted small">
                                <i class="mdi mdi-clock-outline small mr-1"></i> {{$item->topic}}
                            </span>
                            <br>
                            <span class="small">{{$item->created_at}}</span>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a href="#" data-toggle="dropdown">
                            <i class="mdi mdi-dots-horizontal"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="/friend/request/{{$item->id}}/1" class="dropdown-item">Accepter</a>
                            <a href="/friend/request/{{$item->id}}/2" class="dropdown-item">Refuser</a>
                        </div>
                    </div>
                </li>
            @endforeach

            @foreach ($group_invitations as $item)
                <li class="list-group-item py-3 px-0 d-flex justify-content-between">
                    <div class="d-flex">
                        <figure class="avatar avatar-state-warning mr-3">
                            <span class="avatar-title bg-info-bright text-info rounded-circle">
                                <i class="mdi mdi-server"></i>
                            </span>
                        </figure>
                        <div>
                            <div>{{$item->group->name}}</div>
                            <span class="text-muted small">
                                <i class="mdi mdi-clock-outline small mr-1"></i> {{$item->topic}}
                            </span>
                            <br>
                            <span class="small">{{$item->created_at}}</span>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a href="#" data-toggle="dropdown">
                            <i class="mdi mdi-dots-horizontal"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="/group/request/{{$item->id}}/1" class="dropdown-item">Accepter</a>
                            <a href="/group/request/{{$item->id}}/2" class="dropdown-item">Refuser</a>
                        </div>
                    </div>
                </li>
            @endforeach

            {{-- <li class="list-group-item py-3 px-0 d-flex justify-content-between">
                <div class="d-flex">
                    <figure class="avatar avatar-state-warning mr-3">
                        <span class="avatar-title bg-warning-bright text-warning rounded-circle">
                            <i class="mdi mdi-server"></i>
                        </span>
                    </figure>
                    <div>
                        <div>Storage is running low!</div>
                        <span class="text-muted small">
                            <i class="mdi mdi-clock-outline small mr-1"></i> Today
                        </span>
                    </div>
                </div>
                <div class="dropdown">
                    <a href="#" data-toggle="dropdown">
                        <i class="mdi mdi-dots-horizontal"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item">Unread</a>
                        <a href="#" class="dropdown-item">Detail</a>
                        <a href="#" class="dropdown-item">Delete</a>
                    </div>
                </div>
            </li>
            <li class="list-group-item py-3 px-0 d-flex justify-content-between">
                <div class="d-flex">
                    <figure class="avatar mr-3">
                                <span class="avatar-title bg-secondary-bright text-secondary rounded-circle">
                                    <i class="mdi mdi-file-document-outline"></i>
                                </span>
                    </figure>
                    <div>
                        <div>1 person sent a file</div>
                        <span class="text-muted small">
                            <i class="mdi mdi-clock-outline small mr-1"></i> 50 min ago
                        </span>
                    </div>
                </div>
                <div class="dropdown">
                    <a href="#" data-toggle="dropdown">
                        <i class="mdi mdi-dots-horizontal"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item">Unread</a>
                        <a href="#" class="dropdown-item">Detail</a>
                        <a href="#" class="dropdown-item">Delete</a>
                    </div>
                </div>
            </li>
            <li class="list-group-item py-3 px-0 d-flex justify-content-between">
                <div class="d-flex">
                    <figure class="avatar mr-3">
                        <span class="avatar-title bg-success-bright text-success rounded-circle">
                            <i class="mdi mdi-download"></i>
                        </span>
                    </figure>
                    <div>
                        <div>Reports ready to download</div>
                        <span class="text-muted small">
                            <i class="mdi mdi-clock-outline small mr-1"></i> 5 hour ago
                        </span>
                    </div>
                </div>
                <div class="dropdown">
                    <a href="#" data-toggle="dropdown">
                        <i class="mdi mdi-dots-horizontal"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item">Unread</a>
                        <a href="#" class="dropdown-item">Detail</a>
                        <a href="#" class="dropdown-item">Delete</a>
                    </div>
                </div>
            </li>
            <li class="list-group-item py-3 px-0 d-flex justify-content-between">
                <div class="d-flex">
                    <figure class="avatar mr-3">
                                    <span class="avatar-title bg-info-bright text-info rounded-circle">
                                        <i class="mdi mdi-lock"></i>
                                    </span>
                    </figure>
                    <div>
                        <div>2 steps verification</div>
                        <span class="text-muted small">
                                    <i class="mdi mdi-clock-outline small mr-1"></i> Yesterday
                                </span>
                    </div>
                </div>
                <div class="dropdown">
                    <a href="#" data-toggle="dropdown">
                        <i class="mdi mdi-dots-horizontal"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item">Unread</a>
                        <a href="#" class="dropdown-item">Detail</a>
                        <a href="#" class="dropdown-item">Delete</a>
                    </div>
                </div>
            </li> --}}
        </ul>
    </div>
</div>
<!-- ./ Notifications -->
