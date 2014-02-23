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
        <link rel="stylesheet" href="/packages/hidiyo/thepanel/style/frontpage.css?v=3" type="text/css" media="screen" title="no title" charset="utf-8">

    </head>

    <body>

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <a class="{{ Request::is('/') ? 'active' : '' }} brandname" href="/"><strong>The Panel</strong></a> &nbsp;&nbsp;&nbsp; <a href="/frontpage/about">About</a>
            </div>
        </nav>

        <div id="content" class="container">
            @include('thepanel::snippits.messages')
            @yield('content')
        </div> <!-- /container -->

        <script src="//code.jquery.com/jquery-2.1.0.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    </body>
</html>