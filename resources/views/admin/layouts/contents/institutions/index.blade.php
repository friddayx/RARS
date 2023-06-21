<!-- Basic table -->
<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div>
                    <h3 class="text-center">New Accident Reports</h3>
                </div>
                <table class="accident-tables table">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Emergency Line</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($all_institutions as $all_institution)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$all_institution->institution_name ?? ''}}</td>
                        <td>{{$all_institution->emergency_line ?? ''}}</td>
                        <td>{{$all_institution->contact ?? ''}}</td>
                        <td>{{$all_institution->email ?? ''}}</td>
                        <td style="size: 12px; !important;">
                            <a href="{{route('edit_institution',$all_institution->id)}}"><i class="text-primary" data-feather='edit'></i></a>
                            <a href="{{route('assign.new',$all_institution->id)}}"><i class="text-danger" data-feather='trash-2'></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Emergency Line</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</section>
<!--/ Basic table -->
