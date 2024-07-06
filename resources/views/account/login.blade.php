@extends('master.main')
@section('title','đăng nhập')
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
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="login-item">
									<h5 class="title-login">Login your Account</h5>
									<form class="login" method="POST">
										@csrf
										<div class="social-account">
											<h6 class="title-social">Login with social account</h6>
											<a href="#" class="mxh-item facebook">
												<i class="fa-brands fa-facebook"></i>
												<span class="text">FACEBOOK</span>
											</a>
											<a href="#" class="mxh-item twitter">
												<i class="fa-brands fa-twitter" aria-hidden="true"></i>
												<span class="text">TWITTER</span>
											</a>
										</div>
										<p class="form-row form-row-wide">
											<label class="text">Email</label>
											<input title="username" name="email" type="text" class="input-text">
										</p>
										<p class="form-row form-row-wide">
											<label class="text">Password</label>
											<input title="password" name="password" type="text" class="input-text">
										</p>
										<p class="lost_password">
											<span class="inline">
												<input type="checkbox" id="cb1">
												<label for="cb1" class="label-text">Remember me</label>
											</span>
											<a href="#" class="forgot-pw">Forgot password?</a>
										</p>
										<p class="form-row">
											<input type="submit" class="button-submit" value="login">
										</p>
									</form>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@stop()