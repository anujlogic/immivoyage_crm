<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" type="image/png"  sizes="132x132" href="{{ asset('public/asset/image/fav_icon.png') }}">
        <link rel="stylesheet" href="{{ asset ('public/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset ('public/asset/plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="{{ asset('public/asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/asset/plugins/jqvmap/jqvmap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/asset/dist/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/asset/plugins/daterangepicker/daterangepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('public/asset/plugins/summernote/summernote-bs4.css') }}">
        <link rel="stylesheet" href="{{ asset('public/asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v10.0'
          });
        };
        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
      </script>
      <!-- Your Chat plugin code -->
      <div class="fb-customerchat"
        attribution="biz_inbox"
        page_id="107694657733142">
      </div>
<!-- END FACEBOOK CHAT PLUGIN -->      

        <div class="se-pre-con"></div>
        @include("partials.header") 
        @include("partials.sidebar")
        @yield('content')
        @include("partials.footer")
        @if(Request::url() =="http://localhost/immivoyage_crm/ielts/list" || Request::url() =="http://portal.immivoyage.com/ielts/list")
            <script src="{{ asset('public/asset/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
            <script src="{{ asset('public/asset/dist/js/adminlte.js') }}"></script>
            <script src="{{ asset('public/asset/plugins/datatables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('public/asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('public/asset/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
            <script src="{{ asset('public/asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('public/asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        @else
            <style>
                .no-js #loader { display: none;  }
                .js #loader { display: block; position: absolute; left: 100px; top: 0; }
                .se-pre-con {
                    position: fixed;
                    left: 0px;
                    top: 0px;
                    width: 100%;
                    height: 100%;
                    z-index: 9999;
                    background-color:red;
                    background: url('{{ URL::asset('/public/image/load.gif')}}') center no-repeat #fff;
                }
            </style>
            <div class="se-pre-con"></div>
            <script src="{{ asset('public/asset/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
            <script>
              $.widget.bridge('uibutton', $.ui.button)
            </script>
            <script src="{{ asset('public/asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ asset('public/asset/plugins/chart.js/Chart.min.js') }}"></script>
            <script src="{{ asset('public/asset/plugins/sparklines/sparkline.js') }}"></script>
            <!-- JQVMap -->
            <script src="{{ asset('public/asset/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
            <script src="{{ asset('public/asset/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
            <!-- jQuery Knob Chart -->
            <script src="{{ asset('public/asset/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
            <!-- daterangepicker -->
            <script src="{{ asset('public/asset/plugins/moment/moment.min.js') }}"></script>
            <script src="{{ asset('public/asset/plugins/daterangepicker/daterangepicker.js') }}"></script>
            <!-- Tempusdominus Bootstrap 4 -->
            <script src="{{ asset('public/asset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
            <!-- Summernote -->
            <script src="{{ asset('public/asset/plugins/summernote/summernote-bs4.min.js') }}"></script>
            <!-- overlayScrollbars -->
            <script src="{{ asset('public/asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
            <!-- AdminLTE App -->
            <script src="{{ asset('public/asset/dist/js/adminlte.js') }}"></script>
            <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
            <script src="{{ asset('public/asset/dist/js/pages/dashboard.js') }}"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="{{ asset('public/asset/dist/js/demo.js') }}"></script>
            <!-- Datatable jquery below  -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
            <script type="text/javascript">
                $(window).load(function(){
                    $(".se-pre-con").fadeOut("slow");;
                });
            </script>
            <script src="{{ asset('public/asset/plugins/datatables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('public/asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('public/asset/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
            <script src="{{ asset('public/asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js"></script>
            <script src="{{ asset('public/js/dropzone-script.js') }}"></script>
        @endif
    </div> 
   </body>
</html>
 
