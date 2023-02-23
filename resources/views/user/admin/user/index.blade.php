@extends('layouts.app')
@section('title', 'Administración - usuarios')
@section('content')
    <div class="container p-2">
        <div class="row g-0 justify-content-center">
            <section class="row col-12 col-md-11 g-0 justify-content-center">
                <header class="row mb-3 justify-content-between align-items-end">
                    <div class="col-auto">
                        <h1 class="fs-2 fw-bold mb-0">Usuarios</h1>
                    </div>
                    <form class="row g-0 col-12 col-sm-9 col-md-6 col-lg-5 justify-content-start justify-content-md-end">
                        <div class="col-5">
                            <label class="form-label mb-0 fw-bold">{{ __('Role') }}: </label>
                            <select name="profile_type" class="form-select form-select-lg bg-white "
                                style="padding-top: 7px; padding-bottom: 6px; font-size:0.9rem">
                                <option value="">Todos</option>
                                <option value="Offeror" @if ($searchParams['profile_type'] == 'Offeror') selected @endif>
                                    {{ __('Offeror') }} </option>
                                <option value="Moderator" @if ($searchParams['profile_type'] == 'Moderator') selected @endif>
                                    {{ __('Moderator') }}</option>

                            </select>
                        </div>
                        <div class=" m-0 col-7">
                            <label class="form-label mb-0 fw-bold">{{ __('Username') }}: </label>
                            <div class="row g-0">
                                <div class="col">
                                    <input name="username" class="form-control bg-white"
                                        value="{{ $searchParams['username'] }}" placeholder="Usuario">
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-main"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                            </div>
                        </div>


                    </form>
                </header>

                @if ($users->total() == 0)
                    <div class="row justify-content-center mt-3">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="fs-3 mb-3 ">
                                        No se encontró ningún usuario.
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
                                    <th scope="col" class="text-center">{{ __('User') }}</th>
                                    <th scope="col" class="text-center">{{ __('Name') }}</th>
                                    <th scope="col" class="text-center">{{ __('Last name') }}</th>
                                    <th scope="col" class="text-center">Correo</th>
                                    <th scope="col" class="text-center">{{ __('Role') }}</th>
                                    <th scope="col" class="text-center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @for ($i = 0; $i < $users->count(); $i++)
                                    @php
                                        $user = $users[$i];
                                        $index = $users->perPage() * ($users->currentPage() - 1) + $i + 1;
                                        $profile_type = substr($user->profile_type, 11);
                                    @endphp
                                    <tr>
                                        <th class="text-center align-middle" scope="row">{{ $index }}</th>
                                        <td>
                                            {{ $user->username }}
                                        </td>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                        <td>
                                            {{ $user->last_name }}
                                        </td>
                                        <td class="p-0">
                                            {{ $user->email }}
                                            @if ($profile_type == 'Offeror')
                                                <a data-username="{{ $user->username }}"
                                                    data-is-banned="{{ $user->profile->banned_at }}"
                                                    data-bans="{{ $user->profile->bans }}" href="#"
                                                    class="btn-show-history p-0 m-0 fs-5" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Historial de baneo"
                                                    style="width: 32.5px; height: 30.8px;"><i
                                                        class="fa-solid fa-clock-rotate-left"></i></a>
                                            @endif
                                        </td>
                                        <td class="p-0">
                                            {{ __($profile_type) }}
                                        </td>

                                        <td class="p-0">
                                            @if ($profile_type == 'Offeror')
                                                @if ($user->profile->banned_at)
                                                    <form class="form-unban-offeror"
                                                        action="{{ route('offerorRestv1.unban', $user->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('put')
                                                        <button type="submit" class="btn btn-main btn-sm py-0 px-1 fs-5"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Desbanear" style="width: 32.5px"><i
                                                                class="fa-solid fa-user-check"></i></button>
                                                    </form>
                                                @else
                                                    <a href="{{ route('offerorRestv1.ban', $user->id) }}"
                                                        class="btn-ban-offeror btn btn-danger btn-sm py-0 px-1 fs-5"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Banear"
                                                        style="width: 32.5px"><i class="fa-solid fa-user-slash"></i></a>
                                                @endif
                                            @else
                                                @if (substr(Auth::user()->profile_type, 11) == 'Moderator')

                                                <span data-bs-toggle="tooltip" title="No posee permisos para realizar esta acción." data-bs-placement="top">
                                                    <button disabled type="button" class="btn btn-danger btn-sm py-0 px-1 fs-5"
                                                     style="width: 32.5px"><i
                                                        class="fa-solid fa-trash"></i></button>
                                                </span>

                                                @else
                                                    <form action="{{ route('moderatorRestv1.destroy', $user->id) }}"
                                                        method="post" class="col-auto form-destroy-moderator">
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm py-0 px-1 fs-5"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Eliminar" style="width: 32.5px"><i
                                                                class="fa-solid fa-trash"></i></button>
                                                    </form>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endfor

                            </tbody>
                        </table>

                        {{ $users->links() }}
                    </div>
                @endif


            </section>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/js/user/admin/user/index.js'])
@endpush
