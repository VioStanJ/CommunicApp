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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- ./ add friends modal -->
