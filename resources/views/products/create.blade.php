
@extends('layouts.app_admin')

@section('title', 'Create Product')

@section('contents')

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<h1 class="mb-0">Add Product</h1>
<hr />
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <div class="col">
            <input type="text" name="product_name" class="form-control" placeholder="Tên sản phẩm">
        </div>
        <div class="col">
            <input type="text" name="product_quantity" class="form-control" placeholder="Số lượng">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <input type="text" name="product_price" class="form-control" placeholder="Giá sản phẩm">
        </div>
        <div class="col">
            <textarea class="form-control" name="Promotion" placeholder="Thông tin khuyến mãi"></textarea>
        </div>
       
    </div>
    <div class="row mb-3">
    <div class="col">
            <textarea class="form-control" name="product_detail" placeholder="Chi tiết sản phẩm" id="summernote"></textarea>
    </div>
   
    </div>
    <div class="row mb-3">
        <div class="col-4">
            <!-- <input type="text" name="product_type" class="form-control" placeholder="Mã sản phẩm"> -->
            <b>Loại sản phẩm</b>
            <select name="product_type" id="">
               @foreach ($categori as $data )
               <option value="{{$data->id}}">{{$data->name}}</option>
               @endforeach
            </select>
        </div>
        <div class="col-4">
            <!-- <input type="text" name="type_name" class="form-control" placeholder="Mã "> -->
            <b>Hãng sản phẩm</b>
            <select name="type_name" id="">
               @foreach ($category as $data )
               <option value="{{$data->type_id}}">{{$data->type_name}}</option>
               @endforeach
            </select>
        </div>
        <div class="col-4">
            <!-- <input type="text" name="type_logo" class="form-control" placeholder="Mã logo "> -->
            <b>Mã logo của hãng</b>
            <select name="type_logo" class="">
               @foreach ($category as $data )
               <option value="{{$data->type_idlogo}}">{{$data->type_idlogo}}</option>
               @endforeach
            </select>
        </div>

    </div>
    <div class="row mb-3">
    
        <div class="col">

            <input type="file" id="fileInput" style="opacity: 1;" name="fileUpload">
           

        </div>
      
    </div>

    <div class="row ">
        <div class="d-grid ">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
     $('#summernote').summernote({
      placeholder: 'Chi tiết sản phẩm',
      height: 100
    });
   


</script>
@endsection