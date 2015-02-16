
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>更生黃頁後台管理</title>

    <!-- Bootstrap Core CSS -->
    {{ HTML::style('backend_template/css/bootstrap.min.css') }}

    <!-- Custom CSS -->
    {{ HTML::style('backend_template/css/sb-admin.css') }}

    <!-- Morris Charts CSS -->
    {{ HTML::style('backend_template/css/plugins/morris.css') }}

    <!-- Custom Fonts -->
    {{ HTML::style('backend_template/font-awesome/css/font-awesome.min.css') }}

    {{ HTML::style('backend_template/datepicker/css/bootstrap-datepicker.min.css') }}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

	<div id="wrapper">
		@foreach($view as $template)
			@include($template)
		@endforeach
	</div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    {{ HTML::script('backend_template/js/jquery.js') }}
    <!-- Bootstrap Core JavaScript -->
    {{ HTML::script('backend_template/js/bootstrap.min.js') }}
    <!-- Morris Charts JavaScript -->
    {{ HTML::script('backend_template/js/plugins/morris/raphael.min.js') }}
    {{ HTML::script('backend_template/js/plugins/morris/morris.min.js') }}
    {{ HTML::script('backend_template/js/plugins/morris/morris-data.js') }}

    {{ HTML::script('backend_template/datepicker/js/bootstrap-datepicker.min.js') }}
    {{ HTML::script('backend_template/datepicker/locales/bootstrap-datepicker.zh-TW.min.js') }}
    <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
    <script type="text/javascript">
        $('.fileinput').fileinput();
        $('.datepicker').datepicker({
            format: "yyyy-mm-dd",
            todayBtn: "linked",
            language: "zh-TW",
            // orientation: "bottom auto",
            autoclose: true,
            todayHighlight: true
        });
    </script>
    <script src="http://platform.twitter.com/widgets.js"></script>
    <script src="http://jasny.github.io/bootstrap/assets/js/docs.min.js"></script>
</body>

</html>
