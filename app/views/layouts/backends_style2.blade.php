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
    {{ HTML::style('backend_template/bower_components/bootstrap/dist/css/bootstrap.min.css') }}
    <!-- MetisMenu CSS -->
    {{ HTML::style('backend_template/bower_components/metisMenu/dist/metisMenu.min.css') }}
    <!-- Timeline CSS -->

    <!-- Custom CSS -->
    {{ HTML::style('backend_template/dist/css/sb-admin-2.css') }}
    <!-- Morris Charts CSS -->
    {{ HTML::style('backend_template/bower_components/morrisjs/morris.css') }}
    <!-- Custom Fonts -->
    {{ HTML::style('backend_template/bower_components/font-awesome/css/font-awesome.min.css') }}

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
    {{ HTML::script('backend_template/bower_components/jquery/dist/jquery.min.js') }}

    <!-- Bootstrap Core JavaScript -->
    {{ HTML::script('backend_template/bower_components/bootstrap/dist/js/bootstrap.min.js') }}
    <!-- Metis Menu Plugin JavaScript -->
    {{ HTML::script('backend_template/bower_components/metisMenu/dist/metisMenu.min.js') }}
    <!-- Morris Charts JavaScript -->
    {{ HTML::script('backend_template/bower_components/raphael/raphael-min.js') }}
    {{ HTML::script('backend_template/bower_components/morrisjs/morris.min.js') }}
    {{ HTML::script('backend_template/js/morris-data.js') }}

    <!-- Custom Theme JavaScript -->
    {{ HTML::script('backend_template/dist/js/sb-admin-2.js') }}
    <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
    <script type="text/javascript">
        $('.fileinput').fileinput();
    </script>
    <script src="http://platform.twitter.com/widgets.js"></script>
    <script src="http://jasny.github.io/bootstrap/assets/js/docs.min.js"></script>


</body>

</html>
