@extends('layouts.app')
@section('main-section')
@if ($message = Session::get('success'))
    <div class="alert alert-success mt-4" style="margin-right: 30%; margin-left: 30%;" role="alert">
        <strong>{{ $message }}</strong>
    </div>
@endif
<div id="main-content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2 class="lead"><b>Update Product</b></h2>
                </div>
                <div class="body">
                    <form id="product-edit-form" class="form-auth-small" method="POST" action="/product/update/{{ $product->id }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group c_form_group">
                            <label>ProductName</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter your ProductName"  value="{{ old('name', $product->name) }}">
                        </div>
                        <div class="form-group c_form_group">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control"
                                placeholder="Enter your Last Name"  value="{{ old('description', $product->description) }}" value="{{ old('description') }}">
                        </div>
                        <div class="form-group c_form_group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control"
                                placeholder="Enter your Image" value="{{ old('image') }}">
                        </div>
                        <button type="submit" class="btn btn-dark btn-lg btn-block">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-script')
<script>
$('#product-edit-form').validate({
    rules:{
        name:{
            required: true,
        },
        description:{
            required: true,
        },
        image:{
            required: true,
        },

    },
    messages: {
        name:{
            required: "Please enter your Product Name"
        },
        description:{
            required: "Please enter your Description"
        },
        image:{
            required: "Please enter your Image"
        },

    },
    submitHandler: function(form){
        form.submit();
    }
});
</script>
@endsection
