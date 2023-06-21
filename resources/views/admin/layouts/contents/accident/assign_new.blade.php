<!-- Horizontal Wizard -->
<section class="horizontal-wizard">

    <div class="row border-3">
        <form id="institution-assigned" action="{{route('assign.institution')}}" method="POST">
            @csrf
            <input type="hidden" name="id" id="id" value="{{$fetch_accident->id}}">
            <div class="content-header">
                <h5 class="text-center text-dark">Accident Details</h5>
            </div>
            <hr><br>
            <div class="row">
                <div class="mb-1 col-md-6">
                    <label class="form-label" for="vertical-username">Accident Type</label>
                    <input type="text" id="accident_type" name="accident_type" class="form-control" required value="{{$fetch_accident->accident_type}}" readonly/>
                    @error('accident_type') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mb-1 col-md-6">
                    <label class="form-label" for="vertical-email">Location</label>
                    <input type="text" id="location" name="location" class="form-control" value="{{$fetch_accident->location}}" required readonly/>
                    @error('location') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mb-1 col-md-12">
                    <label class="form-label" for="vertical-email">Description</label>
                    <div class="mb-1">
                        <textarea class="form-control" name="description" id="description" readonly  rows="3">{{$fetch_accident->description}}</textarea>
                    </div>
                </div>
                <div class="mb-1 col-md-6">
                    <label class="form-label" for="sex">Assign Institution</label>
                    <select class="select2 form-select" name="institution" id="institution">
                        @foreach($fetch_institutions as $fetch_institution)
                        <option value="{{$fetch_institution->id}}">{{$fetch_institution->institution_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br><hr><br>
            <button type="submit" class="btn btn-success float-end">Assign Institution</button>
            <br><hr><br>
        </form>
    </div>

</section>
<!-- /Horizontal Wizard -->
