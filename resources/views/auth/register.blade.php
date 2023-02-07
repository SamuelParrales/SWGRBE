@extends('layouts.app')

@section('content')
    <div class="container">
        <div class=" row g-0 justify-content-center px-lg-3">
            <form class="col-sm-10 col-md-8 col-lg-6 bg-white p-3 border rounded" action="">
                <header class="mb-3">
                    <h1 class="fs-2  mb-0"><i class="fa-solid fa-pen-to-square"></i> {{ __('Register') }}</h1>
                </header>
                @csrf
                <div class="form-floating mb-3">
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        placeholder="{{ __('Name') }}" autocomplete="off">
                    <label>{{ __('Name') }}</label>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input name="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                        placeholder="{{ __('Last Name') }}" autocomplete="off">
                    <label>{{ __('Last name') }}</label>
                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input name="username" type="text" class="form-control @error('username') is-invalid @enderror"
                        placeholder="{{ __('Username') }}" autocomplete="off">
                    <label>{{ __('Username') }}</label>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="{{ __('Email Address') }}" autocomplete="email">
                    <label>{{ __('Email Address') }}</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="{{ __('Password') }}" required autocomplete="new-password">
                    <label>{{ __('Password') }}</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input name="password_confirmation" type="password"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">
                    <label>{{ __('Confirm Password') }}</label>
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
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
