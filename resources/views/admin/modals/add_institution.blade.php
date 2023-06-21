<!-- Modal to add new record -->
<div class="modal modal-slide-in fade" id="addInstitution">
    <div class="modal-dialog sidebar-sm">
        <form id="add-new-institution" class="add-new-record modal-content pt-0" action="{{route('institutions.add')}}" method="POST">
            @csrf
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">Add New Institution</h5>
            </div>
            <div class="modal-body flex-grow-1">
                <div class="mb-1">
                    <label class="form-label" for="basic-icon-default-fullname">Institution Name</label>
                    <input type="text" class="form-control dt-full-name" id="institution_name" name="institution_name" placeholder="John Doe" aria-label="John Doe" />
                </div>
                <div class="mb-1">
                    <label class="form-label" for="basic-icon-default-post">Emergency Line</label>
                    <input type="number" id="emergency_line" name="emergency_line" class="form-control dt-post" placeholder="Emergency Line" aria-label="Emergency Line" />
                </div>
                <div class="mb-1">
                    <label class="form-label" for="basic-icon-default-email">Email</label>
                    <input type="text" id="email" name="email" class="form-control dt-email" placeholder="john.doe@example.com" aria-label="john.doe@example.com" />
                    <small class="form-text"> You can use letters, numbers & periods </small>
                </div>
                <div class="mb-1">
                    <label class="form-label" for="basic-icon-default-date">Contact Number</label>
                    <input type="number" class="form-control" id="contact" name="contact" placeholder="0240000000" aria-label="0240000000" />
                </div>
                <button type="submit" class="btn btn-primary data-submit me-1">Submit</button>
                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>
