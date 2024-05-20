@extends('home')
@section('content-index')
<div class="promo-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo1">
                    <i class="fa fa-refresh"></i>
                    <p>30 Days return</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo2">
                    <i class="fa fa-truck"></i>
                    <p>Free ship</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo3">
                    <i class="fa fa-lock"></i>
                    <p>Secure payments</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo4">
                    <i class="fa fa-gift"></i>
                    <p>New products</p>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End promo area -->


<div class="brands-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="brand-wrapper">
                    <div class="brand-list">
                        @foreach($category as $data)                                  
                            <a href="{{route('logo.product', $data->id)}}"><img src="{{asset('img/' . $data->type_logo)}}"
                                    style="width: 180px;height: 100px;margin-right: 10px;" alt=""></a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End brands area -->

<div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="latest-product">
                    <h2 class="section-title">Sản Phẩm Mới</h2>
                    <div class="product-carousel">
                        @foreach($product_cart as $data)
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="{{asset('img/' . $data->product_image)}}" alt="" class="img-product">
                                    <div class="product-hover">
                                        <a href="{{route('single.product', $data->id)}}" class="view-details-link"><i
                                                class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>
                                <h2><a href="{{route('single.product', $data->id)}}">{{$data->product_name}}</a></h2>
                                <div class="product-carousel-price">
                                    {{number_format($data->product_price, 0, ',', '.')}} vnđ
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End main content area -->

<div class="product-widget-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-product-widget" style="max-height: 420px; overflow-y: auto;">
                    <h2 class="product-wid-title">Yêu Thích</h2>
                    <div id="favotites_list">
                    
                    </div>
                   

                </div>
            </div>
            <div class="col-md-4">
                <div class="single-product-widget">
                    <h2 class="product-wid-title">Recently Viewed</h2>
                    @foreach($data_product as $data)
                        <div class="single-wid-product">
                            <a href="{{route('single.product', $data->id)}}"><img
                                    src="{{asset('img/' . $data->product_image)}}" alt="" class="product-thumb"></a>
                            <h2><a href="{{route('single.product', $data->id)}}">{{$data->product_name}}</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                {{number_format($data->product_price, 0, ',', '.')}} vnđ
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-product-widget">
                    <h2 class="product-wid-title">Top New</h2>
                    @foreach($data_product as $data)
                        <div class="single-wid-product">
                            <a href="{{route('single.product', $data->id)}}"><img
                                    src="{{asset('img/' . $data->product_image)}}" alt="" class="product-thumb"></a>
                            <h2><a href="{{route('single.product', $data->id)}}">{{$data->product_name}}</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                {{number_format($data->product_price, 0, ',', '.')}} vnđ
                            </div>
                        </div>
                    @endforeach

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
            var price = parseFloat(data[i].price);
            var image = data[i].image;
            var promotion = data[i].promotion;
            
            var routeUrl = "{{ route('single.product', ['product' => ':id']) }}"; 
            routeUrl = routeUrl.replace(':id', id);
            var price = parseFloat(data[i].price); // Convert price to float
            var formattedPrice = price.toLocaleString('vi-VN', {  currency: 'VND' });


            // Thêm dữ liệu từ localStorage vào phần tử #favotites_list
            $('#favotites_list').append('<div class="single-wid-product" ><a href="' + routeUrl + '"><img  src="' + image + '" class="product-thumb"></a>'
            +'<h2><a href="'+routeUrl+'">' + name + '</a></h2>'+
            ' <div class="product-wid-rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>  <i class="fa fa-star"></i><i class="fa fa-star"></i></div>'+
            '<div class="product-wid-price">'+formattedPrice+' vnđ</div></div>'



            );
        };
    }
    view();
</script>
@endsection