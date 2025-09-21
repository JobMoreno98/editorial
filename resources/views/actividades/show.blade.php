@extends('layout.app')

@section('title', $actividad->nombre)

@section('content')
    <section id="team" class="team section ">
        @if (isset($actividad))
            <div class="container section-title pb-0" data-aos="fade-up">
                <h2>{{ $actividad->nombre }}</h2>
                <p>Fecha: {{ $actividad->fecha }}</p>
            </div>
            <div class="container">
                <div class="d-flex flex-column flex-md-row justify-content-start align-items-center align-items-md-start">
                    <div class="col-sm-12 col-md-3" data-aos="fade-up" data-aos-delay="50">
                        <div class="member text-center">
                            <a href="{{ asset('storage/' . $actividad->imagen) }}" data-gallery="portfolio-gallery-app"
                                class="glightbox">
                                <img src="{{ asset('storage/' . $actividad->imagen) }}" class="img-fluid"
                                    style="aspect-ratio: 9 / 16; object-fit: cover;" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="m-3 text-center text-md-start" data-aos="fade-up" data-aos-delay="50">
                        <p><span><b>Descripción:</b> {!! str($actividad->descripcion)->markdown()->sanitizeHtml() !!}</span></p>
                    </div>
                </div>
            </div>
        @else
            <h2>No se encontro la publicación que buscas ...</h2>
        @endif
    </section>
@endsection
