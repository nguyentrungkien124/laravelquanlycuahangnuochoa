@extends('master.main')
@section('title','thông tin')
@section('main')


<div class="main-content main-content-login">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="trail-item trail-end active">
                            Authentication
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="content-area col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="site-main">
                    <h3 class="custom_blog_title">
                        Authentication
                    </h3>
                    <div class="customer_login">
                        <form action="" method="POST" class="register" id="register-form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 offset-lg-3 col-md-6 col-sm-12">
                                    <div class="login-item">
                                        <h5 class="title-login">Profile </h5>
                                        <p class="form-row form-row-wide">
                                            <label class="text">Your email</label>
                                            <input  name="email" value="{{$auth->email}}" type="email" class="input-text">
                                            @error('email')
                                                <div class="help-block">{{$message}}</div>
                                            @enderror
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label class="text">Username</label>
                                            <input  name="tenkh" value="{{$auth->tenkh}}" type="text" class="input-text">
                                            @error('tenkh')
                                                <div class="help-block">{{$message}}</div>
                                            @enderror
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label class="text">Address</label>
                                            <input  name="diachi" value="{{$auth->diachi}}" type="text" class="input-text">
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label class="text">Number phone</label>
                                            <input  name="sodt" value="{{$auth->sodt}}" type="text" class="input-text">
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label class="text">Nhập lại password</label>
                                            <input name="password"  type="text" class="input-text">
                                            @error('password')
                                                <div class="help-block">{{$message}}</div>
                                            @enderror
                                        </p>
                                      
                                        
                                       
                                        <p class="">
                                            <input type="submit" class="button-submit" value="Update profile">

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop()
