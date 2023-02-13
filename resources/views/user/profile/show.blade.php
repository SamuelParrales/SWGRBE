@extends('layouts.app')


@section('content')
    <div class="container pb-0">
        <!-- title -->
        <div class="row justify-content-center">
            <div class="col-12 col-sm-11 col-md-10 col-lg-9">
                <header class="row mb-3 justify-content-between align-items-end">
                    <div class="col-auto">
                        <h1 class="ms-3 fs-2 fw-bold mb-0"><i class="fa-solid fa-user"></i> {{ __('Profile') }}</h1>
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
                                <p class="mb-0"><strong>{{ __('Role') }} </strong></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ __(substr($user->profile_type, 11)) }}</p>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <a id="btn-show-modal-change-password" class="btn btn-main col-auto me-1"
                    href="{{ route('passwordRestv1.update') }}">
                    <i class="fa-solid fa-lock"></i> Cambiar contraseña</a>
                <a href="{{ route('user.profile.edit') }}" class="btn btn-main col-auto me-1">
                    <i class="fa-solid fa-user-pen"></i> Editar perfil</a>
                <form id="form-delete-user" class="d-inline" action="{{route('profileRestv1.destroy')}}">
                    @method('delete')
                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-user-xmark"></i> Eliminar perfil</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/js/user/profile/show.js'])
@endpush
