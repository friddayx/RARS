<!-- Basic table -->
<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div>
                    <h3 class="text-center">Pending Accident Reports</h3>
                </div>
                <table class="accident-tables table">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Accident Type</th>
                        <th>Description</th>
                        <th>Location</th>
                        <th>Institution</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($new_accidents as $new_accident)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$new_accident->accident_type ?? ''}}</td>
                            <td>{{$new_accident->description ?? ''}}</td>
                            <td>{{$new_accident->location ?? ''}}</td>
                            <td>{{$new_accident->institution ?? ''}}</td>
                            <td style="size: 12px; !important;">
                                <a href="{{route('complete.assign',$new_accident->id)}}"><i class="text-success" data-feather='edit'></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>id</th>
                        <th>Accident Type</th>
                        <th>Description</th>
                        <th>Location</th>
                        <th>Institution</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</section>
<!--/ Basic table -->
