<!DOCTYPE html>
<html>
<head>
    <title>{{(isset($sTitle))?$sTitle:Config::get('home.title')}}</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="robots" content="index,follow">
    <meta property="fb:app_id" content="753308934688020"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <!-- Bootstrap -->
    {{HTML::style('src/bootstrap/css/bootstrap.min.css')}}
    {{HTML::style('src/bootstrap/css/bootstrap-responsive.min.css')}}
    {{HTML::style('src/bootstrap/css/bootstrap-theme.min.css')}}
    {{HTML::style('src/bootstrap/css/datepicker.css')}}
    {{HTML::style('src/'.Config::get('home.theme').'/style.css')}}
    @yield('morestyle')
</head>
    <body>
    <div class="supercontainer">
    <div class=" body">
        @if(Session::has('message'))
        <div class="bg-danger text-center">{{Session::get('message')}}</div>
        @endif
        @yield('body')
    </div>
        <div class="clearfix"></div>
    @include(Config::get('home.theme').'/layout/footer')
    </div>
    </body>
    </html>
<script src="http://code.jquery.com/jquery.js"></script>
{{HTML::script('src/bootstrap/js/bootstrap.min.js')}}
{{HTML::script('src/bootstrap/js/bootstrap-datepicker.js')}}
@yield('jscript')
        @if (isset($typeEnd) && $typeEnd!='admin')
        <div id="fb-root"></div>
        <script>
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "https://connect.facebook.net/en_GB/all.js#xfbml=1&appId=753308934688020";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));

            window.fbAsyncInit = function() {
                // init the FB JS SDK
                FB.init({
                    appId      : '753308934688020',                        // App ID from the app dashboard
                    status     : true,                                 // Check Facebook Login status
                    xfbml      : true                                  // Look for social plugins on the page
                });
//                FB.Event.subscribe('comment.create', comment_callback);
//                FB.Event.subscribe('comment.remove', comment_callback);
            };
            var comment_callback = function(response) {
            }
        </script>
        @endif

