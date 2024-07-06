@extends('master.main')
@section('title','Yêu thích')
@section('main')
{{-- <table class="table table-hover">
    <thead>
        <tr>
            <th>Stt</th>
            <th>Tên sản phẩm </th>
            <th>Hình ảnh</th>
            <th>Giá KM</th>
            <th>Ngày </th>
        </tr>
    </thead>

    <tbody>
        
        @foreach($favorites as $yeuthich)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$yeuthich->sanpham_id}}</td>
            <td>49823198</td>
            <td>2</td>
            <td>{{$yeuthich->created_at->format('d/m/Y')}}</td>
           
        </tr>
        @endforeach
    </tbody> --}}
    <div class="tab-container">
        <div id="bestseller" class="tab-panel active">
            <div class="stelina-product">
                <ul class="row list-products auto-clear equal-container product-grid">
                    @foreach ($favorites as $yeuthich)
                    <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                        <div class="product-inner equal-element">
                            <div class="product-top">
                                <div class="flash">
                                        <span class="onnew">
                                            <span class="text">
                                                yêu thích
                                            </span>
                                        </span>
                                </div>
                            </div>
                            <div class="product-thumb">
                                <div class="thumb-inner">
                                    <a href="#">
                                        <img src="uploads/images/{{$yeuthich->prod->hinhanh}}" alt="img">
                                    </a>
                                   
                                    <div class="thumb-group">
                                        <div class="yith-wcwl-add-to-wishlist">
                                            
                                            <div class="yith-wcwl-add-button">
                                                <a title="Bỏ thích " onclick="return confirm('Bạn muốn bỏ thích không')" href="{{route('home.favorite', $yeuthich->sanpham_id)}}" class="heart-icon" style="color:red;">
                                                    <i class="fa-regular fa-heart"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info">
                                <h5 class="product-name product_title">
                                    <a href="#">{{$yeuthich->prod->tensp}}</a>
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
                                            <del>{{ number_format($yeuthich->prod->gia)}}đ</del>
                                        </del>
                                        <ins>
                                            {{number_format($yeuthich->prod->giakm)}}đ
                                            
                                        </ins>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
@stop()