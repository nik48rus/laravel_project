<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" ng-app>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/theme/starability-all.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}"/>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>

    <script type="text/javascript">
    angular.module('myApp', []).controller('ctrl', function($scope) {
    $scope.names = [
        'Jani',
        'Carl',
        'Margareth',
        'Hege',
        'Joe',
        'Gustav',
        'Birgit',
        'Mary',
        'Kai'
    ];
});
    </script>

    <script src="{{ asset('js/names.js') }}"></script>

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};

        var cal = 0;

        function getTake(id, uid, cid) {
            $.ajax({
              url: "{{ asset('scripts/gettake.php') }}?o_id=" + id + "&u_id=" + uid + "&c_id=" + cid,
              success: function(data){
                if(data == "succ")
                {
                    alert( "You have successfully applied for the order. Order ID: " + id );
                }
                if (data == "err") {
                    alert( "ERROR! " + "{{ asset('scripts/gettake.php') }}?o_id=" + id + "&u_id=" + uid + "&c_id=" + cid);
                }
              }
            });
        }

        function inform(id_order) {
            location.href = '/myorders/info?id=' + id_order;
        }

        function selectyet(name) {
            $('.selecteding').text(name);
            $('.btn-info').removeAttr('disabled');
            $('.btn-warning').removeAttr('disabled');
            $('.btn-info').attr('onclick', 'information("' + name + '")');
            $('#retmet').attr('onclick', 'retmet(<? if(isset($_GET['id'])){echo $_GET['id'];} ?>, `' + name + '`)');
        }

        function information(name) {
            location.href = '/userinfo?name=' + name;
        }

        function retmet(id, name) {
            location.href = '/scripts/sendexe.php?name=' + name + '&id_order=' + id;
        }

        function paidcalculate() {
            cal = $('#by_paid').val();
            $('#to_paid').val(cal * 0.80);
        }

    </script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .take-item{
            border: 0px;
            background-color: #8eb4cb;
            color: white;
            border-radius: 3px; 
            width: 100%;
        }

        .take-item:hover{
            background-color: #6b9dbb;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                            @if (Auth::guest())
                    
                            @else
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search" aria-hidden="true"></i> Search<span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="{{ url('/home/search/deliver') }}"><i class="fa fa-car" aria-hidden="true"></i> Courier</a></li>
                                <li><a href="{{ url('/home/search/order') }}"><i class="fa fa-archive" aria-hidden="true"></i> Order</a></li>
                              </ul>
                            </li>
                            @endif
                            
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-list" aria-hidden="true"></i> List of<span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="{{ url('/topcustomers?top=10') }}"> Customers</a></li>
                                <li><a href="{{ url('/topexecutors?top=10') }}"> Executors</a></li>
                              </ul>
                            </li>
                             
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/') }}">Profile</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Log out
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script type="text/javascript">
        new Vue({
            el: '#app',
            data: {
                input: '',
                array: [
                {
                    name: 'Agel',
                    ag: 23
                },
                {
                    name: 'Mark',
                    ag: 26
                }
                ]
            }
        });
    </script>

    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.2.1/vue.min.js"></script>-->

</body>
</html>
