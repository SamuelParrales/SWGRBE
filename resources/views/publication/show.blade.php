@extends('layouts.app')

@section('title', 'Publicaciones')
@push('styles')
    <style>
        .comment-content {
            display: none;
        }

        .comment-content.show {
            display: block;
        }

        .show+.comment-form {
            display: none
        }
    </style>
@endpush


<!--Section: Newsfeed-->
@section('content')

    <div class="container">
        <section class="row justify-content-center">
            <div class="card" style="max-width: 42rem">
                <div class="card-body">
                    <!-- Data -->
                    <div class="d-flex mb-3">
                        <div style="font-size:30px;margin: 0 5px;">
                            <i class="fa-solid fa-circle-user"></i>
                        </div>
                        <div>
                            <a href="" class="text-dark mb-0">
                                <strong>{{ $publication->user->username }}</strong>
                            </a>
                            <a href="" class="text-muted d-block" style="margin-top: -6px">
                                <small>{{ $publication->updated_at }}</small>
                            </a>
                        </div>
                    </div>
                    <!-- Description -->
                    <div>
                        <p>
                            {{ $publication->content }}
                        </p>
                    </div>
                </div>

                <!-- Interactions -->
                <div class="card-body">
                    <!-- Reactions -->
                    <div class="d-flex justify-content-end mb-3">
                        {{-- <div>
                <a href="">
                  <i class="fas fa-thumbs-up text-primary"></i>
                  <i class="fas fa-heart text-danger"></i>
                  <span>124</span>
                </a>
              </div> --}}
                        <div>
                            <a class="text-muted"> {{ count($publication->comments) }} Comentarios </a>
                        </div>
                    </div>
                    <!-- Reactions -->

                    <!-- Buttons -->
                    <div class="d-flex justify-content-center text-center border-top border-bottom mb-4">
                        {{-- <button type="button" class="btn btn-link btn-lg" data-mdb-ripple-color="dark">
                <i class="fas fa-thumbs-up me-2"></i>Like
              </button> --}}
                        <button type="button" class="btn btn-link btn-lg" data-mdb-ripple-color="dark">
                            <i class="fas fa-comment-alt me-2"></i>Comentarios
                        </button>
                        {{-- <button type="button" class="btn btn-link btn-lg" data-mdb-ripple-color="dark">
                <i class="fas fa-share me-2"></i>Share
              </button> --}}
                    </div>
                    <!-- Buttons -->

                    <!-- Comments -->

                    <!-- Input -->
                    <div class="d-flex mb-3">

                        <form method="POST" action="{{ route('comment.store') }}" class="form-outline w-100">
                            @csrf
                            <input class="d-none" type="text" name="publication_id" value="{{ $publication->id }}" />
                            <textarea name="content" class="form-control enter-submit" rows="2"></textarea>
                            <label class="form-label" for="textAreaExample">Escribe un comentario</label>
                        </form>
                    </div>
                    <!-- Input -->

                    @foreach ($publication->comments as $c)
                        <!-- Comments -->
                        <div class="d-flex mb-3 w-100 comment-card">
                            <div style="font-size:30px;margin: 0 5px;">
                                <i class="fa-solid fa-circle-user"></i>
                            </div>
                            <div class="w-100">
                                <div class="bg-light rounded-3 px-3 py-1 w-100">
                                    <a href="" class="text-dark mb-0">
                                        <strong>{{ $c->user->username }}</strong>
                                    </a>
                                    @guest
                                    @elseif ($c->user_id == Auth::user()->id)
                                        <a href="#!" class="edit-comment link-muted"><i
                                                class="fas fa-pencil-alt ms-2"></i></a>
                                        <a
                                            href="{{route('commentRestv1.destroy',$c->id)}}"
                                            class="delete-comment link-muted"><i class="fa-solid fa-trash ms-2"></i>
                                        </a>
                                    @endguest
                                    <p class="text-muted comment-content show">
                                        <small>{{ $c->content }}</small>
                                    </p>
                                    <form
                                        class="publication-form w-100 comment-form"
                                        action="{{ route('comment.update', $c->id) }}"
                                        method="POST"
                                    >
                                        @csrf
                                        @method('PUT')
                                        <div class=" form-floating w-100">
                                            <textarea class="form-control w-100 enter-submit" style="height: 75px" name="content" placeholder=" ">{{ $c->content }}</textarea>
                                            <label>Comentario</label>
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                    @endforeach


                </div>
                <!-- Interactions -->
            </div>
        </section>
    </div>

    <!--Section: Newsfeed-->


@endsection

@push('scripts')
    @vite(['resources/js/publication/show.js'])
@endpush
