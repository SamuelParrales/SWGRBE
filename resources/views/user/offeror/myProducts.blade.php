@extends('layouts.app')
@section('title','Mis productos')
@section('content')
    <div class="container p-2">
        <div class="row g-0 justify-content-center">
            <section class="row col-12 col-md-11 col-lg-10 g-0 justify-content-center">
                <header class="row mb-3 justify-content-between align-items-end">
                    <div class="col-auto">
                        <h1 class="fs-2 fw-bold mb-0"><i class="fa-solid fa-boxes-stacked"></i> Mis productos</h1>
                    </div>

                    <div class="row col-sm-12 col-md-auto justify-content-start justify-content-md-end">
                        <span class="fw-bold col-auto pe-2">Ordernar por:</span>
                        <div class="col-auto ps-0" style="width: 140px">
                            <form id="form-filters" action="{{ route('user.offeror.myProducts') }}" method="GET">
                                <select name="order_by" class="form-select border-0 m-0 p-0"
                                    aria-label="Default select example">
                                    <option value="desc" @if ($searchParams['order_by'] == 'desc') selected @endif>Más reciente
                                    </option>
                                    <option value="asc" @if ($searchParams['order_by'] == 'asc') selected @endif>Menos reciente
                                    </option>
                                </select>
                            </form>
                        </div>
                    </div>
                </header>
                @if ($products->total() == 0)
                    <div class="row justify-content-center mt-3">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="fs-3 mb-3 ">
                                        No ha añadido ningun producto aún.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-sm bg-white border">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">#</th>
                                    <th scope="col" class="text-center" style="width: 150px">Imagen</th>
                                    <th scope="col" class="text-center">Datos</th>
                                    <th scope="col" class="text-center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < $products->count(); $i++)
                                    @php
                                        $product = $products[$i];
                                    @endphp
                                    <tr>
                                        <th class="text-center align-middle" scope="row">{{ $i + 1 }}</th>
                                        <td>
                                            <div class="container-img rounded">
                                                <img class="crop " src="{{ $product->images[0]->url }}" alt="">
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <strong>Categoría: </strong>
                                                <span>{{ $product->category->name }}</span>
                                            </div>
                                            <div>
                                                <strong>Nombre: </strong>
                                                <span>{{ $product->name }}</span>
                                            </div>
                                            <div>
                                                <strong>Descripción: </strong>
                                                <span>{{ $product->description }}</span>
                                            </div>
                                            <div>
                                                <strong>Celular: </strong>
                                                <span>{{ $product->cell_phone_num }}</span>
                                                @if ($product->has_whatsapp)
                                                    <i class="fa-brands fa-whatsapp fs-5 text-success"></i>
                                                @endif
                                            </div>
                                            <div>
                                                <strong>Reciclado: </strong>
                                                <span>{{ $product->recycled ? 'Si' : 'No' }}</span>
                                            </div>
                                            <span class="text-secondary">
                                                Actualizado: {{ $product->updated_at }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="row g-0 align-items-center" style="height: 150px">
                                                <div class="row g-0 justify-content-center">
                                                    <div class="col-auto">
                                                        <a href="{{ route('product.show', $product->id) }}"
                                                            class="btn btn-main"><i class="fa-solid fa-eye"></i></a>
                                                    </div>
                                                    @if ($product->recycled)
                                                        <div class="col-auto ms-lg-1">
                                                            <button disabled type="button" class="btn btn-success"><i
                                                                    class="fa-solid fa-recycle"></i></button>
                                                        </div>
                                                    @else
                                                        <form action="{{ route('productRestv1.recycle', $product->id) }}"
                                                            class="col-auto ms-lg-1 form-recycle-product" method="post">
                                                            @method('put')
                                                            <button type="submit" class="btn btn-main"><i
                                                                    class="fa-solid fa-recycle"></i></button>
                                                        </form>
                                                    @endif

                                                    <div class="w-100 mb-1"></div>
                                                    <div class="col-auto">
                                                        @if ($product->recycled)
                                                            <button disabled type="button" class="btn btn-success"
                                                                style="width: 42.19px"><i
                                                                    class="fa-solid fa-marker"></i></button>
                                                        @else
                                                            <a href="{{ route('product.edit', $product->id) }}"
                                                                class="btn btn-main" style="width: 42.19px"><i
                                                                    class="fa-solid fa-marker"></i></a>
                                                        @endif
                                                    </div>
                                                    @if ($product->recycled)
                                                        <div class="col-auto ms-lg-1">
                                                            <button disabled type="button" class="btn btn-danger"
                                                                style="width: 42.19px"><i
                                                                    class="fa-solid fa-trash-can"></i></button>
                                                        </div>
                                                    @else
                                                        <form action="{{ route('productRestv1.destroy', $product->id) }}"
                                                            method="POST" class="col-auto ms-lg-1 form-destroy-product">
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger"
                                                                style="width: 42.19px"><i
                                                                    class="fa-solid fa-trash-can"></i></button>
                                                        </form>
                                                    @endif

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endfor

                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                @endif



            </section>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/js/user/offeror/myProducts.js'])
@endpush
