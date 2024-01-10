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
                            <a type="button" href="{{ 'downloadPdf3' }}" class="btn btn-outline-warning">Download Pdf</a>
                            <a type="button" href="{{ 'export-product' }}" class="btn btn-outline-success">Export
                                Product</a>
                            <a type="button" href="/product/create" class="btn btn-outline-secondary">New Product</a>
                        </div>

        </div>
        <div class="body">
            <form method="post" action="{{ route('deleteMultipleRecords') }}" id="deleteForm">
                @csrf
                    <div class="table-responsive ">
                    <table  class="table  table-hover">
                        <thead>
                            <tr>
                             <th><input type="checkbox" id="select-all" onclick="return confirm('Are you sure to delete this ?')"></th>
                            <th scope="row">No.</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($product as $product)
                        <tr>
                            <td><input type="checkbox" class="record-checkbox" name="record_ids[]" value="{{ $product->id }}"></td>
                            <td>{{$product->id}}</td>
                            <td><img src="{{url('/images/'.$product->image )}}" class="rounded-circle" width="80" height="80"></td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>
                                <a href="/product/edit/{{ $product->id }}" class="btn btn-outline-secondary btn-md"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                <a href="/product/delete/{{ $product->id }}" class="btn btn-outline-danger btn-md" onclick="return confirm('Are you sure to delete this ?')"><i class="fa fa-trash" aria-hidden="true"></i></a>

                                                    <a href="{{ asset('pdfs/product_information.pdf') }}" target="_blank"
                                                        class="btn btn-outline-warning"><i class="fa fa-file-pdf-o"
                                                            aria-hidden="true"></i></a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <button type="button"  class="btn btn-outline-danger btn-md" id="deleteSelected">Delete Selected</button>

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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#select-all').change(function () {
            $('.record-checkbox').prop('checked', this.checked);
        });

        $('#deleteSelected').click(function () {
            $('#deleteForm').submit();
        });
    });
</script>
@endsection
