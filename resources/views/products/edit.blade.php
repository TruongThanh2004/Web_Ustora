@extends('layouts.app_admin')

@section('contents')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<h1 class="mb-0">Edit Product</h1>
<hr />
<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Tên sản phẩm</label>
            <input type="text" name="product_name" class="form-control" placeholder="Title"
                value="{{ $product->product_name }}">
        </div>
        <div class="col mb-3">
            <label class="form-label">Số lượng</label>
            <input type="text" name="product_quantity" class="form-control" placeholder="Price"
                value="{{ $product->product_quantity }}">
        </div>
        <div class="col mb-3">
            <label class="form-label">Giá sản phẩm</label>
            <input type="text" name="product_price" class="form-control" placeholder="Price"
                value="{{ $product->product_price }}">
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Chi tiết sản phẩm</label>
            <textarea class="form-control" name="product_detail" placeholder="Descriptoin"
                id="summernote">{{ $product->product_detail }} </textarea>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Khuyến mãi</label>
            <input type="text" name="Promotion" class="form-control" placeholder="Price"
                value="{{ $product->Promotion }}">
        </div>
        <div class="col-2 mb-3">
            <label class="form-label">Hình ảnh sản phẩm</label>
            <img src="{{asset('img/' . $product->product_image)}}" alt="" width="160px" height="160px"
                id="previewImage">
        </div>
        <div class="col mb-3">
            <input type="file" id="fileInput" style="opacity: 0;" name="fileUpload">
            <label for="file" class="button" onclick="chooseFile()" style="background: #0450d5;
             color: white;
             line-height: 1.2;
             padding: 10px;
             border-radius: 4px;
             position: absolute;
             left:10px;
             top:50%;
             margin-bottom: 10px;
             cursor: pointer;">
                Upload Image
            </label>
        </div>
    </div>
    <div class="row">
        <div class="d-grid">
            <button class="btn btn-warning">Update</button>
        </div>
    </div>
</form>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $('#summernote').summernote({
        placeholder: '',
        height: 300
    });
    function chooseFile() {
        document.getElementById('fileInput').click();
    }

    document.getElementById('fileInput').addEventListener('change', function () {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (event) {
                var imgElement = document.getElementById('previewImage');
                imgElement.src = event.target.result;
                imgElement.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection