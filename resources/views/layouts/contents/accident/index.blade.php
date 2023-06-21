@include('modals.report')
<!-- Basic table -->
<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <table class="datatables-basic table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Accident</th>
                        <th>Description</th>
                        <th>Location</th>
                        <th>Institution</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($accident_history as $accident)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$accident->accident_type}}</td>
                        <td>{{$accident->description}}</td>
                        <td>{{$accident->location}}</td>
                        <td>{{$accident->institution}}</td>
                        <td>{{$accident->status}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Accident</th>
                        <th>Description</th>
                        <th>Location</th>
                        <th>Institution</th>
                        <th>Status</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</section>
<!--/ Basic table -->
