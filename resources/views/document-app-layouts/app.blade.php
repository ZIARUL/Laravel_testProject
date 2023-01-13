<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name')}}</title>

    <!-- Styles -->
    <link href="{{url('public/css/document-app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{url('public/css/custom.css')}}">
    <!--jquery box msg-->   
      
    <link rel="stylesheet" id="theme" type="text/css" />
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{url('public/css/jquery.msgbox.css')}}">
<style type="text/css">
    .footer{position: fixed;bottom: 0;left: 0;right: 0;}
    .footer-link ul {
    	float:right;
    }
    .footer-link ul li {
    	float:left;
    	list-style:none;
    	margin-right:10px;
    }
    .footer-link ul li:last-child {
    	margin-right:0px;
    }
</style>
<script type="text/javascript">
    var theme = location.href.split(/\?/)[1];
    theme = theme || 'metro';
    $("#theme").attr('href', "themes/"+ theme +"/css/jquery.msgbox.css");
    
    $ (document) .ready(function(){
        var produce = function () {
            $("pre.code").each (function(){
                eval ($(this).text());
            });
        }
        
        $("#themeswitcher").val(theme);
        
        produce();
        
        $("#themeswitcher").change(function(){
            location.href = location.href.split(/\?/)[0] + '?' + $(this).val();
        });
    });
 //for show message

    </script>   
<!--jquery box msg end-->    
  
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="" href="{{ url('/') }}">
                        <img src="{{url('public/images/tplogo.jpg')}}" style="width:180px;height:60px"/>
                    </a>

                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li>
                            
                                <a href="https://totalplantpa.com/" style="font-size:24px;color:#2a88bd">
                                    totalplanpa.com
                                </a>
                                                 
                        </li>
                     
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right" style="margin-right:0px">
                        <!-- Authentication Links -->
                        @if (Auth::guest())

                            <li><a href="{{ url('/') }}">Login</a></li>
                            <!--
                            <li><a href="{{ url('/register') }}">Register</a></li>
                            -->
                        @else


                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    @if(Auth::user())
                                        @if(Auth::user()->role===2)
                                                Welcome {{Auth::user()->company}}
                                        @elseif(Auth::user()->role===3)
                                           
                                            Welcome Admin
                                                                      
                                        @endif
                                    @endif 
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{route('setting')}}">Setting</a>
                                    </li>                          <li>
                                    <a href="{{route('changePassword')}}">Change Password</a>
                                    </li>                                    
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>

                                </ul>
                            </li>
                            <!--
                            <li>
                                <a href="{{route('dashboard')}}">Dashboard</a>
                            </li> 
                            -->
                            <li>
                                <a class="" href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="background:#f7b640; color:#fff;border-radius:5px;margin-top:8px; padding:10px">
                                            <i class="fas fa-sign-out-alt"></i> Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                </form>
                            </li>                            
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

        <div class="container footer">
            <div class="col-md-6">
            	© 2019 Totalplan Concepts.
            </div>
            <div class="col-md-6 footer-link">
            	<ul>
            		<li><a href="https://totalplantpa.com/terms-of-use-policy/">Terms of Use Policy</a></li>
            		<li><a href="https://totalplantpa.com/terms-of-service/">Terms of Service Policy</a></li>
            		<li><a href="https://totalplantpa.com/privacy-policy">Privacy Policy</a></li>
            		<li><a href="https://totalplantpa.com/sitemap.xml">Sitemap</a></li>
            	</ul>
            </div>
        </div>
    </div>

    <!-- Scripts -->

    <script src="{{url('public/js/document-app.js')}}"></script>
        <!--table sorting jquery--> 

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    
    <!--table sorting jquery end--> 
    <!--js area-->
    <script type="text/javascript">
//datatable js
      $(document).ready(function() {
          $('#example').DataTable();
      } );  
//datatable js end
    </script>    
    @yield('js');
    <!--js area end--> 
</body>

</html>
