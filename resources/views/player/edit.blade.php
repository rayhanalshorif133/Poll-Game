<div class="modal fade" id="player-edit-modal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fa fa-person-snowboarding fs-4" aria-hidden="true"></i>
                    Update Player
                </h4>
                <button type="button" class="close-modal btn btn-sm btn-outline-danger">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="phone" class="required">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone Number">
                    </div>

                </form>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default close-modal">Close</button>
                <button type="button" class="btn btn-primary close-modal">Save changes</button>
            </div>
        </div>

    </div>

</div>
