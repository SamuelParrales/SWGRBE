@extends('layouts.app')
@section('title','Nuevo moderador')

@section('content')
    <div class="container">
        <div class=" row g-0 justify-content-center px-lg-3">
            <form id="form-create-moderator" class="col-sm-10 col-md-8 col-lg-6 bg-white p-3 border rounded" action="{{route('moderatorRestv1.store')}}" method="POST">
                <header class="mb-3">
                    <h1 class="fs-2  mb-0"><i class="fa-solid fa-user-shield"></i> Nuevo moderador</h1>
                </header>
                <div class="form-floating mb-3">
                    <input name="name" type="text" class="feedback form-control"
                        placeholder="{{ __('Name') }}" autocomplete="off"
                        value=""
                        >
                    <label>{{ __('Name') }}</label>
                    <div class="msg-feedback py-0"></div>
                </div>
                <div class="form-floating mb-3">
                    <input name="last_name" type="text" class="feedback form-control"
                        placeholder="{{ __('Last Name') }}" autocomplete="off"
                        value=""
                        >
                    <label>{{ __('Last name') }}</label>
                    <div class="msg-feedback py-0"></div>
                </div>
                <div class="form-floating mb-3">
                    <input name="username" type="text" class="feedback form-control"
                        placeholder="{{ __('Username') }}" autocomplete="off"
                        value="{{old('username')}}"
                        >
                    <label>{{ __('Username') }}</label>
                    <div class="msg-feedback py-0"></div>
                </div>

                <div class="form-floating mb-3">
                    <input name="email" type="email" class="feedback form-control"
                        placeholder="{{ __('Email Address') }}" autocomplete="email"

                        >
                    <label>{{ __('Email Address') }}</label>
                    <div class="msg-feedback py-0"></div>
                </div>
                <div class="row justify-content-center mb-0 g-0">
                    <div class="col-auto">
                        <button type="submit" class="btn btn-main">
                            <i class="fa-regular fa-paper-plane"></i> {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@vite(['resources/js/user/admin/user/moderatorCreate.js'])
@endpush
