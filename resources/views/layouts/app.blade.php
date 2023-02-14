@php
    use App\Models\Admin;
    use App\Models\Offeror;
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>@yield('title')</title>
    {{-- Icon --}}
    <link rel="icon" type="image/png" href="{{asset('icon.png')}}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/css/components/helpers/LoaderMain.css'])
    <!--Bootstrap  -->

    @stack('styles')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-main  shadow-sm">
            <div class="container align-items-start">
                <a class="navbar-brand p-0 me-1 me-md-5 text-center" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    <img src="{{asset('icon.png')}}" width="40" alt=""> <h2 class="fs-5 d-none d-md-block">SWGRBE</h2>
                </a>
                <form id="form-main-search" class="nav-item col-md-6 col-lg-5 border border-success rounded" action="{{route('product.index')}}">
                    <input name="category_id" class="d-none" type="text" value="@yield('search_category_id')">
                    <div class="d-flex">
                        <input class="form-control" type="search" name="name" placeholder="Buscar productos electrónicos" aria-label="Search" value="@yield('search')">
                        <button class="btn btn-success" type="submit"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav ">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Categorías
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark "
                                    aria-labelledby="navbarDarkDropdownMenuLink">
                                    @foreach ($categories as $category)
                                        <li><a
                                                class="dropdown-item category-link"
                                                href="{{route('product.index')}}?category_id={{$category->id}}"
                                                data-id="{{$category->id}}"
                                            ><i
                                                    class="{{ $icons[$category->id] }} p-0" style="width: 12px"></i>
                                                {{ $category->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                </form>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-dark"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('user.profile') }}">
                                        <i class="fa-solid fa-user" style="width: 16px"></i> {{ __('Profile') }}
                                    </a>

                                    @if (Auth::user()->profile instanceof Offeror)
                                        <a class="dropdown-item" href="{{ route('product.create') }}">
                                            <i class="fa-solid fa-upload"></i> Añadir producto
                                        </a>
                                        <a class="dropdown-item" href="{{ route('user.offeror.myProducts') }}">
                                            <i class="fa-solid fa-boxes-stacked"></i> Mis productos
                                        </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-right-from-bracket" style="width: 16px"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        {{-- Sidebar Admin --}}
        @guest
        @elseif (Auth::user()->profile instanceof Admin)
            <div class="offcanvas offcanvas-start bg-dark text-white" tabindex="-1" id="admin-sidebar"
                aria-labelledby="admin-sidebarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="admin-sidebarLabel"><i class="fa-solid fa-shield-halved"></i>
                        {{ __('Administration') }}</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body px-4">
                    <a href="{{ route('user.admin.userIndex') }}" class="btn link-admin-sidebar border rounded"><i
                            class="fa-solid fa-users"></i>
                        Usuarios</a>
                    <a href="{{ route('user.admin.reportIndex') }}" class="btn link-admin-sidebar border rounded"><i
                            class="fa-solid fa-flag" style="width: 20px"></i> Reportes</a>
                </div>
            </div>
        @endguest

        {{-- Main --}}
        <main class="pt-4 ">
            @yield('content')
        </main>


        {{-- Button show admin sidebar --}}

        @guest
        @elseif (Auth::user()->profile instanceof Admin)
            <button id="show-sidebar" class="btn btn-dark m-md-4" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#admin-sidebar" aria-controls="admin-sidebar">
                <i class="fa-solid fa-shield-halved"></i>
            </button>
        @endguest


    </div>
    <div id="content-loader-main">
        <span class="loader-main"></span>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js"></script>

    @stack('scripts')
</body>

</html>
