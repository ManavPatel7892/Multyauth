@extends('layouts.app')
@section('main-section')
<div id="main-content">
    <div class="container-fluid">
<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h1><b>Users Table</b></h1>
            @if ($message = Session::get('success'))
            <div class="alert alert-success mt-4" style="margin-right: 30%; margin-left: 30%;" role="alert">
                <strong>{{  $message}}</strong>
            </div>
            @endif
            <div class="text-right" style="float: center">
                <a type="button" href="{{ ('downloadPdf') }}" class="btn btn-outline-warning">Download Pdf</a>
                <a type="button" href="{{ ('export-user') }}" class="btn btn-outline-success">Export User</a>
                <a type="button" href="/user/create" class="btn btn-outline-secondary">New User</a>
            </div>

        </div>
        <div class="body">
            <div class="table-responsive ">
                <table id="DataTables_Table_0" class="table user-data-table table-hover">
                    <thead>
                        <tr>
                            <th scope="row">No.</th>
                            <th>Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
@endsection
@section('page-script')
<script type="text/javascript">
    $(function () {

      var table = $('.user-data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('user.user') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'name', name: 'name'},
              {data: 'last_name', name: 'last_name'},
              {data: 'gender', name: 'gender'},
              {data: 'email', name: 'email'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });

    });
  </script>
@endsection
