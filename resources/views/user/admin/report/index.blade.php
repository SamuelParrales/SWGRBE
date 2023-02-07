@extends('layouts.app')

@section('content')
    <div class="container p-2">
        <div class="row g-0 justify-content-center">
            <section class="row col-12 col-md-11 g-0 justify-content-center">
                <header class="row mb-3 justify-content-between align-items-end">
                    <div class="col-auto">
                        <h1 class="fs-2 fw-bold mb-0">Reportes</h1>
                    </div>
                    <form class="row g-0 col-9 col-sm-7 col-md-6 col-lg-5 justify-content-start justify-content-md-end">
                        <div class="col-auto pe-2">
                            <span class="fw-bold col-auto pe-2">Ordernar por:</span>
                            <div class="col-auto ps-0" style="width: 140px">
                                <select class="form-select border-0 m-0 p-0" aria-label="Default select example">
                                    <option selected>Más reciente</option>
                                    <option value="1">Menos reciente</option>

                                </select>
                            </div>
                        </div>
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
                                <th scope="col" class="text-center">Razón</th>
                                <th scope="col" class="text-center">{{__('User')}}</th>
                                <th scope="col" class="text-center">Producto</th>
                                <th scope="col" class="text-center">Publicado</th>
                                <th scope="col" class="text-center">Opciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <th class="text-center align-middle" scope="row">1</th>
                                <td>
                                    Violencia
                                </td>
                                <td >
                                    UserPrueba
                                </td>

                                <td>
                                    Offeror
                                </td>
                                <td>
                                    10-02-2022
                                </td>
                                <td class="p-0 ">
                                    <a href="" class="btn btn-primary btn-sm py-0 px-1 fs-5" style="width: 32.5px"><i class="fa-solid fa-envelope-open-text"></i></a>
                                    <a href="" class="btn btn-danger btn-sm py-0 px-1 fs-5" style="width: 32.5px"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </section>
        </div>
    </div>
@endsection
