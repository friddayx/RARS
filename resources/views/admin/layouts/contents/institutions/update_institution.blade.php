<!-- Horizontal Wizard -->
<section class="horizontal-wizard">

    <div class="row border-3">
        <form id="institution-update" action="{{route('update_institution')}}" method="POST">
            @csrf
            <input type="hidden" name="id" id="id" value="{{$fetch_institution->id}}">
            <div class="content-header">
                <h2 class="text-center text-dark">Institution Details</h2>
            </div>
            <hr><br>
            <div class="row">
                <div class="mb-1 col-md-6">
                    <label class="form-label" for="vertical-username">Institution Name</label>
                    <input type="text" id="institution_name" name="institution_name" class="form-control" required value="{{$fetch_institution->institution_name}}"/>
                    @error('institution_name') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mb-1 col-md-6">
                    <label class="form-label" for="vertical-email">Emergency Line</label>
                    <input type="number" id="emergency_line" name="emergency_line" class="form-control" required value="{{$fetch_institution->emergency_line}}"/>
                    @error('emergency_line') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mb-1 col-md-6">
                    <label class="form-label" for="vertical-email">Contact</label>
                    <input type="number" id="contact" name="contact" class="form-control" required value="{{$fetch_institution->contact}}"/>
                    @error('contact') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mb-1 col-md-6">
                    <label class="form-label" for="sex">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required value="{{$fetch_institution->email}}"/>
                    @error('email') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <br><hr><br>
            <button type="submit" class="btn btn-success float-end">Update Institution</button>
            <br><hr><br>
        </form>
    </div>

</section>
<!-- /Horizontal Wizard -->
