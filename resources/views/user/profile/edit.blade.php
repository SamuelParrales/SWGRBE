@extends('layouts.app')
@section('title','Editar perfil')
@section('content')
    <div class="container">
        <div class=" row g-0 justify-content-center px-lg-3">
            <form id="form-user" class="col-sm-10 col-md-8 col-lg-6 bg-white p-3 border rounded"
                action="{{route('profileRestv1.update')}}"
                enctype="multipart/form-data">
                <input class="d-none" name="password" type="password">
                <header class="mb-3">
                    <h1 class="fs-2  mb-0"><i class="fa-solid fa-user-pen"></i>
                        Editar perfil

                    </h1>
                </header>
                @method('put')
                <div class="form-floating mb-3">
                    <input name="name" type="text" class="form-control feedback" placeholder="Nombre"
                        autocomplete="off"
                        value="{{$user->name}}"
                    >
                    <label>Nombre</label>
                    <div class="msg-feedback py-0"></div>
                </div>
                <div class="form-floating mb-3">
                    <input name="last_name" type="text" class="form-control feedback" placeholder="Nombre"
                        autocomplete="off"
                        value="{{$user->last_name}}"
                    >
                    <label>{{__('Last name')}}</label>
                    <div class="msg-feedback py-0"></div>
                </div>
                <div class="form-floating mb-3">
                    <input name="username" type="text" class="form-control feedback" placeholder="Nombre"
                        autocomplete="off"
                        value="{{$user->username}}"
                    >
                    <label>{{__('Username')}}</label>
                    <div class="msg-feedback py-0"></div>
                </div>
                <div class="form-floating mb-3">
                    <input name="email" type="text" class="form-control feedback" placeholder="Nombre"
                        autocomplete="off"
                        value="{{$user->email}}"
                    >
                    <label>{{__('Email Address')}}</label>
                    <div class="msg-feedback py-0"></div>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@vite(['resources/js/user/profile/edit.js'])
@endpush
