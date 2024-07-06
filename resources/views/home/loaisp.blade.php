@extends('master.main')
@section('title',$cat->tenlsp)
@section('main')
<div class="main-content main-content-product no-sidebar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="{{route('home.index')}}">Home</a>
                        </li>
                        <li class="trail-item trail-end active">
                            {{$cat->tenlsp}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="content-area shop-grid-content full-width col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="site-main">
                    <h3 class="custom_blog_title">
                        {{$cat->tenlsp}}
                    </h3>
                    <div class="shop-top-control">
                        <form class="select-item select-form">
                            <span class="title">Sort</span>
                            <select title="sort" data-placeholder="9 Products/Page" class="chosen-select">
                                <option value="2">9 Products/Page</option>
                                <option value="1">12 Products/Page</option>
                                <option value="3">10 Products/Page</option>
                                <option value="4">8 Products/Page</option>
                                <option value="5">6 Products/Page</option>
                            </select>
                        </form>

                        <form class="filter-choice select-form">
                            <span class="title" id="">Sort by</span>
                            <select title="sort-by" data-placeholder="Price: Low to High" class="chosen-select" onchange="location = this.value;">
                                <option value="">All Prices</option>
                                <option value="">Under $100</option>
                                <option value="">Under $200</option>
                                <option value="">Under $300</option>
                                <!-- Thêm các option khác tùy theo phân khúc giá của bạn -->
                            </select>
                        </form>

                        <div class="grid-view-mode">
                            <div class="inner">
                                <a href="listproducts.html" class="modes-mode mode-list">
                                    <span></span>
                                    <span></span>
                                </a>
                                <a href="gridproducts.html" class="modes-mode mode-grid  active">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <ul class="row list-products auto-clear equal-container product-grid">
                        @foreach($sanpham as $lsp)
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
                                        <a href="{{route('home.sanpham',$lsp->id)}}">
                                            <img src="uploads/images/{{$lsp->hinhanh}}" alt="img">
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
                                        <a href="{{route('home.sanpham',$lsp->id,)}}">{{$lsp->tensp}}</a>
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
                                                {{number_format($lsp->gia)}}đ
                                            </del>
                                            <ins>
                                                {{number_format($lsp->giakm)}}đ
                                            </ins>
                                        </div>
                                        <div class="count-product">
                                            Số lượng: <span>{{ $lsp->soluong }}</span>
                                            Đã bán: <span>{{ $lsp->total_sold }}</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="pagination clearfix style2" >
                        <div style="margin-left: 527px;"> 
                        {{ $sanpham->links('pagination::bootstrap-4') }}
                        </div>
                      
                    </div>


                </div>
            </div>

        </div>
    </div>
</div>
@stop()