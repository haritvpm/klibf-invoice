<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}  {{$active_bookfest?->title}}</title>

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

   
    <!-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" /> -->
    <link href="{{ asset('css/bootstrap5.min.css') }}" rel="stylesheet" />
    <!-- <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet" /> -->
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet" />
    <!-- <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" /> -->
    <link href="{{ asset('css/buttons.dataTables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/select.dataTables.min.css') }}" rel="stylesheet" />
    <!-- <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" /> -->
    <link href="{{ asset('css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
 
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" />
    <!-- <link href="{{ asset('css/coreui.min.css') }}" rel="stylesheet" /> -->
    <link href="{{ asset('css/perfect-scrollbar.min.css') }}" rel="stylesheet" />
  
    <link href="{{ asset('css/select2-bootstrap-5-theme.min.css') }}" rel="stylesheet" />
    
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    @yield('styles')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark" >
            <div class="container">
                <a class="navbar-brand  me-3" href="{{ url('/') }}" style="color:yellow;">
                    {{ config('app.name', 'Laravel') }}  {{$active_bookfest?->title}}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav  me-auto">
                        @guest
                        @else
                            <li class="nav-item ">
                            @can('invoice_list_access')

                                        <a class="nav-link ms-1" href="{{ route('frontend.invoice-lists.index') }}">
                                        <i class="me-0 fa-fw fas fa-file-invoice-dollar"></i>{{ trans('cruds.invoiceList.title') }}
                                        </a>
                                    @endcan
                                  
                            </li>

                            <li class="nav-item">
                            @can('member_fund_access')
                                <a class="nav-link  ms-1" href="{{ route('frontend.member-funds.index') }}">
                                <i class="me-1 fa-fw fas fa-user-friends"></i>{{ trans('cruds.member.title') }}
                                </a>
                            @endcan
                            </li>
                            <li class="nav-item">
                            @can('publisher_access')
                                <a class="nav-link  ms-1" href="{{ route('frontend.publishers.index') }}">
                                <i class="me-1 fa-fw fas fa-book-open"></i>{{ trans('cruds.publisher.title') }}
                                </a>
                            @endcan
                            </li>

                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if(Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">


                                <!--     @can('user_management_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.userManagement.title') }}
                                        </a>
                                    @endcan -->
                                    
                                  
                                <!--     @can('user_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.users.index') }}">
                                            {{ trans('cruds.user.title') }}
                                        </a>
                                    @endcan -->
                                    <a  class="dropdown-item" href="{{ route('frontend.member-funds.export') }}">
                                        Download Report
                                    </a>
                                                    
                                    <a class="dropdown-item" href="{{ route('frontend.profile.index') }}">{{ __('My profile') }}</a>

                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @if(session('message'))
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                        </div>
                    </div>
                </div>
            @endif
            @if($errors->count() > 0)
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <ul class="list-unstyled mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</body>

<script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/perfect-scrollbar.min.js') }}"></script>

    <!-- <script src="{{ asset('js/coreui.min.js') }}"></script> -->
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <!-- <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script> -->
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/buttons.flash.min.js') }}"></script>

    <script src="{{ asset('js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
@yield('scripts')

</html>