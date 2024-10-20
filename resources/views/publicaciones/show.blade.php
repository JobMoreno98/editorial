@extends('layout.app')

@section('title', $publicacion->nombre)

@section('content')
    <section id="team" class="team section ">
        @if (isset($publicacion))
            <!-- Section Title -->
            <div class="container section-title pb-0" data-aos="fade-up">
                <h2>{{ $publicacion->nombre }}</h2>

                <p>Categoria: {{ $publicacion->categoria->name }}</p>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="d-flex flex-column flex-md-row justify-content-start align-items-center align-items-md-start">
                    <div class="col-sm-12 col-md-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="member text-center">
                            <a href="{{ asset('storage/' . $publicacion->imagen) }}" data-gallery="portfolio-gallery-app"
                                class="glightbox">
                                <img src="{{ asset('storage/' . $publicacion->imagen) }}" class="img-fluid"
                                    style="aspect-ratio: 9 / 16; object-fit: cover;" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="m-3 text-center text-md-start" data-aos="fade-up" data-aos-delay="100">
                        <p>
                            <span class="fs-5  text-uppercase"><b>Autor - {{ $publicacion->autor }}</b></span>
                        </p>

                        <p>
                            <span><b>ISBN: {{ $publicacion->isbn }}</b></span>
                        </p>
                        <p>
                            <span><b>Corrdinadores: {{ $publicacion->coordinadores }}</b></span>
                        </p>
                        <p>
                            <span><b>Año de publicación: {{ $publicacion->anio_publicacion }}</b></span>

                        </p>
                        <p><span><b>Descripción: {!! str($publicacion->descripcion)->markdown()->sanitizeHtml() !!}</b></span></p>
                        <p class="text-end">
                            <a target="_blank" href="{{ route('ver-archivo', $publicacion) }}"
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
