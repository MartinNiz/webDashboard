<!doctype html>
<html lang="{{ Config::get('app.locale') }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    {{-- Title --}}
    <title>{{ Config::get('app.name') }} > Admin</title>

    <!-- Bootstrap -->
    @stack('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

</head>

<body>

    <body id="body-pd" class="body-pd">
        <header class="header body-pd" id="header">
            <div class="header_toggle"> 
                <i class='bx bx-menu bx-x' id="header-toggle"></i> 
            </div>
            <div>
                <a href="{{ route(Route::currentRouteName(), (isset($id)) ? ['en', $id] : 'en') }}">EN</a>
                <a href="{{ route(Route::currentRouteName(), (isset($id)) ? ['es', $id] : 'es') }}">ES</a>
            </div>
        </header>
        <div class="l-navbar show" id="nav-bar">
            <nav class="nav">
                <div> 
                  <a href="#" class="nav_logo"> 
                    <i class='bx bx-layer nav_logo-icon'></i> 
                    <span class="nav_logo-name">Bootstrap</span> 
                  </a>
                  <div class="nav_list"> 
                    <a href="{{ route('admin.dashboard', app()->getLocale()) }}" class="nav_link {{ (Route::currentRouteName() == 'admin.dashboard') ? 'active' : '' }}">
                        <i class='bx bx-grid-alt nav_icon'></i> 
                        <span class="nav_name">Dashboard</span> 
                    </a>

                    <a href="{{ route('admin.products.index' , [app()->getLocale()]) }}" class="nav_link {{ (Route::currentRouteName() == 'admin.products.index') ? 'active' : '' ; }} "> 
                      <i class='bx bx-cart nav_icon'></i> 
                      <span class="nav_name">{{ __('Products') }}</span> 
                    </a> 
                  </div>
                </div> 
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-transparent border-0 nav_link"> 
                      <i class='bx bx-log-out nav_icon'></i> 
                      <span class="nav_name">{{ __('Logout') }}</span> 
                    </button>
                </form>
            </nav>
        </div>
        <!--Container Main start-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h4 class="mt-4">@yield('title')</h4>
                </div>
    
                @yield('content')
            </div>
        </div>
        <!--Container Main end-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="{{ asset('js/admin.js') }}"></script>
        @stack('scripts')

    </body>

</html>
