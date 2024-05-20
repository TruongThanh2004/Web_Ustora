@extends('category')
@section('content')
@yield('product-category')
<div class="product-breadcroumb">
    <a href="index"></i>Home</a>
    <a href="{{route('logo.product',$data_category->id)}}">{{$data_category->type_name}}</a>
</div>
@foreach($category_product as $data)
<a href="{{route('logo.product',$data->id)}}" style="margin-top: 20px;" class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">{{$data->type_name}}</a>
@endforeach
<div class="single-product-area">
    <div class="container">
        <div class="row">
            @foreach($product as $data)
            <div class="col-md-3 col-sm-6" style="border-radius: 10px;background-color: #fbfbfb;margin-left: 10px; margin-top: 10px; width: 282px;">
                <div class="single-shop-product">

                <form>
                  @csrf
                  <input type="hidden" id="product_name{{$data->id}}" value="{{$data->product_name}}">
                  <input type="hidden" id="product_price{{$data->id}}" value="{{$data->product_price}}">
                  <input type="hidden" id="product_promotion{{$data->id}}" value="{{$data->Promotion}}">


                    <div class="product-upper">
                        <a href="{{route('single.product',$data->id)}}"> <img id="product_image{{$data->id}}" src="{{URL::to(asset('img/' . $data->product_image))}}"></a>
                    </div>
                    <h2><a href="{{route('single.product',$data->id)}}">{{$data->product_name}}</a></h2>
                    <div class="product-carousel-price">
                        {{number_format( $data->product_price,0, ',', '.')}} vnđ
                    </div>
                    <div style="margin-top: 20px;">
                        {{$data->Promotion}}
                    </div>
                </div>
                <div style="margin: 20px;">
                    <i class="fa fa-star" style="color: #FFD43B;"></i>
                    <i class="fa fa-star" style="color: #FFD43B;"></i>
                    <i class="fa fa-star" style="color: #FFD43B;"></i>
                    <i class="fa fa-star" style="color: #FFD43B;"></i>
                    <i class="fa fa-star" style="color: #FFD43B; margin-right: 40px;"></i>
                    <button class="button_wishlist" id="{{$data->id}}" onclick="add_wishlist(this.id);">  Yêu Thích</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div style="text-align: center;">
        {{$product->links()}}
    </div>
</div>
@endsection


<script >
  function add_wishlist(clicked_id){
    var id =clicked_id;
    var name =document.getElementById('product_name'+id).value;
    var price =document.getElementById('product_price'+id).value;
    var image =document.getElementById('product_image'+id).src;
    var promotion = document.getElementById('product_promotion'+id).value;
    
    var newItem = {
      'id' :id,
      'name' :name,
      'price' :price,
      'promotion' :promotion,
      'image': image
    };

    
    var old_data =JSON.parse(localStorage.getItem('data')) || [];
    var matches = $.grep(old_data,function(obj){
          return obj.id == id;
    });
    
    if(matches.length){
      alert('Sản phẩm bạn đã yêu thích, nên không thể thêm');
    }else{
      old_data.push(newItem);
      alert('Bạn đã thêm sản phẩm vào danh sách yêu thích');
    }

    
    localStorage.setItem('data',JSON.stringify(old_data));
    
  }
</script>