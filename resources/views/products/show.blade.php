@extends('layouts.app_admin')

@section('title', 'Show Product')

@section('contents')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<h1 class="mb-0">Detail Product</h1>
<hr />
<div class="row">
        
    <div class="col-2 mb-3">
        <label class="form-label">Hình ảnh sản phẩm</label>
        <img src="{{asset('img/' . $product->product_image)}}" alt="" width="150px" height="150px">
    </div>
    <div class="col mb-3">
        <label class="form-label">Tên sản phẩm</label>
        <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $product->product_name }}"
            readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Số lượng</label>
        <input type="text" name="price" class="form-control" placeholder="Price"
            value="{{ $product->product_quantity }}" readonly>
    </div>
</div>
<div class="row">
    <div class="col mb-3">
        <label class="form-label">Giá sản phẩm</label>
        <input type="text" name="product_code" class="form-control" placeholder="Product Code"
            value="{{ $product->product_price }}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Thông tin khuyến mãi</label>
        <textarea class="form-control" name="description" placeholder="Descriptoin"
            readonly>{{ $product->Promotion }}</textarea>
    </div>
</div>
<div class="row">
<div class="col mb-3">
        <label class="form-label">Chi tiết sản phẩm</label>
        <textarea class="form-control" name="description" placeholder="Descriptoin"
            readonly id="summernote">{{ $product->product_detail }}</textarea>
    </div>
</div>

<div class="row">
    <div class="col mb-3">
        <label class="form-label">Loại sản phẩm</label>
        <input type="text" name="product_code" class="form-control" placeholder="Product Code"
            value="{{ $product->product_type }}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Hãng sản phẩm </label>
        <input type="text" name="product_code" class="form-control" placeholder="Product Code"
            value="{{ $product->type_name}}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Mã logo của hãng</label>
        <input type="text" name="product_code" class="form-control" placeholder="Product Code"
            value="{{ $product->type_logo }}" readonly>
    </div>
</div>
<div class="row">
<div class="col mb-3">
        <label class="form-label">Khuyến mãi</label>
        <input type="text" name="created_at" class="form-control" placeholder="Created At"
            value="{{ $product->Promotion }}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Created At</label>
        <input type="text" name="created_at" class="form-control" placeholder="Created At"
            value="{{ $product->created_at }}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Updated At</label>
        <input type="text" name="updated_at" class="form-control" placeholder="Updated At"
            value="{{ $product->updated_at }}" readonly>
    </div>
</div>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
      $('#summernote').summernote({
      placeholder: '',
      height: 400
    });
</script>
@endsection