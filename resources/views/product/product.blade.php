@extends('layouts.app')
@section('main-section')
    <div id="main-content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h1><b>Product Table</b></h1>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success mt-4" style="margin-right: 30%; margin-left: 30%;" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        <div class="text-right" style="float: center">
                            <a type="button" class="btn btn-outline-danger btn-md" id="deleteSelected">Delete Selected</a>
                            <a type="button" href="{{ 'downloadPdf3' }}" class="btn btn-outline-warning">Download Pdf</a>
                            <a type="button" href="{{ 'export-product' }}" class="btn btn-outline-success">Export
                                Product</a>
                            <a type="button" href="/product/create" class="btn btn-outline-secondary">New Product</a>
                        </div>

                    </div>
                    <div class="body">
                        <form method="POST" action="{{ route('deleteMultipleRecords') }}" id="deleteForm">
                            @csrf
                            <div class="table-responsive ">
                                <table id="DataTables_Table_0" class="table product-data-table table-hover">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="select-all"></th>
                                            <th scope="row">No.</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-script')
    <script type="text/javascript">
        $(function() {

            var table = $('.product-data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('product.product') }}",
                columns: [{
                        data: 'checkbox',
                        name: 'checkbox',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

        });
    </script>

    <script>
        $(document).ready(function() {
            $('#select-all').change(function() {
                $('.record-checkbox').prop('checked', this.checked);
            });
            $('#deleteSelected').click(function() {
                $('#deleteForm').submit();
            });
        });
    </script>
@endsection
