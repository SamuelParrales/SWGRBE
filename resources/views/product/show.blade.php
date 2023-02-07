@extends('layouts.app')


@section('content')
    <div class="container">
        <section class="row p-3 g-0 bg-white border rounded">
            <div class="col-12 col-md-7 pe-3 ">
                <div class="d-block" style="position: relative; height: 400px;">
                    <ul id="images" class="d-none">
                        <li><img src="https://cdn.pixabay.com/photo/2015/06/24/15/45/hands-820272_960_720.jpg"
                                alt="Picture 1"></li>
                        <li><img src="https://cdn.pixabay.com/photo/2015/06/24/15/45/hands-820272_960_720.jpg"
                                alt="Picture 2"></li>
                    </ul>

                </div>
            </div>
            <div class="row g-0 col-12 col-md-5 p-3 border rounded">
                <header class="mb-3" >
                    <h1 class="fs-3 mb-0 pb-0">Licuadora</h1>
                    <span class="text-secondary">Publicado por:
                        <a
                            id="link-username"
                            data-username="DragónUli"
                            data-name="Ulises"
                            data-last_name="Delgado"
                            href=""
                        >UserName
                        </a>
                    </span>
                </header>
                <div >
                    <p class="pb-0 mb-0">Esta es una descripción</p>
                </div>
                <hr >
                <div class="col">
                    <a href="#" class=" btn btn-sm btn-main  py-0 fs-5"><i class="fa-brands fa-whatsapp"></i></a>
                    <a href="" class="btn">0987654321</a>
                </div>
                <div class="row g-0 h-50 align-items-end justify-content-end">
                    <div class="col-auto mt-auto">
                        <a id="btn-report" class="btn btn-danger" href=""><i class="fa-solid fa-flag"></i> Reportar</a>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    @vite(['resources/js/product/show.js'])
@endpush
