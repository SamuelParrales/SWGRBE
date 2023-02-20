@extends('layouts.app')

@section('productos, '.$product->name)
@section('title', $product->name)
@section('content')
    <div class="container">
        <div class="ms-2">
            <a href="{{ route('product.index') }}" class="text-decoration-none ">Listado</a> ➤
            @foreach ($categories as $category)
                @if ($product->category_id == $category->id)
                    <a class="text-decoration-none "
                        href="{{ route('product.index') }}?category_id={{ $product->category_id }}">{{ $category->name }}</a>
                    ➤
                @break
            @endif
        @endforeach
    </div>
    <section class="row p-3 g-0 bg-white border rounded">
        <div class="col-12 col-md-7 pe-3 ">
            <div class="d-block" style="position: relative; height: 400px;">
                <ul id="images" class="d-none">
                    @foreach ($product->images as $image)
                        <li><img src="{{ $image->url }}" src="{{ $image->public_id }}"></li>
                    @endforeach
                </ul>

            </div>
        </div>
        <div class="row g-0 col-12 col-md-5 p-3 border rounded">
            <header class="mb-3">
                <h1 class="fs-3 mb-0 pb-0">{{ $product->name }}</h1>
                <span class="text-secondary">Publicado por:
                    <a id="link-username" data-username="{{ $product->user->username }}"
                        data-name="{{ $product->user->name }}" data-last_name="{{ $product->user->last_name }}"
                        href="" class="text-decoration-none ">{{ $product->user->username }}
                    </a>
                </span>
                <br>
                <span class="text-secondary">
                    Actualizado: {{ $product->updated_at }}
                </span>
            </header>
            <div>
                <p class="pb-0 mb-0">{{ $product->description }}</p>
            </div>
            <hr>
            <div class="col">
                @include('product.components.btnsContant', compact('product'))
            </div>
            <div class="row g-0 h-50 align-items-end justify-content-end">
                <div class="col-auto mt-auto">

                    @guest
                        <a id="btn-report" class="btn btn-danger" href="{{ route('reportRestv1.store') }}"
                            data-product_id="{{ $product->id }}"><i class="fa-solid fa-flag"></i> Reportar</a>
                    @elseif ($product->user_id == Auth::user()->id)
                        @if ($product->recycled)
                            <button disabled class="btn btn-success"><i class="fa-solid fa-marker"></i> Editar</button>
                        @else
                            <a class="btn btn-main" href="{{ route('product.edit', $product->id) }}"><i
                                    class="fa-solid fa-marker"></i> Editar</a>
                        @endif
                    @else
                        {{-- Session init --}}


                        {{--  --}}


                        {{-- Offeror --}}
                        @if (Auth::user()->profile_type == 'App\Models\Offeror')
                            <a id="btn-report" class="btn btn-danger" href="{{ route('reportRestv1.store') }}"
                                data-product_id="{{ $product->id }}"><i class="fa-solid fa-flag"></i> Reportar</a>
                        @else
                            {{-- Admin - Moderator --}}
                            @if ($product->user->profile->banned_at)
                            <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" title="El usuario ya esta baneado.">
                                <button class="btn btn-danger" type="button" disabled><i class="fa-solid fa-user-large-slash"></i> Banear usuario</button>
                              </span>
                            @else
                                <a id="btn-show-modal-ban" class="btn btn-danger "
                                    href="{{ route('offerorRestv1.ban', $product->user->id) }}"><i
                                        class="fa-solid fa-user-large-slash"></i> Banear usuario</a>
                            @endif


                            <form id="form-destroy-product" class="d-inline"
                                action="{{ route('productRestv1.destroy', $product->id) }}" method="POST">
                                @method('delete')
                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Eliminar
                                    producto </button>
                            </form>
                        @endif

                    @endguest
                </div>
            </div>

        </div>
    </section>
</div>
@endsection

@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@vite(['resources/js/product/show.js'])
@endpush
