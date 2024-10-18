@extends('layout.app')
@section('title', 'Publicaciones')
@section('content')
    <section id="team" class="team section ">
        <!-- Section Title -->
        <div class="container section-title " data-aos="fade-up">
            <h2 class="text-uppercase">{{ $categoria->name }}</h2>
            <p>{{ $categoria->descripcion }}</p>
        </div><!-- End Section Title -->
        <div class="container my-2">

        </div>
        <div class="container d-flex flex-column flex-lg-row">
            <div class="text-center col-lg-1 my-1 py-1">
                <h4 class="border-bottom my-1 py-1">Años</h4>
                @foreach ($anios as $item => $value)
                    <a class="btn btn-primary btn-sm my-1" style="min-width: 100px;" href=" {{ $url . '/' . $value->anio }}">
                        {{ $value->anio }} </a>
                @endforeach
            </div>
            <div class="col-md-11 d-flex justify-content-evenly flex-wrap">
                @foreach ($publicaciones_items as $item)
                    <div class="col-xl-3 col-md-5 col-sm-12 d-flex justify-content-center m-1" data-aos="fade-up"
                        data-aos-delay="100">
                        <div class="member text-center w-100">
                            <img style="max-height: 250px;aspect-ratio: 1 / 1  ;object-fit: cover; "
                                src="{{ asset('storage/' . $item->imagen) }}" class="img-fluid" alt="">
                            <h4>{{ $item->nombre }}</h4>
                            <span class="fs-5 text-uppercase"><b>{{ $item->autor }}</b></span>
                            <p>
                                <span class="my-1  text-uppercase"><b>ISBN: {{ $item->isbn }}</b></span>
                                <span class="my-1 text-capitalize"><b>Corrdinadores: {{ $item->coordinadores }}</b></span>
                                <span class="my-1"><b>Año de publicación: {{ $item->anio_publicacion }}</b></span>
                                <span><a href="{{ route('ver-publicacion', $item->slug) }}" class="mt-1">Ver
                                        más</a></span>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div>
                {{ $publicaciones_items->links() }}
            </div>
            @if ($publicaciones_items->isEmpty())
                <h2>Aun no se han añadido publicaciones a esta categoria, próximamente se añadiran ...</h2>
            @endif
        </div>
    </section>
@endsection
