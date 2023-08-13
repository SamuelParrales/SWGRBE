@extends('layouts.app')

@section('title', 'Publicaciones')
@push('styles')
    <style>
        .publication-content{
            display: none;
        }
        .publication-content.show{
            display: block;
        }
        .show + .publication-form{
            display: none
        }
        .button-link-muted{
            padding: 0;
            background-color: transparent ;
            border:none;
        }
    </style>
@endpush
@section('content')
    <div class="container">
        <header class="d-flex mb-2">
            <h1 class="fs-2 fw-bold mb-0">Publicaciones</h1>
        </header>
        {{-- New feed --}}
        <div class="row justify-content-center mb-2">
            <div class="card shadow-0 col-12 col-md-19 col-lg-6">
                <form action="{{route('publication.store')}}" method="POST" class="card-body border-bottom pb-2">
                    <div class="d-flex mb-2">
                        <div class="d-flex align-items-center w-100 ">
                            <div  class="w-100">
                                @csrf
                                <div class="form-floating">
                                    <textarea
                                        required
                                        class="form-control"
                                        style="height: 75px"
                                        name="content"
                                        placeholder=" "
                                        ></textarea>
                                    <label>¿Que estás buscando?</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <button type="submit" class="btn btn-main btn-rounded">Publicar</button>
                    </div>
                </form>
            </div>
        </div>

        <section class="row d-flex justify-content-center mb-4">
            <div class="col-md-12 col-lg-10">
                <h4 class="mb-2">Publicaciones recientes</h4>
                <div class="card text-dark ">
                    @foreach ($publications as $p)
                    <div class="card-body p-4 publication-card">
                        <div class="d-flex flex-start">
                            <div style="font-size:30px;margin: 0 5px;">
                                <i class="fa-solid fa-circle-user"></i>
                            </div>
                            <div class="w-100">
                                <h6 class="fw-bold mb-1">{{$p->user->username}}</h6>
                                <div class="d-flex align-items-center mb-3">
                                    <p class="mb-0">
                                        {{$p->updated_at}}

                                    </p>
                                    <a href="{{route('publication.show',$p->id)}}"><i class="fa-solid fa-comments ms-2"></i></a>
                                    @guest
                                    @elseif ($p->user_id==Auth::user()->id)
                                    <a href="#!" class="edit-publication link-muted"><i class="fas fa-pencil-alt ms-2"></i></a>
                                    <a
                                        href="{{route('publicationRestv1.destroy',$p->id)}}"
                                        class="delete-publication link-muted"><i class="fa-solid fa-trash ms-2"></i>
                                    </a>
                                    @endguest
                                    {{-- <a href="#!" class="link-muted"><i class="fas fa-heart ms-2"></i></a> --}}
                                </div>
                                <p class="publication-content mb-0 show">
                                    {{$p->content}}
                                </p>
                                <form
                                    class="publication-form"
                                    action="{{route('publicationRestv1.update',$p->id)}}">
                                    @method('PUT')
                                    <input class="d-none"  type="text" name="id" value="{{$p->id}}">
                                    <div class=" form-floating w-100">
                                        <textarea
                                        class="form-control w-100"
                                        style="height: 75px"
                                        name="content"
                                        placeholder=" "
                                        >{{$p->content}}</textarea>
                                        <label>¿Que estabas buscando?</label>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <button type="submit" class="btn btn-main btn-rounded">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    @endforeach

                </div>
            </div>
        </section>
        {{$publications->links()}}
    </div>
    {{-- End New feed --}}
@endsection

@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/js/publication/index.js'])
@endpush
