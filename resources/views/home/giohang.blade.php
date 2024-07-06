@extends('master.main')
@section('title','giỏ hàng ')
@section('main')

<div class="site-content">
    <main class="site-main  main-container no-sidebar">
        <div class="container">
            <div class="breadcrumb-trail breadcrumbs">
                <ul class="trail-items breadcrumb">
                    <li class="trail-item trail-begin">
                        <a href="#">
								<span>
									Home
								</span>
                        </a>
                    </li>
                    <li class="trail-item trail-end active">
							<span>
								Shopping Cart
							</span>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="main-content-cart main-content col-sm-12">
                    <h3 class="custom_blog_title">
                        Shopping Cart
                    </h3>
                    <div class="page-main-content">
                        <div class="shoppingcart-content">
                            <form action="https://dreamingtheme.kiendaotac.com/html/stelina/shoppingcart.html" class="cart-form">
                                <table class="shop_table">
                                    <thead>
                                    <tr>
                                        <th class="product-remove"></th>
                                        <th class="product-thumbnail"></th>
                                        <th class="product-name"></th>
                                        <th class="product-price"></th>
                                        <th class="product-quantity"></th>
                                        <th class="product-subtotal"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($giohangs as $gh)
                                    <tr class="cart_item">
                                        <td class="product-remove">
                                            <a href="{{route('giohang.delete',$gh->sanpham_id)}}" onclick="return confirm('bạn có chắc chắn muốn xóa không')" class="remove"></a>
                                        </td>
                                        <td class="product-thumbnail">
                                            <a href="#">
                                                <img src="uploads/images/{{$gh->prod->hinhanh}}" alt="img"
                                                     class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
                                            </a>
                                        </td>
                                        <td class="product-name" data-title="Product">
                                            <a href="#" class="title">{{$gh->prod->tensp}}</a>
                                          
                                        </td>
                                        <td>
                                            <!-- Tạo biểu mẫu với action trỏ đến tuyến đường 'giohang.update' -->
                                            <form action="{{ route('giohang.update', $gh->sanpham_id) }}" method="get">
                                                <!-- Bộ điều khiển số lượng trong biểu mẫu -->
                                                <div class="quantity">
                                                    <div class="control">
                                                        <a class="btn-number qtyminus quantity-minus" href="">-</a>
                                                        <!-- Giữ nguyên class của input số lượng và giá trị từ $gh->soluong -->
                                                        <input type="text" value="{{ $gh->soluong }}" name="soluong" title="Qty"
                                                               class="input-qty qty" size="4">
                                                        <a href="" class="btn-number qtyplus quantity-plus">+</a>
                                                        <button style="font-size: 10px"><i class="fa-solid fa-wrench"></i></button>
                                                    </div>
                                                </div>
                                                <!-- Nút để gửi biểu mẫu -->
                                            </form>
                                        </td>   
                                        
                                        <td class="product-price" data-title="Price">
													<span class="woocommerce-Price-amount amount">
														<span class="woocommerce-Price-currencySymbol">
														</span>
														{{number_format($gh->gia)}}đ
													</span>
                                        </td>
                                    </tr>
                                   @endforeach
                                    
                                </table>
                            </form>
                            <div class="control-cart">
                                <a class="button btn-continue-shopping" href="{{ route('home.index') }}">
                                    Continue Shopping
                                </a>
                                @if($giohangs->count())
                                <a  class="button btn-continue-shopping"href="{{ route('giohang.clear') }}" onclick="return confirm('bạn có chắc chắn muốn xóa không?')">
                                    Xóa hết giỏ hàng
                                </a>
                                
                                <a class="button btn-cart-to-checkout" href="{{ route('dathang.checkout') }}">
                                    Checkout
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

@stop()