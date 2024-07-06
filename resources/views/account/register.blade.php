@extends('master.main')
@section('title','đăng kí')
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
                                        <h5 class="title-login">Register now</h5>
                                        <p class="form-row form-row-wide">
                                            <label class="text">Your email</label>
                                            <input  name="email" type="email" class="input-text">
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label class="text">Username</label>
                                            <input  name="tenkh" type="text" class="input-text">
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label class="text">Address</label>
                                            <input  name="diachi" type="text" class="input-text">
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label class="text">Number phone</label>
                                            <input  name="sodt" type="text" class="input-text">
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label class="text">Password</label>
                                            <input name="password" type="text" class="input-text">
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label class="text">Confirm password</label>
                                            <input name="confirm_password" type="text" class="input-text">
                                        </p>
                                        
                                        <p class="form-row">
                                            <span class="inline">
                                                <input type="checkbox" id="cb2">
                                                <label for="cb2" class="label-text">I agree to <span>Terms & Conditions</span></label>
                                            </span>
                                        </p>
                                        <p class="">
                                            <input type="submit" class="button-submit" value="Register Now">
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
