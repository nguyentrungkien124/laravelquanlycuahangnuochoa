@extends('master.main')
@section('chi tiết')
@section('main')
<style>

.image-preview-container {
    position: relative;
    overflow: hidden;
}

.preview-image {
    display: block;
    width: 100%;
    height: auto;
}



</style>
<div class="main-content main-content-details single no-sidebar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="trail-item">
                            <a href="#">Accents</a>
                        </li>
                        <li class="trail-item trail-end active">
                            {{$sanpham->tensp}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="content-area content-details full-width col-lg-9 col-md-8 col-sm-12 col-xs-12">
                <div class="site-main">
                    <div class="details-product">
                        <div class="details-thumd">
                            <div class="image-preview-container image-thick-box image_preview_container">
                                <img  class="preview-image" src="uploads/images/{{$sanpham->hinhanh}}" alt="img">
                                <a href="#" class="btn-zoom open_qv"><i class="fa fa-search" aria-hidden="true"></i></a>
                            </div>
                           
                        </div>
                    </div>

                </div>
                <div class="details-infor">
                    <h1 class="product-title">
                        {{$sanpham->tensp}}
                    </h1>
                    <div class="stars-rating">
                        <div class="star-rating">
                            <span class="star-5"></span>
                        </div>
                        <div class="count-star">
                            (7)
                        </div>
                    </div>
                    <div class="availability">
                        Số lượng:
                        <a href="#">{{$sanpham->soluong}}</a>
                    </div>
                    <div class="price">
                        <span>{{number_format($sanpham->giakm)}}đ</span>
                    </div>
                    <div class="product-details-description">
                        <ul>
                            <li>Tên hãng:{{$sanpham->tenhang}}</li>
                        </ul>
                    </div>
                    <div class="variations">
                        <div class="attribute attribute_color">
                            <div class="color-text text-attribute">
                                Color:
                            </div>
                            <div class="list-color list-item">
                                <a href="#" class="color1"></a>
                                <a href="#" class="color2"></a>
                                <a href="#" class="color3 active"></a>
                                <a href="#" class="color4"></a>
                            </div>
                        </div>
                     
                    </div>
                    <div class="group-button">
                        <div class="yith-wcwl-add-to-wishlist">
                            <div class="yith-wcwl-add-button">
                                @if (auth('cus')->check())
                                @if ($sanpham->favorited)
                                    <a title="Bỏ thích"
                                        onclick="return confirm('Bạn muốn bỏ thích không')"
                                        href="{{ route('home.favorite', $sanpham->id) }}"
                                        class="heart-icon" style="color:red;">
                                        <i class="fa-regular fa-heart"></i>
                                        <span>Bỏ thích</span>
                                    </a>
                                @else
                                    <a title="Yêu thích"
                                        href="{{ route('home.favorite', $sanpham->id) }}"
                                        class="heart-icon" style="color:black;">
                                        <i class="fa-solid fa-heart"></i>
                                        <span>Yêu thích</span>
                                    </a>
                                @endif
                        
                            @endif
                            </div>
                        </div>
                        <div class="size-chart-wrapp">
                            <div class="btn-size-chart">
                                <a id="size_chart" href="uploads/images/size-chart.jpg" class="fancybox">View
                                    Size Chart</a>
                            </div>
                        </div>
                        <div class="quantity-add-to-cart">
                            <div class="quantity">
                                <div class="control">
                                    <a class="btn-number qtyminus quantity-minus" href="#">-</a>
                                    <input type="text" data-step="1" data-min="0" value="1" title="Qty" class="input-qty qty" size="4">
                                    <a href="#" class="btn-number qtyplus quantity-plus">+</a>
                                </div>
                            </div>
                            <form action="{{ route('giohang.add', $sanpham->id) }}" >
                                <!-- Điều này là cần thiết để ngăn chặn CSRF -->
                                @csrf
                                <!-- Trường ẩn để thêm số lượng sản phẩm -->
                                <input type="hidden" name="soluong" value="1">
                                <!-- Nút để thêm vào giỏ hàng -->
                                <button type="submit" class="single_add_to_cart_button button" style="    margin-top: -73px;
                                margin-left: 96px;">Add to cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-details-product">
                <ul class="tab-link">
                    <li class="active">
                        <a data-toggle="tab" aria-expanded="true" href="#product-descriptions">Mô tả sản phẩm </a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" aria-expanded="true" href="#reviews">Đánh giá</a>
                    </li>
                </ul>
                <div class="tab-container">
                    <div id="product-descriptions" class="tab-panel active">
                        <p>
                            {{$sanpham->mota}}
                        </p>
                    </div>
                    <div id="reviews" class="tab-panel">
                        <div class="reviews-tab">
                            <div class="comments">
                                <h2 class="reviews-title">
                                    1 review for
                                    <span>Glorious Eau</span>
                                </h2>
                                <ol class="commentlist">
                                    <li class="conment">
                                        <div class="conment-container">
                                            <a href="#" class="avatar">
                                                <img src="uploads/images/avartar.png" alt="img">
                                            </a>
                                            <div class="comment-text">
                                                <div class="stars-rating">
                                                    <div class="star-rating">
                                                        <span class="star-5"></span>
                                                    </div>
                                                    <div class="count-star">
                                                        (1)
                                                    </div>
                                                </div>
                                                <p class="meta">
                                                    <strong class="author">Cobus Bester</strong>
                                                    <span>-</span>
                                                    <span class="time">June 7, 2013</span>
                                                </p>
                                                <div class="description">
                                                    <p>Simple and effective design. One of my favorites.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                            <div class="review_form_wrapper">
                                <div class="review_form">
                                    <div class="comment-respond">
                                        <span class="comment-reply-title">Add a review </span>
                                        <form class="comment-form-review">
                                            <p class="comment-notes">
                                                <span class="email-notes">Your email address will not be published.</span>
                                                Required fields are marked
                                                <span class="required">*</span>
                                            </p>
                                            <div class="comment-form-rating">
                                                <label>Your rating</label>
                                                <p class="stars">
                                                    <span>
                                                        <a class="star-1" href="#"></a>
                                                        <a class="star-2" href="#"></a>
                                                        <a class="star-3" href="#"></a>
                                                        <a class="star-4" href="#"></a>
                                                        <a class="star-5" href="#"></a>
                                                    </span>
                                                </p>
                                            </div>
                                            <p class="comment-form-comment">
                                                <label>
                                                    Your review
                                                    <span class="required">*</span>
                                                </label>
                                                <textarea title="review" id="comment" name="comment" cols="45" rows="8"></textarea>
                                            </p>
                                            <p class="comment-form-author">
                                                <label>
                                                    Name
                                                    <span class="">*</span>
                                                </label>
                                                <input title="author" id="author" name="author" type="text" value="">
                                            </p>
                                            <p class="comment-form-email">
                                                <label>
                                                    Email
                                                    <span class="">*</span>
                                                </label>
                                                <input title="email" id="email" name="email" type="email" value="">
                                            </p>
                                            <p class="form-submit">
                                                <input name="submit" type="submit" id="submit" class="submit" value="Submit">
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="clear: left;"></div>
            <div class="related products product-grid">
                <h2 class="product-grid-title">Sản phẩm liên quan</h2>
                <div class="owl-products owl-slick equal-container nav-center" data-slick='{"autoplay":false, "autoplaySpeed":1000, "arrows":true, "dots":false, "infinite":true, "speed":800, "rows":1}' data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":3}},{"breakpoint":"1200","settings":{"slidesToShow":2}},{"breakpoint":"992","settings":{"slidesToShow":2}},{"breakpoint":"480","settings":{"slidesToShow":1}}]'>
                    @foreach ($randomsp as $rdsp)
                    <div class="product-item style-1">
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
                                    <a href="#">
                                        <img src="uploads/images/{{$rdsp->hinhanh}}" alt="img">
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
                                    <a href="{{route('home.sanpham',$rdsp->id)}}">{{$rdsp->tensp}}</a>
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
                                            {{number_format($rdsp->gia)}}đ
                                        </del>
                                        <ins>
                                            {{number_format($rdsp->giakm)}}đ
                                        </ins>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

@stop()