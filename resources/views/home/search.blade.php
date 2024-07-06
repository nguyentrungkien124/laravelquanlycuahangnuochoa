@extends('master.main')
@section('title','tìm kiếm ')
@section('main')
<div >
    <h1 style="text-align: center;color: #ab8e66;">Kết quả tìm kiếm cho từ khóa "{{ $keyword }}" là
</div>
<ul style="margin-left: -11px; margin-top: 25px;" class="row list-products auto-clear equal-container product-grid">
    @foreach($sanphams as $search)
    <li class="product-item  col-lg-3 col-md-3 col-sm-6 col-xs-6 col-ts-12 style-1">
        <div class="product-inner equal-element">
            <div class="product-top">
                <div class="flash">
                    <span class="onnew">
                        <span class="text">
                            new
                        </span>
                    </span>
                </div>
            </div>
            <div class="product-thumb">
                <div class="thumb-inner">
                    <a href="{{route('home.sanpham',$search->id)}}">
                        <img src="uploads/images/{{$search->hinhanh}}" alt="img">
                    </a>
                    <div class="thumb-group">
                        <div class="yith-wcwl-add-to-wishlist">
                            <div class="yith-wcwl-add-button">
                                <a href="#">Add to Wishlist</a>
                            </div>
                        </div>
                        <a href="#" class="button quick-wiew-button">Quick View</a>
                        <div class="loop-form-add-to-cart">
                            <button class="single_add_to_cart_button button">Add to cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-info">
                <h5 class="product-name product_title">
                    <a href="{{route('home.sanpham',$search->id,)}}">{{$search->tensp}}</a>
                </h5>
                <div class="group-info">
                    <div class="stars-rating">
                        <div class="star-rating">
                            <span class="star-3"></span>
                        </div>
                        <div class="count-star">
                            (3)
                        </div>
                    </div>
                    <div class="price">
                        <del>
                            {{number_format($search->gia)}}đ
                        </del>
                        <ins>
                            {{number_format($search->giakm)}}đ
                        </ins>
                    </div>
                    <div class="count-product">
                        Quantity: <span>{{ $search->soluong }}</span>
                    </div>

                </div>
            </div>
        </div>
    </li>
    @endforeach
</ul>

@stop()