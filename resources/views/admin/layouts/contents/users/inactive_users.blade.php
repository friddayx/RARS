<!-- Basic table -->
<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div>
                    <h3 class="text-center">InActive Users</h3>
                </div>
                <table class="accident-tables table">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>National ID</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($fetch_users as $fetch_user)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$fetch_user->name ?? ''}}</td>
                            <td>{{$fetch_user->email ?? ''}}</td>
                            <td>{{$fetch_user->contact ?? ''}}</td>
                            <td>{{$fetch_user->national_id ?? ''}}</td>
                            <td style="size: 12px; !important;">
                                <a href="{{route('user_detail',$fetch_user->id)}}"><i class="text-success" data-feather='eye'></i></a>
                                <a href="{{route('user_update',$fetch_user->id)}}"><i class="text-primary" data-feather='edit'></i></a>
                                <a href="{{route('assign.new',$fetch_user->id)}}"><i class="text-danger" data-feather='trash-2'></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>National ID</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</section>
<!--/ Basic table -->
