@extends('layouts.app_admin')

@section('contents')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<h1 class="mb-0">Edit Category</h1>
<hr />
<form action="{{ route('category.update', $categori->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Tên sản phẩm</label>
            <input type="text" name="name" class="form-control" placeholder="Title"
                value="{{ $categori->name }}">
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

document.getElementById('fileInput').addEventListener('change', function() {
    var file = this.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function(event) {
            var imgElement = document.getElementById('previewImage');
            imgElement.src = event.target.result;
            imgElement.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endsection