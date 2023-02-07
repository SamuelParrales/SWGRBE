@extends('layouts.app')

@section('content')
    <div class="container p-2">
        <div class="row g-0 justify-content-center">
            <section class="row col-12 col-md-11 g-0 justify-content-center">
                <header class="row mb-3 justify-content-between align-items-end">
                    <div class="col-auto">
                        <h1 class="fs-2 fw-bold mb-0">Usuarios</h1>
                    </div>
                    <form class="row g-0 col-9 col-sm-7 col-md-4 col-lg-3 justify-content-start justify-content-md-end">
                        <div class=" m-0 col ">
                            <label class="form-label mb-0 fw-bold">{{__('Username')}}: </label>
                            <div class="row g-0">
                                <div class="col">
                                    <input class="form-control bg-white"  placeholder="Usuario">
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-main"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                            </div>
                        </div>


                    </form>
                </header>
                <div class="table-responsive">
                    <table class="table table-sm bg-white border">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">#</th>
                                <th scope="col" class="text-center">{{__('User')}}</th>
                                <th scope="col" class="text-center">{{__('Name')}}</th>
                                <th scope="col" class="text-center">{{__('Last name')}}</th>
                                <th scope="col" class="text-center">Correo</th>
                                <th scope="col" class="text-center">{{__('Role')}}</th>
                                <th scope="col" class="text-center">Opciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <th class="text-center align-middle" scope="row">1</th>
                                <td>
                                    UserPrueba
                                </td>
                                <td>
                                    User
                                </td>
                                <td>
                                    Prueba
                                </td>
                                <td>
                                    UserPrueba@mail.com
                                </td>
                                <td>
                                    Offeror
                                </td>
                                <td class="p-0">
                                    <a href="" class="btn btn-danger btn-sm py-0 px-1 fs-5" style="width: 32.5px"><i class="fa-solid fa-user-slash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </section>
        </div>
    </div>
@endsection
