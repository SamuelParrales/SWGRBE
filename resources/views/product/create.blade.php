@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" type="text/css"
        href="https://unpkg.com/file-upload-with-preview/dist/file-upload-with-preview.min.css" />
@endpush
@section('content')
    <div class="container">
        <div class=" row g-0 justify-content-center px-lg-3">
            <form class="col-sm-10 col-md-8 col-lg-6 bg-white p-3 border rounded" action="">
                <header class="mb-3">
                    <h1 class="fs-2  mb-0"><i class="fa-solid fa-pen-to-square"></i> Añadir producto</h1>
                </header>
                <div class="form-floating mb-3">
                    <input name="name" type="text" class="form-control" placeholder="Nombre" autocomplete="off">
                    <label>Nombre</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea name="description" class="form-control" placeholder="Leave a comment here" style="height: 100px"
                        autocomplete="off"></textarea>
                    <label>Descripción</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" aria-label="Floating label select example">
                        <option selected>Seleccionar</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <label>Categoría</label>
                </div>
                <div class="row align-items-center g-0 mb-3">
                    <div class="form-floating col-6">
                        <input name="name" type="text" class="form-control" placeholder="Nombre" autocomplete="off">
                        <label>Celular</label>
                    </div>
                    <div class="form-check col-6 ps-5">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="">
                            Whatssap <i class="fa-brands fa-whatsapp text-success fs-5"></i>
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Imagen:</label>
                    <input id="input-upload-img" class="form-control" type="file" multiple="multiple">
                </div>
                <div class="row justify-content-center mb-3">
                    <div class="col-auto">
                        <button type="submit" class="btn btn-main"><i class="fa-regular fa-paper-plane"></i>
                            Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endsection

    @push('scripts')
        <script src="https://unpkg.com/file-upload-with-preview/dist/file-upload-with-preview.iife.js"></script>
        @vite(['resources/js/product/create.js'])
    @endpush
