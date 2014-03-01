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

    <body class="interface">

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="{{ Request::is('/') ? 'active' : '' }} navbar-brand" href="/">The Panel</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="{{ Request::is('backlog/*')||Request::is('backlog') ? 'active' : '' }}"><a href="/thepanel">@lang('thepanel::backlog.backlog')</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="navbar-right"><a href="/frontpage/logout">@lang('thepanel::backlog.logout')</a></li>
                            <li class="{{ Request::is('bookmarklet') ? 'active' : '' }} navbar-right"><a href="/bookmarklet">@lang('thepanel::backlog.yourbookmarklet')</a></li>
                            <li class="{{ Request::is('user/edit') ? 'active' : '' }}"><a href="/user/edit">@lang('thepanel::backlog.settings')</a></li>
                            <li class="navbar-right {{ Request::is('user/new') ? 'active' : '' }}"><a href="/user/new">@lang('thepanel::backlog.newuser')</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
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
