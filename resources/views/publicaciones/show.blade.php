@extends('layout.app')

@section('title', $publicacion->nombre)

@section('content')
    <section id="team" class="team section ">
        @if (isset($publicacion))
            <div class="container section-title pb-0" data-aos="fade-up">
                <h2>{{ $publicacion->nombre }}</h2>
                <p>Categoria: {{ $publicacion->categoria->name }}</p>
            </div>
            <div class="container">
                <div class="d-flex flex-column flex-md-row justify-content-start align-items-center align-items-md-start">
                    <div class="col-sm-12 col-md-3" data-aos="fade-up" data-aos-delay="50">
                        <div class="member text-center">
                            <a href="{{  $publicacion->portada }}" data-gallery="portfolio-gallery-app"
                                class="glightbox">
                                <img src="{{ $publicacion->portada }}" class="img-fluid"
                                    style="aspect-ratio: 9 / 16; object-fit: cover;" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="m-3 text-center text-md-start" data-aos="fade-up" data-aos-delay="50">
                        @if (count($publicacion->autor) > 0)
                            <p>
                                <span class="fs-5  text-uppercase"><b>Autores -
                                        {{ implode(', ', $publicacion->autor->toArray()) }}</b></span>
                            </p>
                        @endif
                        @if (count($publicacion->coordinadores) > 0)
                            <p>
                                <span class="fs-5  text-uppercase"><b>Corrdinadores:
                                        {{ implode(', ', $publicacion->coordinadores->toArray()) }}</b></span>
                            </p>
                        @endif
                        <p>
                            <span><b>ISBN: {{ $publicacion->isbn }}</b></span>
                        </p>
                        <p>
                            <span><b>Año de publicación: {{ $publicacion->anio_publicacion }}</b></span>

                        </p>
                        <p><span><b>Descripción: {!! str($publicacion->descripcion)->markdown()->sanitizeHtml() !!}</b></span></p>
                        <p class="text-end">
                            <a target="_blank" href="{{ route('ver-archivo', $publicacion->slug) }}"
                                class="btn btn-primary btn-sm">Descargar archivo</a>
                        </p>
                    </div>
                </div>
            </div>
        @else
            <h2>No se encontro la publicación que buscas ...</h2>
        @endif
    </section>
@endsection
