@extends('admin_layouts.admin')

@section('title','Add Product')


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <!-- left column -->
                <div class="col-md-12">
                <!-- jquery validation -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Add product</h3>
                        </div>
                        @if (Session::has('status'))
                        <div class="alert alert-success">
                            {{Session::get('status')}}
                        </div>
                        @endif

                        @if (count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{--<form id="quickForm"> --}}
                        {!!Form::open(['action' =>'ProductController@saveProduct' , 'method' => 'POST', 'enctype'=>"multipart/form-data" ]) !!}
                        {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    {!! Form::label('', 'Product name', ['for' => 'exampleInputEmail1']) !!}
                                    {!! Form::text('product_name', '' , ['class' => 'form-control' , 'id' => 'exampleInputEmail1' , 'placeholder' => 'Enter product']) !!}
                                    {{-- <label for="exampleInputEmail1">Product name</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Enter product name"> --}}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('', 'Product price', ['for' => 'exampleInputEmail1']) !!}
                                    {!! Form::number('product_price', '' , ['class' => 'form-control' , 'id' => 'exampleInputEmail1' , 'placeholder' => 'Enter product price']) !!}
                                    {{-- <label for="exampleInputEmail1">Product price</label>
                                    <input type="number" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Enter product price" min="1"> --}}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('', 'Product qty', ['for' => 'exampleInputEmail1']) !!}
                                    {!! Form::number('qty', '' , ['class' => 'form-control' , 'id' => 'exampleInputEmail1' , 'placeholder' => 'Enter product qty']) !!}
                                    {{-- <label for="exampleInputEmail1">Product price</label>
                                    <input type="number" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Enter product price" min="1"> --}}
                                </div>
                                <div class="form-group">
                                    {{-- {!! Form::select('product_category', $categories, null, ['placeholder' => 'Select category' , 'class' => 'form-control select2']) !!} --}}
                                    <label>Product category</label>
                                    <select class="form-control select2" name="categories[]">
                                        <optgroup label=" Select subcategory ">
                                        @foreach ($categories as $category)

                                            <option  value="{{ $category->id }}"> {{$category->category_name}} </option>

                                            @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    {{-- {!! Form::select('product_subcategory', $subcategories, null, ['placeholder' => 'Select subcategory' , 'class' => 'form-control select2']) !!} --}}
                                    <label>Product subcategory</label>
                                    <select class="form-control select2" name="subcategories[]">
                                        <optgroup label=" Select subcategory ">
                                        @foreach ($subcategories as $category)

                                            <option  value="{{ $category->id }}"> {{$category->category_name}} </option>

                                            @endforeach

                                    </select>
                                    {{-- <label>Product category</label>
                                    <select class="form-control select2" style="width: 100%;">
                                        <option selected="selected">Fruit</option>
                                        <option>Juice</option>
                                        <option>Vegetable</option>
                                    </select> --}}
                                </div>
                                <div class="form-group">
                                    <div class="form-group col-sm-3">
                                    {!! Form::label('', 'Product color', ['for' => 'exampleInputEmail1']) !!} <br>

                                    @foreach ($colors as $color)
                                        <label  class="checkbox-inline" id="exampleInputEmail1" ><input class="chk-box" type="checkbox" name="color[]" id="" value="{{ $color->color_name }}">{{ $color->color_name }}</label>
                                    @endforeach
                                    {{-- <label for="exampleInputEmail1">Product price</label>
                                    <input type="number" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Enter product price" min="1"> --}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group col-sm-2">
                                        {!! Form::label('', 'Product size', ['for' => 'exampleInputEmail1']) !!} <br>
                                        @foreach ($sizes as $size)
                                            <label  class="checkbox-inline" id="exampleInputEmail1"><input class="chk-box" type="checkbox" name="size[]" id="" value="{{ $size->size_name }}">{{ $size->size_name }}</label>
                                        @endforeach
                                    </div>

                                    {{-- <label for="exampleInputEmail1">Product price</label>
                                    <input type="number" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Enter product price" min="1"> --}}
                                </div>
                                <label for="exampleInputFile">Product image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        {!! Form::file('product_image',  ['class' => 'custom-file-input' , 'id' => 'exampleInputFile' ]) !!}
                                        {!! Form::label('', 'Choose file', ['class' => 'custom-file-label' ,'for' => 'exampleInputFile']) !!}
                                        {{-- <input type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label> --}}
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                            <!-- <button type="submit" class="btn btn-success">Submit</button> -->
                                {!! Form::submit('Save', ['class'=> 'btn btn-success']) !!}
                                {{-- <input type="submit" class="btn btn-success" value="Save"> --}}
                            </div>
                            {!! Form::close() !!}
                        {{--</form>--}}
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection

@section('scripts')

<!-- jquery-validation -->
<script src="backend/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="backend/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="backend/dist/js/adminlte.min.js"></script>

<script>
    $(function () {
        $.validator.setDefaults({
            submitHandler: function () {
                alert( "Form successful submitted!" );
            }
        });
        $('#quickForm').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 5
                },
                terms: {
                    required: true
                },
            },
            messages: {
                email: {
                    required: "Please enter a email address",
                    email: "Please enter a vaild email address"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                terms: "Please accept our terms"
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>

@endsection
