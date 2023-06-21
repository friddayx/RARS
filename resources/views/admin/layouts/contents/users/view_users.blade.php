<!-- Horizontal Wizard -->
<section class="horizontal-wizard">

    <div class="row border-3">
        <form id="institution-update">
            @csrf
{{--            <input type="hidden" name="id" id="id" value="{{$fetch_user->id}}">--}}
            <div class="content-header">
                <h2 class="text-center text-dark">User Details</h2>
            </div>
            <hr><br>
            <div class="row">
                <div class="mb-1 col-md-6">
                    <label class="form-label" for="vertical-name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" required value="{{$fetch_user->name}}" readonly/>
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mb-1 col-md-6">
                    <label class="form-label" for="vertical-username">Username</label>
                    <input type="text" id="username" name="username" class="form-control" required value="{{$fetch_user->username}}" readonly/>
                    @error('username') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mb-1 col-md-6">
                    <label class="form-label" for="vertical-email">Email</label>
                    <input type="text" id="email" name="email" class="form-control" required value="{{$fetch_user->email}}" readonly/>
                    @error('email') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mb-1 col-md-6">
                    <label class="form-label" for="vertical-national_id">National ID</label>
                    <input type="text" id="national_id" name="national_id" class="form-control" required value="{{$fetch_user->national_id}}" readonly/>
                    @error('national_id') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mb-1 col-md-6">
                    <label class="form-label" for="vertical-address">Address</label>
                    <input type="text" id="address" name="address" class="form-control" required value="{{$fetch_user->address}}" readonly/>
                    @error('address') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mb-1 col-md-6">
                    <label class="form-label" for="vertical-contact">Contact</label>
                    <input type="text" id="contact" name="contact" class="form-control" required value="{{$fetch_user->contact}}" readonly/>
                    @error('contact') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mb-1 col-md-6">
                    <label class="form-label" for="vertical-passport">Passport</label>
                    <input type="text" id="passport" name="passport" class="form-control" required value="{{$fetch_user->passport}}" readonly/>
                    @error('passport') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mb-1 col-md-6">
                    <label class="form-label" for="vertical-active">Status</label>
                    <input type="text" id="active" name="active" class="form-control" required value="{{$fetch_user->active}}" readonly/>
                    @error('active') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <br><hr><br>
{{--            <button type="submit" class="btn btn-success float-end">Update Institution</button>--}}
            <br><hr><br>
        </form>
    </div>

</section>
<!-- /Horizontal Wizard -->
