@extends('layout.app')

@section('content')
    <section id="team" class="team section ">
        @if (isset($publicacion))
            <!-- Section Title -->
            <div class="container section-title " data-aos="fade-up">
                <h2>{{ $publicacion->nombre }}</h2>
                <p>Categoria: {{ $publicacion->categoria->name }}</p>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="d-flex justify-content-start">
                    <div class="col-sm-12 col-md-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="member text-center">
                            <img src="{{ asset('storage/' . $publicacion->imagen) }}" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div>
                        <span class="fs-5"><b>Autor - {{ $publicacion->autor }}</b></span>
                        <p>
                            <span class="my-1"><b>ISBN: {{ $publicacion->isbn }}</b></span>
                        </p>
                        <p>
                            <span class="my-1"><b>Corrdinadores: {{ $publicacion->coordinadores }}</b></span>
                        </p>
                        <p>
                            <span class="my-1"><b>Año de publicación: {{ $publicacion->año_publicacion }}</b></span>

                        </p>
                        <p><span class="my-1"><b>Descripción: {{ $publicacion->descripcion }}</b></span></p>
                        <p>
                            <a href="{{ asset('storage/' . $publicacion->archivo) }}" target="_blank"
                                class="btn btn-primary btn-sm">Ver archivo</a>
                            <a href="{{ asset('storage/' . $publicacion->archivo) }}" download
                                class="btn btn-primary btn-sm">Descargar archivo</a>
                        </p>
                    </div>
                </div>
            </div>
        @else
            <h2>No se encontro la publicación que buscas ...</h2>
        @endif
    </section><!-- /Team Section -->
@endsection
