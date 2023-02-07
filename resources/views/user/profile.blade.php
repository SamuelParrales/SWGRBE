@extends('layouts.app')

@php
    $user = Auth::user();
@endphp
@section('content')
    <div class="container pb-0">
        <!-- title -->
        <div class="row justify-content-center">
            <div class="col-12 col-sm-11 col-md-10 col-lg-9">
                <header class="row mb-3 justify-content-between align-items-end">
                    <div class="col-auto">
                        <h1 class="fs-2 fw-bold mb-0">{{ __('Profile') }}</h1>
                    </div>
                </header>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0"><Strong>{{ __('Username') }}</Strong></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $user->username }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0"><Strong>{{ __('Name') }}</Strong></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $user->name }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0"><Strong>{{ __('Last name') }}</Strong></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $user->last_name }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0"><Strong>{{ __('Email Address') }}</Strong></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $user->email }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0"><strong>{{ __('Role') }}</strong></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $user->role->name }}</p>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <a id="btn-show-modal-change-password" class="btn btn-main col-auto me-1">
                    <i class="fa-solid fa-lock"></i> Cambiar contraseña</a>
                <button class="btn btn-main col-auto me-1">
                    <i class="fa-solid fa-pen"></i> Editar perfil</button>
                <a class="btn btn-danger"><i class="fa-solid fa-user-xmark"></i> Eliminar perfil</a>
            </div>
        </div>
    </div>
@endsection
