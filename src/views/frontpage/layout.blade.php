<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>@yield('title')</title>

        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
        
        <link rel="stylesheet" href="/packages/hidiyo/thepanel/style/thepanel.css?v=3" type="text/css" media="screen" title="no title" charset="utf-8">

    </head>

    <body>
        <div id="content" class="container">
            @if (Session::has('status'))
                <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('status') }}
                </div>
            @endif

            @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('error'); }}
                </div>
            @endif
        
            @yield('content')
        </div> <!-- /container -->

        <script src="//code.jquery.com/jquery-2.1.0.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    </body>
</html>