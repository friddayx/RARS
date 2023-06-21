<!--  modal -->
<div class="modal fade" id="reportAccident" tabindex="-1" aria-labelledby="reportAccident" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-4 mx-50">
                <h1 class="address-title text-center mb-1" id="addNewAddressTitle">Report Accident</h1>

                <form id="register-user-form" action="{{route('report')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="accident_type">Accident Type</label>
                            <select id="accident_type" name="accident_type" class="select2 form-select">
                                <option value=" ">Choose Type</option>
                                <option value="Multiple-vehicle collision" >Multiple-vehicle collision</option>
                                <option value="Hit and Run" >Hit and Run</option>
                                <option value="Vehicle rollover" >Vehicle rollover</option>
                                <option value="Collision" >Collision</option>
                                <option value="Distracted driving" >Distracted driving</option>
                                <option value="Bone fractures" >Bone fractures</option>
                                <option value="Whiplash" >Whiplash</option>
                                <option value="Head-on collision" >Head-on collision</option>
                                <option value="Aggressive driving" >Aggressive driving</option>
                            </select>
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label" for="location">Location</label>
                            <input type="text" id="location" name="location" class="form-control" placeholder="Address" data-msg="Please enter the address" />
                        </div>

                        <div class="col-12 col-md-12">
                            <label class="form-label" for="Description">Description</label>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" name="description" id="description" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Description</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary me-1 mt-2">Report</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- /  modal -->
