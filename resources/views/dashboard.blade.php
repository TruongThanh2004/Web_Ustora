<link rel="stylesheet" href="style.css">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Đơn hàng đã đặt') }}
        </h2>
    </x-slot>

    <div class="single-product-area">
        <div class="container">
            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="woocommerce">
                        <form method="post" action="#">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                {{ __('Đơn hàng đã đặt') }}
                            </h2>
                            <table cellspacing="0" class="shop_table cart">
                                <thead>
                                    <tr>
                                        <th class="product-name">Tên Sản Phẩm</th>
                                        <th class="product-quantity">Số Lượng</th>
                                        <th class="product-price">Giá</th>
                                        <th class="product-subtotal">Tổng Tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart->getList() as $item)
                                    <tr class="cart_item">
                                        <td class="product-name">
                                            {{ $item['product_name'] }}
                                        </td>

                                        <td class="product-quantity">
                                            {{ $item['quantity']}}
                                        </td>

                                        <td class="product-price">
                                            {{number_format($item['product_price'],0, ',', '.')}} vnđ
                                        </td>

                                        <td class="product-subtotal">
                                            {{number_format($item['product_price'] * $item['quantity'],0, ',', '.')}} vnđ
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="6">
                                            <h4 style=" margin-bottom: 15px; margin-top: 10px;">Tổng ({{count($cart->getList())}} sản phẩm): {{number_format($cart->getTotalPrice() ,0, ',', '.')}} vnđ</h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>