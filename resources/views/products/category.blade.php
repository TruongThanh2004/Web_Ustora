@extends('layouts.app_admin')
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Category Product</h1>
        <a href="{{ route('category.create') }}" class="btn btn-primary">Add Category</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover" style=" border-collapse: collapse;  width: 100%;">
        <thead class="table-primary">
            <tr>
                <th>Id</th>
                <th>Tên loại sản phẩm </th>
                <!-- <th>Số lượng</th>
                <th>Giá tiền</th>
                <th>Chi tiết sản phẩm</th>
                <th>Hình ảnh</th> -->
                <th></th>
            </tr>
        </thead>
        <tbody>+
            @if($category->count() > 0)
                @foreach($category as $rs)
                    <tr >
                        <td class="align-middle">{{ $rs->id }}</td>
                        <td class="align-middle"  width="200px">{{ $rs->name }}</td>
                        <!-- <td class="align-middle">{{ $rs->product_quantity }}</td>
                        <td class="align-middle" width="150px">{{ $rs->product_price }}</td>
                        <td class="align-middle">
                            <div style="max-height: 500px;overflow-y: auto; ">
                                    <p>
                                    {{ $rs->product_detail }}
                                    </p>
                            </div>
                        </td>
                        <td class="align-middle"><img src="{{asset('img/' . $rs->product_image)}}" alt="" width="100px" height="100px"></td> -->
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('category.show', $rs->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('category.edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('category.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Bạn có muốn xóa loại sản phẩm này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Product not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection