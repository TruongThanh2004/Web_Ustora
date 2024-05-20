<link rel="stylesheet" href="style.css">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Danh Sách Sản Phẩm Yêu Thích') }}
        </h2>
    </x-slot>

    <div class="single-product-area">
        <div class="container">
            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="woocommerce">
                        <form method="post" action="#">
                            <table cellspacing="0" class="shop_table cart">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th class="product-name">Tên Sản Phẩm</th>
                                        <th class="product-quantity">Giá</th>
                                        <th class="product-image"></th>
                                        <th class="product-subtotal">Khuyến mãi</th>
                                        <th class="delete"></th>
                                    </tr>
                                </thead>
                                <tbody id="favotites_list">
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).on('click', '.btn-delete', function () {
            var id = $(this).closest('tr').find('.id').text();

            // Xóa mục từ localStorage

            removeItemFromLocalStorage(id);
            // Xóa hàng khỏi bảng
            $(this).closest('tr').remove();
        });

        function removeItemFromLocalStorage(id) {
            var data = JSON.parse(localStorage.getItem('data'));
            for (var i = 0; i < data.length; i++) {
                if (data[i].id === id) {
                    data.splice(i, 1);
                    break;
                }
            }
            localStorage.setItem('data', JSON.stringify(data));
        }


        function view() {
            var data = JSON.parse(localStorage.getItem('data'));
            data.reverse();
            console.log(data);
            for (var i = 0; i < data.length; i++) {
                var id = data[i].id;
                var name = data[i].name;
                var price = data[i].price;
                var image = data[i].image;
                var promotion = data[i].promotion;

                  var routeUrl = "{{ route('single.product', ['product' => ':id']) }}"; 
                  routeUrl = routeUrl.replace(':id', id);
                  var price = parseFloat(data[i].price); // Convert price to float
            var formattedPrice = price.toLocaleString('vi-VN', {  currency: 'VND' });


                // Thêm dữ liệu từ localStorage vào phần tử #favotites_list
                $('#favotites_list').append('<tr><td class="id">' + id + '</td><td class="product-name"><a href="'+routeUrl+'">' + name + '</a></td><td class="product-price">' + formattedPrice + 'vnđ' + '</td><td class="product-image" ><a href="'+routeUrl+'"><img src="' + image + '" alt="' + name + '" width="200px" max-height="200px" ></a></td><td class="product-price">' + promotion + '</td><td><button type="submit" class="btn-delete">Delete</button></td></form></tr>');
            };


        }




        view();








    </script>
</x-app-layout>