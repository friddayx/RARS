<section class="app-user-view-account">
    <div class="row">
        <!-- User Sidebar -->
        <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
            <!-- User Card -->
            <div class="card">
                <div class="card-body">
                    <div class="user-avatar-section">
                        <div class="d-flex align-items-center flex-column">
                            <img class="img-fluid rounded mt-3 mb-2" src="{{asset('martin_files/images/avatar_profile.png')}}"
                                 height="110" width="110" alt="User avatar" />
                            <div class="user-info text-center">
                                <h6 class="badge bg-light-secondary">{{$my_data->national_id ?? ''}}</h6>
                                <h4>{{$my_data->username ?? ''}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around my-2 pt-75">

                    </div>
                    <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
                    <div class="info-container">
                        <ul class="list-unstyled">
                            <li class="mb-75">
                                <span class="fw-bolder me-25">Name:</span>
                                <span>{{$my_data->name ?? ''}}</span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">Email:</span>
                                <span>{{$my_data->email ?? ''}}</span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">Contact:</span>
                                <span>{{$my_data->contact ?? ''}}</span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">National Id:</span>
                                <span>{{$my_data->national_id ?? ''}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--/ User Sidebar -->

        <!-- User Content -->
        <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">

            <!-- Activity Timeline -->
            <div class="card">
                <h4 class="card-header">My Profile</h4>
                <div class="card-body">
                    <form id="update_admin_profile" class="needs-validation" method="POST" action="{{route('update.profile')}}" novalidate>
                        @csrf
                        <div class="row">
                            <div class="mb-1 col-md-6">
                                <label for="passport" class="form-label">Profile pic <i class="text-danger">*</i></label>
                                <input class="form-control" type="file" id="passport" name="passport" required />
                                <div class="invalid-feedback">Please upload passport picture</div>
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="title">Username <i class="text-danger">*</i></label>
                                <input type="text" id="username" name="username" value="{{$my_data->username ?? ''}}" class="form-control"
                                       placeholder="Username" aria-label="Username" aria-describedby="username" required/>
                                {{--                                <div class="valid-feedback">Looks good!</div>--}}
                                <div class="invalid-feedback">Please enter your national id.</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="name">Name <i class="text-danger">*</i></label>
                                <input type="text" name="name" value="{{$my_data->name ?? ''}}" id="name" class="form-control"
                                       placeholder="Name" aria-label="Name" aria-describedby="name" required />
                                {{--                                <div class="valid-feedback">Looks good!</div>--}}
                                <div class="invalid-feedback">Please enter your name.</div>
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" id="email" value="{{$my_data->email ?? ''}}" name="email"
                                       class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email"/>
                                {{--                                <div class="valid-feedback">Looks good!</div>--}}
                                <div class="invalid-feedback">Please enter your email.</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="national_id">National ID <i class="text-danger">*</i></label>
                                <input type="text" id="national_id" name="national_id" value="{{$my_data->national_id ?? ''}}" class="form-control"
                                       placeholder="National ID" aria-label="National ID" aria-describedby="national_id" required/>
                                {{--                                <div class="valid-feedback">Looks good!</div>--}}
                                <div class="invalid-feedback">Please enter your national id.</div>
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="contact">Contact <i class="text-danger">*</i></label>
                                <input type="text" id="contact" name="contact" value="{{$my_data->contact ?? ''}}" class="form-control" placeholder="0240000000" aria-label="0240000000" required />
                                {{--                                <div class="valid-feedback">Looks good!</div>--}}
                                <div class="invalid-feedback">Please enter a valid contact</div>
                            </div>
                        </div>
                        <div class="mb-1">

                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">Update Profile</button>
                    </form>

                </div>
            </div>
        </div>
        <!--/ User Content -->
    </div>
</section>
