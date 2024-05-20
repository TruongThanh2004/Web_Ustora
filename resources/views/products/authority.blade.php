@extends('layouts.app_admin')

@section('contents')

<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0"> Ủy Quyền </h1>
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
            <th>Tên người dùng</th>
            <th>Email</th>
            <th>Quyền</th>
            <th>Admin</th>
            <th>User</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @if($user->count() > 0)
            @foreach($user as $rs)
                <form action="{{ route('author.update', $rs->id) }}" method="POST">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <tr>
                            <td class="align-middle">{{ $rs->id }}</td>
                            <td class="align-middle" width="200px">{{ $rs->name }}</td>
                            <td class="align-middle">{{ $rs->email }}</td>
                            <td class="align-middle">{{ $rs->usertype }}</td>

                            <td class="align-middle" width="200px">
                                <input type="checkbox" name="admin"   {{ $rs->usertype() === 'admin' ? 'checked' : '' }} >
                            </td>
                            <td class="align-middle">
                                <input type="checkbox" name="user"  {{ $rs->usertype() === 'user' ? 'checked' : '' }} >
                            </td>
                            <td class="align-middle">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-primary">Trao Quyền</button>
                </form>
                <form action="{{ route('author.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0"
                    onsubmit="return confirm('Bạn có muốn xóa loại sản phẩm này?')">
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
<script>
    const adminCheckbox = document.querySelector('input[name="admin"]');
    const userCheckbox = document.querySelector('input[name="user"]');

    adminCheckbox.addEventListener('change', function() {
    if (this.checked) {
        userCheckbox.checked = false;   
    }
    });

    userCheckbox.addEventListener('change', function() {
    if (this.checked) {
        adminCheckbox.checked = false;
    }
    });
</script>

@endsection