@extends('layout.app')

@section('content')
    <section id="team" class="team section ">

        <!-- Section Title -->
        <div class="container section-title " data-aos="fade-up">
            <h2>Publicaciones de la categoria - {{ $categoria->name }}</h2>
            <p>{{ $categoria->descripcion }}</p>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row gy-4 d-flex justify-content-center">
                @foreach ($publicaciones_items as $item)
                    <div class="col-xl-3 col-md-6 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                        <div class="member text-center">
                            <img style="max-height: 250px;aspect-ratio: 1 / 1  ;object-fit: cover; "
                                src="{{ asset('storage/' . $item->imagen) }}" class="img-fluid" alt="">
                            <h4>{{ $item->nombre }}</h4>
                            <span class="fs-5"><b>Autor - {{ $item->autor }}</b></span>
                            <p>
                                <span class="my-1"><b>ISBN: {{ $item->isbn }}</b></span>
                                <span class="my-1"><b>Corrdinadores: {{ $item->coordinadores }}</b></span>
                                <span class="my-1"><b>Año de publicación: {{ $item->año_publicacion }}</b></span>
                                <span><a href="{{ route('ver-publicacion', $item->slug) }}" class="mt-1">Ver más</a></span>
                            </p>
                        </div>
                    </div><!-- End Team Member -->
                @endforeach
            </div>
            <div>
                {{ $publicaciones_items->links() }}
            </div>
            @if ($publicaciones_items->isEmpty())
                <h2>Aun no se han añadido publicaciones a esta categoria, próximamente se añadiran ...</h2>
            @endif
        </div>
    </section><!-- /Team Section -->
@endsection
