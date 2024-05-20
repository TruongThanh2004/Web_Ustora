@extends('layouts.app_admin')

@section('title', 'Show Categrori')

@section('contents')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<h1 class="mb-0">Detail Product</h1>
<hr />
<div class="row">
        
    <!-- <div class="col-2 mb-3">
        <label class="form-label">Hình ảnh sản phẩm</label>
        <img src="" alt="" width="150px" height="150px">
    </div> -->
    <div class="col mb-3">
        <label class="form-label"> Mã loại</label>
        <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $categori->id }}"
            readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Tên lọai</label>
        <input type="text" name="price" class="form-control" placeholder="Price"
            value="{{ $categori->name }}" readonly>
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