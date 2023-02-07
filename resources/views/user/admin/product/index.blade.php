@extends('layouts.app')

@section('content')
    <div class="container p-2">
        <div class="row g-0 justify-content-center">
            <section class="row col-12 col-md-11 g-0 justify-content-center">
                <header class="row mb-3 justify-content-between align-items-end">
                    <div class="col-auto">
                        <h1 class="fs-2 fw-bold mb-0">Productos</h1>
                    </div>

                    <div class="row col-sm-12 col-md-auto justify-content-start justify-content-md-end">
                        <span class="fw-bold col-auto pe-2">Ordernar por:</span>
                        <div class="col-auto ps-0" style="width: 140px">
                            <select class="form-select border-0 m-0 p-0" aria-label="Default select example">
                                <option selected>Más reciente</option>
                                <option value="1">Menos reciente</option>

                            </select>
                        </div>
                    </div>
                </header>
                <div class="table-responsive">
                    <table class="table table-sm bg-white border">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">#</th>
                                <th scope="col" class="text-center" style="width: 150px">Imagen</th>
                                <th scope="col" class="text-center">Datos</th>
                                <th scope="col" class="text-center" style="width: 150px">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="text-center align-middle" scope="row">1</th>
                                <td>
                                    <div class="container-img rounded">
                                        <img class="crop "
                                            src="https://cdn.pixabay.com/photo/2015/06/24/15/45/hands-820272_960_720.jpg"
                                            alt="">
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <strong>Categoría: </strong>
                                        <span>aa</span>
                                    </div>
                                    <div>
                                        <strong>Nombre: </strong>
                                        <span>aa</span>
                                    </div>
                                    <div>
                                        <strong>Descripción: </strong>
                                        <span>aaaaaaaaaaa aaaaa aaaaaaaa</span>
                                    </div>
                                    <div>
                                        <strong>Celular: </strong>
                                        <span>0983670287 <i class="fa-brands fa-whatsapp fs-5 text-success"></i></span>
                                    </div>
                                    <div >
                                        <span class="text-secondary">Publicado por:
                                            <a href="#">UserName</a>
                                        </span>
                                        <br class=" ">
                                        <span class="text-secondary">Publicado el: 4/2/2023, 22:57:33</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="row g-0 align-items-center" style="height: 150px">
                                        <div class="row g-0 justify-content-center">
                                            <div class="col-auto mx-1">
                                                <a href="" class="btn btn-main"><i class="fa-solid fa-eye"></i></a>
                                            </div>
                                            <div class="col-auto mx-1">
                                                <a href="" class="btn btn-danger" style="width: 42.19px"><i
                                                        class="fa-solid fa-user-slash"></i></a>
                                            </div>
                                            <div class="w-100 my-1"></div>
                                            <div class="col-auto mx-1">
                                                <a href="" class="btn btn-danger" style="width: 42.19px"><i
                                                        class="fa-solid fa-trash-can"></i></a>
                                            </div>
                                            <div class="col-auto mx-1" style="width: 42.19px">

                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </section>
        </div>
    </div>
@endsection
