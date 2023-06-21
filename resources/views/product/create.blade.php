@extends('layouts.app')

@section('title','Crear producto')
@push('styles')
    <link rel="stylesheet" type="text/css"
        href="https://unpkg.com/file-upload-with-preview/dist/style.css" />
@endpush
@section('content')
    <div class="container">
        <div class=" row g-0 justify-content-center px-lg-3">
            @include('product.components.form', [
                'mode' => 'create',
                'product' => null,
            ])
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://unpkg.com/file-upload-with-preview/dist/file-upload-with-preview.iife.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/js/product/create.js'])
@endpush
