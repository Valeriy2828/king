<!DOCTYPE html >

<!--[if IE 6]>
<html id="ie6" class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 7]>
<html id="ie7" class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html id="ie8" class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 9]>
<html id="ie9" class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if gt IE 9]>
<html class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if !IE]>
<html dir="ltr" lang="en-US">
<![endif]-->
<!-- START HEAD -->
<head>

    <meta charset="UTF-8" />
    <!-- this line will appear only if the website is visited with an iPad -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Stephen King' }}</title>

    <!-- [favicon] begin -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('pink/images/faviconsk.ico') }}" />
    <link rel="icon" type="image/x-icon" href="{{ asset('pink/images/faviconsk.ico') }}" />
    <!-- Touch icons more info: http://mathiasbynens.be/notes/touch-icons -->
    <!-- For iPad3 with retina display: -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('pink/apple-touch-icon-144x.png') }}" />
    <!-- For first- and second-generation iPad: -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('pink/apple-touch-icon-114x.png') }}" />
    <!-- For first- and second-generation iPad: -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('pink/apple-touch-icon-72x.png') }}" />
    <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
    <link rel="apple-touch-icon-precomposed" href="{{ asset('pink/apple-touch-icon-57x.png') }}" />
    <!-- [favicon] end -->

    <!-- CSSs -->
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('pink/css/reset.css') }}" /> <!-- RESET STYLESHEET -->
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('pink/style.css') }}" /> <!-- MAIN THEME STYLESHEET -->
    <link rel="stylesheet" id="max-width-1024-css" href="{{ asset('pink/css/max-width-1024.css') }}" type="text/css" media="screen and (max-width: 1240px)" />
    <link rel="stylesheet" id="max-width-768-css" href="{{ asset('pink/css/max-width-768.css') }}" type="text/css" media="screen and (max-width: 987px)" />
    <link rel="stylesheet" id="max-width-480-css" href="{{ asset('pink/css/max-width-480.css') }}" type="text/css" media="screen and (max-width: 480px)" />
    <link rel="stylesheet" id="max-width-320-css" href="{{ asset('pink/css/max-width-320.css') }}" type="text/css" media="screen and (max-width: 320px)" />

    <!-- CSSs Plugin -->
    <link rel="stylesheet" id="thickbox-css" href="{{ asset('pink/css/thickbox.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" id="styles-minified-css" href="{{ asset('pink/css/style-minifield.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" id="buttons" href="{{ asset('pink/css/buttons.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" id="cache-custom-css" href="{{ asset('pink/css/cache-custom.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" id="custom-css" href="{{ asset('pink/css/custom.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- FONTs -->
    <link rel="stylesheet" id="google-fonts-css" href="http://fonts.googleapis.com/css?family=Oswald%7CDroid+Sans%7CPlayfair+Display%7COpen+Sans+Condensed%3A300%7CRokkitt%7CShadows+Into+Light%7CAbel%7CDamion%7CMontez&amp;ver=3.4.2" type="text/css" media="all" />
    <link rel='stylesheet' href='{{ asset('pink/css/font-awesome.css') }}' type='text/css' media='all' />

    <!-- JAVASCRIPTs -->
    <script type="text/javascript" src="{{ asset('pink/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('pink/js/comment-reply.js') }}"></script>
    <script type="text/javascript" src="{{ asset('pink/js/jquery.quicksand.js') }}"></script>
    <script type="text/javascript" src="{{ asset('pink/js/jquery.tipsy.js') }}"></script>
    <script type="text/javascript" src="{{ asset('pink/js/jquery.prettyPhoto.js') }}"></script>
    <script type="text/javascript" src="{{ asset('pink/js/jquery.cycle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('pink/js/jquery.anythingslider.js') }}"></script>
    <script type="text/javascript" src="{{ asset('pink/js/jquery.eislideshow.js') }}"></script>
    <script type="text/javascript" src="{{ asset('pink/js/jquery.easing.js') }}"></script>
    <script type="text/javascript" src="{{ asset('pink/js/jquery.flexslider-min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('pink/js/jquery.aw-showcase.js') }}"></script>
    <script type="text/javascript" src="{{ asset('pink/js/layerslider.kreaturamedia.jquery-min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('pink/js/shortcodes.js') }}"></script>
    <script type="text/javascript" src="{{ asset('pink/js/jquery.colorbox-min.js') }}"></script> <!-- nav -->
    <script type="text/javascript" src="{{ asset('pink/js/jquery.tweetable.js') }}"></script>

    <script type="text/javascript" src="{{ asset('pink/js/myscripts.js') }}"></script>

</head>
<!-- END HEAD -->

<!-- START BODY -->
<body class="no_js responsive {{ (Route::currentRouteName() == 'home') || (Route::currentRouteName() == 'portfolios.index') || (Route::currentRouteName() == 'portfolios.show')? 'page-template-home-php' : ''}} stretched">

<!-- START BG SHADOW -->
<div class="bg-shadow">

    <!-- START WRAPPER -->
    <div id="wrapper" class="group">

        <!-- START HEADER -->
        <div id="header" class="group">

            <div class="group inner">

                <!-- START LOGO -->
                <div id="logo" class="group">
                    <a href="{{ route('home') }}" title="Pink Rio"><img src="{{ asset('pink/images/logoK.jpg') }}" title="{{ __('messages.Stephen King') }}" alt="{{ __('messages.Stephen King') }}" /></a>
                </div>
                <!-- END LOGO -->

                <div id="sidebar-header" class="group" >
                    {{--{{dd(auth()->user()->isAdmin())}}--}}
                    <div class="user-log">
                        @if(!auth()->user())
                            @if(Route::currentRouteName() != 'register')
                                <a href="/register">{{ __('messages.Registration') }}<span style="padding: 0px 15px;">&nbsp;</span></a>
                            @endif
                            @if(Route::currentRouteName() != 'login')
                                <a href="/login"> {{ __('messages.Login') }}</a>
                            @endif
                        {{--<a href="{{url("/login/google")}}"> Google</a>--}}
                        @else
                            <a><span id="user-name" data-hover="{{ $user->name  }}">{{ $user->name  }}</span><span style="padding: 0px 5px;">&nbsp;</span></a>
                            <a class="active" href="/logout"><span data-hover="Выход">{{ __('messages.SignOut') }}</span></a>
                        @endif
                    </div>
                    <div class="navbar-loc ">
                            <a class="nav-link" href="{{ route('locale', ['locale' => 'en']) }}"><span>{{ __('messages.EN') }}</span><span style="padding: 0px 5px;">&nbsp;</span></a>
                            <a class="nav-link" href="{{ route('locale', ['locale' => 'ru']) }}"><span>{{ __('messages.RU') }}</span></a>
                    </div>
                </div>
                <div class="clearer"></div>

                <hr />

                <!-- START MAIN NAVIGATION -->
                    @yield('navigation')
                <!-- END MAIN NAVIGATION -->
                <div id="header-shadow"></div>
                <div id="menu-shadow"></div>
            </div>

        </div>
        <!-- END HEADER -->

        <!-- START SLIDER -->
            @yield('slider')

        <div class="wrap_result"></div>
        <!-- END SLIDER -->
        @if(Route::currentRouteName() == 'portfolios.index')
            <div id="page-meta">
                <div class="inner group">
                    <h3>{{ __('messages.The best movies of the king of horrors') }}</h3>
                    <h4>...  {{ __('messages.will be scary, but you will like it') }}</h4>
                </div>
            </div>
        @endif

        @if(Route::currentRouteName() == 'biography')
            <div id="page-meta">
                <div class="inner group">
                    <h3>{{ __('messages.Stephen King') }}</h3>
                    <h4>{{ __('messages.If you are alone, this does not mean that you are crazy') }}</h4>
                </div>
            </div>
        @endif

        <!-- START PRIMARY -->
        <div id="primary" class="sidebar-{{ isset($bar) ? $bar : 'no' }}">
            <div class="inner group">
                <!-- START CONTENT -->
                    @yield('content')
                <!-- END CONTENT -->
                <!-- START SIDEBAR -->
                    @yield('bar')
                <!-- END SIDEBAR -->
                <!-- START EXTRA CONTENT -->
                <!-- END EXTRA CONTENT -->
            </div>
        </div>
        <!-- END PRIMARY -->

        <!-- START COPYRIGHT -->
            @yield('footer')
        <!-- END COPYRIGHT -->
    </div>
    <!-- END WRAPPER -->
</div>
<!-- END BG SHADOW -->

<script type="text/javascript" src="{{ asset('pink/js/jquery.custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('pink/js/contact.js') }}"></script>
<script type="text/javascript" src="{{ asset('pink/js/jquery.mobilemenu.js') }}"></script>

</body>
<!-- END BODY -->
</html>
