<!-- new group modal -->
<div class="modal fade" id="newGroup" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="mdi mdi-account-group-outline mr-2"></i> New Group
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="mdi mdi-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('create.group')}}">
                    @csrf

                    <div class="form-group">
                        <label for="group_name" class="col-form-label">Group name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="group_name" name="group_name">
                            <div class="input-group-append">
                                <button class="btn btn-success" data-toggle="dropdown" title="Emoji" type="button">
                                    <i class="mdi mdi-face"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-big dropdown-menu-right p-0">
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
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-form-label">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>

                <button type="submit" class="btn btn-primary">Create Group</button>

                </form>
            </div>

        </div>
    </div>
</div>
<!-- ./ new group modal -->
