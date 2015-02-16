
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>更生黃頁後台管理 登入</title>
	<!-- Bootstrap Core CSS -->
	{{ HTML::style('backend_template_style2/bower_components/bootstrap/dist/css/bootstrap.min.css') }}
	<!-- MetisMenu CSS -->
	{{ HTML::style('backend_template_style2/bower_components/metisMenu/dist/metisMenu.min.css') }}
	<!-- Timeline CSS -->

	<!-- Custom CSS -->
	{{ HTML::style('backend_template_style2/dist/css/sb-admin-2.css') }}
	<!-- Custom Fonts -->
	{{ HTML::style('backend_template_style2/bower_components/font-awesome/css/font-awesome.min.css') }}

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

      </head>

      <body>

      	<div class="container">
      		<div class="row">
      			<div class="col-md-4 col-md-offset-4">
      				<div class="login-panel panel panel-default">
      					<div class="panel-heading">
      						<h3 class="panel-title">{{{ Lang::get('confide::confide.login.submit') }}}</h3>
      					</div>
      					<div class="panel-body">
      						<form role="form" method="POST" action="{{{ URL::to('/users/login') }}}" accept-charset="UTF-8">
      							<input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
      							<fieldset>
      								@if (Session::get('error'))
      								<div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
      								@endif

      								@if (Session::get('notice'))
      								<div class="alert">{{{ Session::get('notice') }}}</div>
      								@endif
      								<div class="form-group">
      									<input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" name="email" type="text"  value="{{{ Input::old('email') }}}" autofocus>
      								</div>
      								<div class="form-group">
      									<input class="form-control" placeholder="{{{ Lang::get('confide::confide.password') }}}" name="password" type="password" value="">
      								</div>

      								<p class="help-block">
      									<a href="{{{ URL::to('/users/forgot_password') }}}">{{{ Lang::get('confide::confide.login.forgot_password') }}}</a>
      								</p>

      								<div class="checkbox">
      									<label>
      										<input  tabindex="4" type="checkbox" name="remember" id="remember" value="1">{{{ Lang::get('confide::confide.login.remember') }}}
      									</label>
      								</div>

      								<button tabindex="3" type="submit" class="btn btn-lg btn-success btn-block">{{{ Lang::get('confide::confide.login.submit') }}}</button>
      							</fieldset>
      						</form>
      					</div>
      				</div>
      			</div>
      		</div>
      	</div>
      	<!-- jQuery -->
      	{{ HTML::script('backend_template_style2/bower_components/jquery/dist/jquery.min.js') }}

      	<!-- Bootstrap Core JavaScript -->
      	{{ HTML::script('backend_template_style2/bower_components/bootstrap/dist/js/bootstrap.min.js') }}
      	<!-- Metis Menu Plugin JavaScript -->
      	{{ HTML::script('backend_template_style2/bower_components/metisMenu/dist/metisMenu.min.js') }}

      	<!-- Custom Theme JavaScript -->
      	{{ HTML::script('backend_template_style2/dist/js/sb-admin-2.js') }}

      </body>

      </html>
