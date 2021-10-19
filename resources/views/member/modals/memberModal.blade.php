<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Member Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('member.forms.memberForm',["type"=>"edit"]);
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="save-changes" type="button" class="btn btn-primary"  onclick="updateUser(event.target)">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal-->
