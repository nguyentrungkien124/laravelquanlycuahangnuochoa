@extends('master.main')
@section('title','đặt hàng ')
@section('main')

<div class="main-content main-content-checkout">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-trail breadcrumbs">
                        <ul class="trail-items breadcrumb">
                            <li class="trail-item trail-begin">
                                <a href="index.html">Home</a>
                            </li>
                            <li class="trail-item trail-end active">
                                Đặt hàng
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <h3 class="custom_blog_title">
                Đặt hàng
            </h3>
            <div class="checkout-wrapp" style="display: flex; flex-wrap: wrap; gap: 20px;">
                <div class="shipping-address-form-wrapp" style="flex: 1; box-sizing: border-box;">
                    <form action="" method="POST">
                        @csrf
                        <div class="shipping-address-form checkout-form" style="display: flex; flex-direction: column;">
                            <div class="row-col row-col-1" style="display: flex; flex-direction: column;">
                                <div class="shipping-address" style="     padding: 15px;
                                border: 1px solid;
                                margin-bottom: 20px;
                            
                                width: 600px;
                            }">
                                    <h3 class="title-form" style="margin-bottom: 20px;">Địa chỉ giao hàng</h3>
                                    <p class="form-row" style="display: flex; flex-direction: column; margin-bottom: 10px;">
                                        <label class="text" style="font-weight: bold; margin-bottom: 5px;">Họ và Tên</label>
                                        <input title="fullname" type="text" name="tenkh" class="input-text" style="padding: 10px; border: 1px solid #ddd; border-radius: 5px; width: 100%;" value="{{ old('tenkh', $auth->tenkh) }}">
                                        @if ($errors->has('tenkh'))
                                            <span class="text-danger" style="color: red;">{{ $errors->first('tenkh') }}</span>
                                        @endif
                                    </p>
                                    <p class="form-row" style="display: flex; flex-direction: column; margin-bottom: 10px;">
                                        <label class="text" style="font-weight: bold; margin-bottom: 5px;">Email</label>
                                        <input title="email" type="text" name="email" class="input-text" style="padding: 10px; border: 1px solid #ddd; border-radius: 5px; width: 100%;" value="{{ old('email', $auth->email) }}">
                                        @if ($errors->has('email'))
                                            <span class="text-danger" style="color: red;">{{ $errors->first('email') }}</span>
                                        @endif
                                    </p>
                                    <p class="form-row" style="display: flex; flex-direction: column; margin-bottom: 10px;">
                                        <label class="text" style="font-weight: bold; margin-bottom: 5px;">Số điện thoại</label>
                                        <input title="sodt" type="text" name="sodt" class="input-text" style="padding: 10px; border: 1px solid #ddd; border-radius: 5px; width: 100%;" value="{{ old('sodt', $auth->sodt) }}">
                                        @if ($errors->has('sodt'))
                                            <span class="text-danger" style="color: red;">{{ $errors->first('sodt') }}</span>
                                        @endif
                                    </p>
                                    <p class="form-row" style="display: flex; flex-direction: column; margin-bottom: 10px;">
                                        <label class="text" style="font-weight: bold; margin-bottom: 5px;">Địa chỉ</label>
                                        <input title="diachi" type="text" name="diachi" class="input-text" style="padding: 10px; border: 1px solid #ddd; border-radius: 5px; width: 100%;" value="{{ old('diachi', $auth->diachi) }}">
                                        @if ($errors->has('diachi'))
                                            <span class="text-danger" style="color: red;">{{ $errors->first('diachi') }}</span>
                                        @endif
                                    </p>
                                </div>
                                <button type="submit" style="padding: 10px 20px; background-color: #ab8e66; color: white; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease;">Thanh toán</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row-col-2 row-col" style="flex: 1; min-width: 300px; box-sizing: border-box;">
                    <div class="your-order" style="background: #f9f9f9; padding: 15px; border: 1px solid #e6e6e6;margin-top: 37px;">
                        <h3 class="title-form" style="margin-bottom: 20px;">Your Order</h3>
                        <?php $totalPrice = 0;?>
                        @foreach($giohangs as $gh)
                            <ul class="list-product-order" style="list-style: none; padding: 0; margin: 0;">
                                <li class="product-item-order" style="display: flex; margin-bottom: 10px;">
                                    <div class="product-thumb" style="width: 100px;">
                                        <a href="#">
                                            <img src="uploads/images/{{$gh->prod->hinhanh}}" alt="img" style="width: 100%; height: auto; border: 1px solid #ddd;">
                                        </a>
                                    </div>
                                    <div class="product-order-inner" style="flex: 1; padding-left: 10px;">
                                        <h5 class="product-name" style="margin: 0 0 5px 0;"><a href="#">{{$gh->prod->tensp}}</a></h5>
                                        <span class="attributes-select attributes-color" style="display: block; margin-bottom: 5px;">Quantity: {{ $gh->soluong }}</span>
                                        <div class="price" style="font-weight: bold; color: #5cb85c;">
                                            ${{number_format($gh->gia)}}
                                            <span class="count" style="margin-left: 5px;">*{{$gh->soluong}}</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <?php $totalPrice += $gh->gia*$gh->soluong;?>
                        @endforeach
                        <div class="order-total" style="font-weight: bold; font-size: 18px; margin-top: 20px;">
                            <span class="title">Total Price:</span>
                            <span class="total-price" style="color: #5cb85c;">${{number_format($totalPrice) }}</span>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
                {{-- <div class="payment-method-wrapp">
                    <div class="payment-method-form checkout-form">
                        <div class="row-col-1 row-col">
                            <div class="payment-method">
                                <h3 class="title-form">
                                    Payment Method
                                </h3>
                                <div class="group-button-payment">
                                    <a href="#" class="button btn-credit-card">Credit Card</a>
                                    <a href="#" class="button btn-paypal">paypal</a>
                                </div>
                                <p class="form-row form-row-card-number">
                                    <label class="text">Card number</label>
                                    <input type="text" class="input-text" placeholder="xxx - xxx - xxx - xxx">
                                </p>
                                <p class="form-row forn-row-col forn-row-col-1">
                                    <label class="text">Month</label>
                                    <select title="month" data-placeholder="01" class="chosen-select" tabindex="1">
                                        <option value="thang01">01</option>
                                        <option value="thang02">02</option>
                                        <option value="thang03">03</option>
                                        <option value="thang04">04</option>
                                        <option value="thang05">05</option>
                                        <option value="thang06">06</option>
                                        <option value="thang07">07</option>
                                        <option value="thang08">08</option>
                                        <option value="thang09">09</option>
                                        <option value="thang10">10</option>
                                        <option value="thang11">11</option>
                                        <option value="thang12">12</option>
                                    </select>
                                </p>
                                <p class="form-row forn-row-col forn-row-col-2">
                                    <label class="text">Year</label>
                                    <select title="Year" data-placeholder="2017" class="chosen-select" tabindex="1">
                                        <option value="nam2010">2010</option>
                                        <option value="nam2011">2011</option>
                                        <option value="nam2012">2012</option>
                                        <option value="nam2013">2013</option>
                                        <option value="nam2014">2014</option>
                                        <option value="nam2015">2015</option>
                                        <option value="nam2016">2016</option>
                                        <option value="nam2017">2017</option>
                                        <option value="nam2018">2018</option>
                                        <option value="nam2020">2020</option>
                                    </select>
                                </p>
                                <p class="form-row forn-row-col forn-row-col-3">
                                    <label class="text">CVV</label>
                                    <select title="CVV" data-placeholder="238" class="chosen-select" tabindex="1">
                                        <option value="cvv1">238</option>
                                        <option value="cvv2">354</option>
                                        <option value="cvv3">681</option>
                                        <option value="cvv4">254</option>
                                        <option value="cvv5">687</option>
                                        <option value="cvv6">123</option>
                                        <option value="cvv7">951</option>
                                        <option value="cvv8">852</option>
                                        <option value="cvv9">753</option>
                                        <option value="vcc10">963</option>
                                    </select>
                                </p>
                            </div>
                        </div>
                        <div class="row-col-2 row-col">
                            <div class="your-order">
                                <h3 class="title-form">
                                    Your Order
                                </h3>
                                <ul class="list-product-order">
                                    <li class="product-item-order">
                                        <div class="product-thumb">
                                            <a href="#">
                                                <img src="assets/images/item-order1.jpg" alt="img">
                                            </a>
                                        </div>
                                        <div class="product-order-inner">
                                            <h5 class="product-name">
                                                <a href="#">3D Dining Chair</a>
                                            </h5>
                                            <span class="attributes-select attributes-color">Black,</span>
                                            <span class="attributes-select attributes-size">XXL</span>
                                            <div class="price">
                                                $45
                                                <span class="count">x1</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item-order">
                                        <div class="product-thumb">
                                            <a href="#">
                                                <img src="assets/images/item-order2.jpg" alt="img">
                                            </a>
                                        </div>
                                        <div class="product-order-inner">
                                            <h5 class="product-name">
                                                <a href="#">3D Dining Chair</a>
                                            </h5>
                                            <span class="attributes-select attributes-color">Black,</span>
                                            <span class="attributes-select attributes-size">XXL</span>
                                            <div class="price">
                                                $45
                                                <span class="count">x1</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="order-total">
                                        <span class="title">
                                            Total Price:
                                        </span>
                                    <span class="total-price">
                                            $95
                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="button-control">
                        <a href="#" class="button btn-back-to-shipping">Back to shipping</a>
                        <a href="#" class="button btn-pay-now">Pay now</a>
                    </div>
                </div>
                <div class="end-checkout-wrapp">
                    <div class="end-checkout checkout-form">
                        <div class="icon">
                        </div>
                        <h3 class="title-checkend">
                            Congratulation! Your order has been processed.
                        </h3>
                        <div class="sub-title">
                            Aenean dui mi, tempus non volutpat eget, molestie a orci.
                            Nullam eget sem et eros laoreet rutrum.
                            Quisque sem ante, feugiat quis lorem in.
                        </div>
                        <a href="#" class="button btn-return">Return to Store</a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    @stop()