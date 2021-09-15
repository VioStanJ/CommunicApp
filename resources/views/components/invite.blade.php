<!-- add friends modal -->
<div class="modal fade" id="intiveUsers" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="mdi mdi-account-plus-outline"></i> Invite users
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="mdi mdi-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="mb-4">
                    <div class="form-group">
                        <label for="invite_emails" class="col-form-label">Email address</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="invite_emails" placeholder="Email address">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-success">
                                    <i class="mdi mdi-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="invite_topic" class="col-form-label">Invitation topic</label>
                        <input type="text" class="form-control" id="invite_topic" placeholder="Topic">
                    </div>
                </form>
                <div class="d-flex justify-content-between">
                    <span>Users</span>
                    <span class="text-muted small">Total 3 users</span>
                </div>
                <hr>
                <div>
                    <ul class="list-group list-group-unlined">
                        <li class="list-group-item px-0 d-flex">
                            <figure class="avatar mr-3">
                                <img src="./dist/media/img/avatar4.jpg" class="rounded-circle" alt="image">
                            </figure>
                            <div>
                                <div>Amanda Harvey</div>
                                <div class="small text-muted">amanda@example.com</div>
                            </div>
                            <a class="text-danger ml-auto" data-toggle="tooltip" title="Delete" href="#">
                                <i class="mdi mdi-delete-outline"></i>
                            </a>
                        </li>
                        <li class="list-group-item px-0 d-flex">
                            <figure class="avatar mr-3">
                                <span class="avatar-title bg-info rounded-circle">D</span>
                            </figure>
                            <div>
                                <div>David Harrison</div>
                                <div class="small text-muted">david@example.com</div>
                            </div>
                            <a class="text-danger ml-auto" data-toggle="tooltip" title="Delete" href="#">
                                <i class="mdi mdi-delete-outline"></i>
                            </a>
                        </li>
                        <li class="list-group-item px-0 d-flex">
                            <figure class="avatar mr-3">
                                <img src="./dist/media/img/avatar10.jpg" class="rounded-circle" alt="image">
                            </figure>
                            <div>
                                <div>Ella Lauda</div>
                                <div class="small text-muted">Markvt@example.com</div>
                            </div>
                            <a class="text-danger ml-auto" data-toggle="tooltip" title="Delete" href="#">
                                <i class="mdi mdi-delete-outline"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- ./ add friends modal -->
