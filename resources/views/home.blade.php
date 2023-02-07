@extends('layouts.app')

@section('content')
    <div class="container pb-0">
        <!-- Carousel -->
        <div id="carousel-home" class="carousel slide pt-0 mt-0" data-bs-ride="carousel">
            <!-- Indicators/dots -->
            <div class="carousel-indicators mb-md-4">
                <button type="button" data-bs-target="#carousel-home" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#carousel-home" data-bs-slide-to="1"></button>
            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://cdn.pixabay.com/photo/2015/06/24/15/45/hands-820272_960_720.jpg" alt="Los Angeles"
                        class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="https://cdn.pixabay.com/photo/2015/05/31/10/55/man-791049_960_720.jpg" alt="Chicago"
                        class="d-block w-100">
                </div>
            </div>

            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel-home" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel-home" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>

        <div class="row g-0">
            <div class="col-auto mt-3">
                <h2>Lo más reciente</h2>
            </div>

            <section class="row g-0 justify-content-between ">
                @include('product.components.card')
                @include('product.components.card')
                @include('product.components.card')
                @include('product.components.card')
                @include('product.components.card')
            </section>
        </div>

        <div class="row g-0">
            <div class="col-auto mb-2">
                <h2>Categories</h2>

            </div>
            <section class="row g-0  ">
                <article class="container-category border col-6 col-sm-4 col-md-3 col-lg-2">
                    <a class="category text-center">
                        <div class="icon">
                            <i class="fa-solid fa-blender"></i>
                        </div>
                        <p>Categoriaaaaaaaa wsdds wdw</p>
                    </a>
                </article>
                <article class="container-category border col-6 col-sm-4 col-md-3 col-lg-2">
                    <a class="category text-center">
                        <div class="icon">
                            <i class="fa-solid fa-blender"></i>
                        </div>
                        <p>Categoriaaaa</p>
                    </a>
                </article>
                <article class="container-category border col-6 col-sm-4 col-md-3 col-lg-2">
                    <a class="category text-center">
                        <div class="icon">
                            <i class="fa-solid fa-blender"></i>
                        </div>
                        <p>Categoriaaaa</p>
                    </a>
                </article>
                <article class="container-category border col-6 col-sm-4 col-md-3 col-lg-2">
                    <a class="category text-center">
                        <div class="icon">
                            <i class="fa-solid fa-blender"></i>
                        </div>
                        <p>Categoriaaaaaaaa wsdds wdw</p>
                    </a>
                </article>
                <article class="container-category border col-6 col-sm-4 col-md-3 col-lg-2">
                    <a class="category text-center">
                        <div class="icon">
                            <i class="fa-solid fa-blender"></i>
                        </div>
                        <p>Categoriaaaa</p>
                    </a>
                </article>
                <article class="container-category border col-6 col-sm-4 col-md-3 col-lg-2">
                    <a class="category text-center">
                        <div class="icon">
                            <i class="fa-solid fa-blender"></i>
                        </div>
                        <p>Categoriaaaa</p>
                    </a>
                </article>
            </section>

        </div>
        {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> --}}
    </div>
@endsection
