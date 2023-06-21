@include('modals.report')
<!-- Dashboard Ecommerce Starts -->
<section id="dashboard-ecommerce">
    <div class="row match-height">
        <!-- Medal Card -->
        <div class="col-xl-4 col-md-6 col-12">
            <div class="card card-congratulation-medal">
                <div class="card-body">
                    <h5>Welcome {{Auth::user()->username}}</h5>
                    <p class="card-text font-small-3"></p>
                    <h3 class="mb-75 mt-2 pt-50">
                        <a href="#"></a>
                    </h3>
                    <button type="button"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reportAccident">Report Accident</button>
                    <img src="{{asset('martin_files/app-assets/images/illustration/badge.svg')}}" class="congratulation-medal" alt="Report" />
                </div>
            </div>
        </div>
        <!--/ Medal Card -->

        <!-- Statistics Card -->
        <div class="col-xl-8 col-md-6 col-12">
            <div class="card card-statistics">
                <div class="card-header">
                    <h4 class="card-title">Statistics</h4>
                    <div class="d-flex align-items-center">
                        <p class="card-text font-small-2 me-25 mb-0">Updated 1 second ago</p>
                    </div>
                </div>
                <div class="card-body statistics-body">
                    <div class="row">
                        <div class="col-xl-6 col-sm-6 col-12 mb-2 mb-xl-0">
                            <div class="d-flex flex-row">
                                <div class="avatar bg-light-primary me-2">
                                    <div class="avatar-content">
                                        <i data-feather="trending-up" class="avatar-icon"></i>
                                    </div>
                                </div>
                                <div class="my-auto">
                                    <h4 class="fw-bolder mb-0">{{$accident_reported}}</h4>
                                    <p class="card-text font-small-3 mb-0">Accidents Reported</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-sm-6 col-12 mb-2 mb-xl-0">
                            <div class="d-flex flex-row">
                                <div class="avatar bg-light-info me-2">
                                    <div class="avatar-content">
                                        <i data-feather="user" class="avatar-icon"></i>
                                    </div>
                                </div>
                                <div class="my-auto">
                                    <h4 class="fw-bolder mb-0">{{$accident_responded}}</h4>
                                    <p class="card-text font-small-3 mb-0">Report Responded by Institution</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Statistics Card -->
    </div>

</section>
<!-- Dashboard Ecommerce ends -->
