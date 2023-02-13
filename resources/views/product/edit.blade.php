@extends('layouts.app')
@section('title','Editar '.$product->name)
@push('styles')
    <link rel="stylesheet" type="text/css"
        href="https://unpkg.com/file-upload-with-preview/dist/file-upload-with-preview.min.css" />
@endpush
@section('content')
    <div class="container">
        <div class=" row g-0 justify-content-center px-lg-3">
            @include('product.components.form', [
                'mode' => 'edit',
                'product' => $product,
            ])
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://unpkg.com/file-upload-with-preview/dist/file-upload-with-preview.iife.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/js/product/edit.js'])
@endpush
