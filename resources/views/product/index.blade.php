@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <aside class="col-4 col-sm-3 col-lg-2  pt-4">
                <h2 class="fs-6 fw-bold">Categories</h2>
                <a class="fs-6 text-decoration-none" href="">
                    <span>Licuadoras</span>
                    <span class="fw-light">(256)</span>
                </a>
                <br>
                <a class="fs-6 text-decoration-none" href="">
                    <span>Televisor</span>
                    <span class="fw-light">(256)</span>
                </a>
            </aside>
            <section class="col-8 col-sm-9 col-lg-10 row g-0 justify-content-center justify-content-md-start">
                <header class="row mb-3 justify-content-between align-items-end">
                    <div class="col-auto">
                        <h1 class="fs-2 fw-bold mb-0">Televisor</h1>
                        <small>2547 resultados</small>
                    </div>

                    <div class="row col-sm-12 col-md-auto justify-content-start justify-content-md-end">
                        <span class="fw-bold col-auto pe-2">Ordernar por:</span>
                        <div class="col-auto ps-0" style="width: 140px">
                            <select class="form-select border-0 m-0 p-0" aria-label="Default select example">
                                <option selected>Más reciente</option>
                                <option value="1">Menos reciente</option>

                            </select>
                        </div>
                    </div>
                </header>
                <div class="col-auto  mx-2">
                    @include('product.components.card')
                </div>
                <div class="col-auto mx-2">
                    @include('product.components.card')
                </div>
                <div class="col-auto mx-2">
                    @include('product.components.card')
                </div>
                <div class="col-auto  mx-2">
                    @include('product.components.card')
                </div>
                <div class="col-auto mx-2">
                    @include('product.components.card')
                </div>
                <div class="col-auto mx-2">
                    @include('product.components.card')
                </div>
                <div class="col-auto mx-2">
                    @include('product.components.card')
                </div>

            </section>
        </div>


    </div>
@endsection
