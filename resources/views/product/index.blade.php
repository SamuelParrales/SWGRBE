@extends('layouts.app')
@section('title','Productos' .($searchParams['name']?' - '.$searchParams['name']:''))

@section('search', $searchParams['name'])
@section('search_category_id', $searchParams['category_id'])
@section('content')
    <div class="container">
        <div class="row align-items-start">
            <aside class="col-4 col-sm-3 col-lg-2  pt-4">
                <h2 class="fs-6 fw-bold">{{ __('Categories') }}</h2>
                @foreach ($categories as $category)
                    <div class="mb-3">
                        @if ($searchParams['category_id'] == $category->id)
                            <span>{{ $category->name }}</span>
                        @else
                            <a class="fs-6 text-decoration-none category-link" href="{{ route('product.index') }}"
                                data-id="{{ $category->id }}">
                                <span>{{ $category->name }}</span>
                            </a>
                        @endif


                    </div>
                @endforeach


            </aside>
            <section class="col-8 col-sm-9 col-lg-10 row g-0 justify-content-center justify-content-md-start">
                <header class="row mb-3 justify-content-between align-items-end">
                    @php
                        $total = $products->total();
                    @endphp
                    <div class="col-auto">
                        <h1 class="fs-2 fw-bold mb-0">{{ $searchParams['name'] }}</h1>
                        @if ($total==0)
                            <small></small>
                        @elseif ($total==1)
                            <small>{{ $products->total() }} resultado</small>
                        @else
                            <small>{{ $products->total() }} resultados</small>
                        @endif

                    </div>
                    <div class="row col-sm-12 col-md-auto justify-content-start justify-content-md-end">
                        <span class="fw-bold col-auto pe-2">Ordernar por:</span>
                        <div class="col-auto ps-0" style="width: 140px">
                            <select name="order_by" class="form-select border-0 m-0 p-0"
                                aria-label="Default select example">
                                <option value="desc" @if ($searchParams['order_by'] == 'desc') selected @endif>Más reciente
                                </option>
                                <option value="asc" @if ($searchParams['order_by'] == 'asc') selected @endif>Menos reciente
                                </option>
                            </select>
                        </div>
                    </div>
                </header>
                <div>
                    @if ($searchParams['category_id'])
                        <a href="{{ route('product.index') }}" class="ms-2 text-decoration-none">Listado</a> ➤
                        @foreach ($categories as $category)
                            @if ($searchParams['category_id'] == $category->id)
                                <span>{{ $category->name }}</span> ➤
                            @endif
                        @endforeach
                    @else
                        <span class="ms-2">Listado ➤</span>
                    @endif
                </div>

                @if ($products->count() > 0)
                    @foreach ($products as $product)
                        <div class="col-auto  mx-2">
                            @include('product.components.card', compact('product'))
                        </div>
                    @endforeach
                    {{$products->links()}}
                @else
                    <div class="mt-4 mx-2">
                        <h3 class="">No se encontraron resultados.</h3>
                    </div>

                @endif



            </section>
        </div>


    </div>
@endsection

@push('scripts')
    @vite(['resources/js/product/index.js'])
@endpush
