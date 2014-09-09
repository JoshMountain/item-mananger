<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>Item Manager - ManageItems.com</title>

        <meta name="description" content="Item Manager is web application built to manage a list of items and assign a status to each item">
        <meta name="author" content="Josh Mountain">

        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="{{ URL::to('img/favicon.ico') }}">
        <link rel="apple-touch-icon" href="{{ URL::to('img/icon57.png') }}" sizes="57x57">
        <link rel="apple-touch-icon" href="{{ URL::to('img/icon72.png') }}" sizes="72x72">
        <link rel="apple-touch-icon" href="{{ URL::to('img/icon76.png') }}" sizes="76x76">
        <link rel="apple-touch-icon" href="{{ URL::to('img/icon114.png') }}" sizes="114x114">
        <link rel="apple-touch-icon" href="{{ URL::to('img/icon120.png') }}" sizes="120x120">
        <link rel="apple-touch-icon" href="{{ URL::to('img/icon144.png') }}" sizes="144x144">
        <link rel="apple-touch-icon" href="{{ URL::to('img/icon152.png') }}" sizes="152x152">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="{{ URL::to('css/bootstrap.min.css') }}">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="{{ URL::to('css/plugins.css') }}">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="{{ URL::to('css/main.css') }}">

        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="{{ URL::to('css/themes.css') }}">
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) -->
        <script src="{{ URL::to('js/vendor/modernizr-2.8.3.js') }}"></script>
    </head>
    <body>
        <!-- Page Wrapper -->
        <!-- In the PHP version you can set the following options from inc/config file -->
        <!--
            Available classes:

            'page-loading'      enables page preloader
        -->
        <div id="page-wrapper" class="page-loading">
            <!-- Preloader -->
            <!-- Preloader functionality (initialized in js/app.js) - pageLoading() -->
            <!-- Used only if page preloader enabled from inc/config (PHP version) or the class 'page-loading' is added in body element (HTML version) -->
            <div class="preloader">
                <div class="inner">
                    <!-- Animation spinner for all modern browsers -->
                    <div class="preloader-spinner themed-background hidden-lt-ie10"></div>

                    <!-- Text for IE9 -->
                    <h3 class="text-primary visible-lt-ie10"><strong>Loading..</strong></h3>
                </div>
            </div>
            <!-- END Preloader -->

            <!-- Page Container -->
            <!-- In the PHP version you can set the following options from inc/config file -->
            <!--
                Available #page-container classes:

                'sidebar-visible-lg-mini'                       main sidebar condensed - Mini Navigation (> 991px)
                'sidebar-visible-lg-full'                       main sidebar full - Full Navigation (> 991px)

                'sidebar-alt-visible-lg'                        alternative sidebar visible by default (> 991px) (You can add it along with another class)

                'header-fixed-top'                              has to be added only if the class 'navbar-fixed-top' was added on header.navbar
                'header-fixed-bottom'                           has to be added only if the class 'navbar-fixed-bottom' was added on header.navbar
            -->
            <div id="page-container" class="header-fixed-top sidebar-visible-lg-full">

                @include('layout.sidebar')

                <!-- Main Container -->
                <div id="main-container">
                    <!-- Header -->
                    <!-- In the PHP version you can set the following options from inc/config file -->
                    <!--
                        Available header.navbar classes:

                        'navbar-default'            for the default light header
                        'navbar-inverse'            for an alternative dark header

                        'navbar-fixed-top'          for a top fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar())
                            'header-fixed-top'      has to be added on #page-container only if the class 'navbar-fixed-top' was added

                        'navbar-fixed-bottom'       for a bottom fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar()))
                            'header-fixed-bottom'   has to be added on #page-container only if the class 'navbar-fixed-bottom' was added
                    -->
                    <header class="navbar navbar-default navbar-fixed-top">
                        <!-- Left Header Navigation -->
                        <ul class="nav navbar-nav-custom">
                            <!-- Main Sidebar Toggle Button -->
                            <li>
                                <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');">
                                    <i class="fa fa-ellipsis-v fa-fw animation-fadeInRight" id="sidebar-toggle-mini"></i>
                                    <i class="fa fa-bars fa-fw animation-fadeInRight" id="sidebar-toggle-full"></i>
                                </a>
                            </li>
                            <!-- END Main Sidebar Toggle Button -->
                        </ul>
                        <!-- END Left Header Navigation -->

                        @if( Auth::check() )
                        <!-- Right Header Navigation -->
                        <ul class="nav navbar-nav-custom pull-right">
                            <!-- Search Form -->
                            <li>
                                <form action="page_ready_search_results.html" method="post" class="navbar-form-custom" role="search">
                                    <input type="text" id="top-search" name="top-search" class="form-control" placeholder="Search..">
                                </form>
                            </li>
                            <!-- END Search Form -->

                            <!-- User Dropdown -->
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="http://www.gravatar.com/avatar/{{ md5( strtolower( trim( Auth::user()->email ) ) ) }}?d=http%3A%2F%2Fmanageitems.com%2Fimg%2Favatar.png" alt="avatar">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-header">
                                        <strong>{{ Auth::user()->username }}</strong>
                                    </li>
                                    <li>
                                        <a href="{{ URL::route('account-change-password') }}">
                                            <i class="gi gi-lock fa-fw pull-right"></i>
                                            Change Password
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::route('account-sign-out') }}">
                                            <i class="fa fa-power-off fa-fw pull-right"></i>
                                            Sign Out
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END User Dropdown -->
                        </ul>
                        <!-- END Right Header Navigation -->
                        @endif
                    </header>
                    <!-- END Header -->

                    <!-- Page content -->
                    <div id="page-content">

                        @if(Session::has('global'))
                            <div class="row">
                                <div class="col-lg-6">
                                    {{ Session::get('global') }}
                                </div>
                            </div>
                        @endif

                        @yield('content')

                    </div>
                    <!-- END Page Content -->
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
        </div>
        <!-- END Page Wrapper -->

        <!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>!window.jQuery && document.write(decodeURI('%3Cscript src="js/vendor/jquery-2.1.1.min.js"%3E%3C/script%3E'));</script>

        <!-- Bootstrap.js, Jquery plugins and Custom JS code -->
        <script src="{{ URL::to('js/vendor/bootstrap.min.js') }}"></script>
        <script src="{{ URL::to('js/plugins.js') }}"></script>
        <script src="{{ URL::to('js/app.js') }}"></script>

        @if ( URL::route('item-list') === URL::current() )
            <!-- Load and execute javascript code used only in this page -->
            <script src="{{ URL::to('js/pages/uiTables.js') }}"></script>
            <script>
            $(function(){
                /* Initialize Bootstrap Datatables Integration */
                App.datatables();

                /* Initialize Datatables */
                $('#general-table').dataTable();

                /* Add placeholder attribute to the search input */
                $('.dataTables_filter input').attr('placeholder', 'Search');
            });
            </script>
        @endif
    </body>
</html>