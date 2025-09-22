@extends('layout.app')

@section('title', 'Busqueda')

@section('content')
    <section id="team" class="team section ">
        <div class="container section-title " data-aos="fade-up">
            <h2>Busqueda - {{ $buscado }}</h2>
        </div><!-- End Section Title -->
        <div class="container d-flex flex-column">
            <div class=" col-md-12 d-flex justify-content-evenly flex-wrap">
                @foreach ($resultados as $item)
                    <div class=" member col-sm-12 d-flex justify-content-center m-1" data-aos="fade-up" data-aos-delay="50">
                        <div class="">
                            <img style="height: 250px;aspect-ratio: 1 / 1  ;object-fit: cover; "
                                src="{{ $item->portada }}" class="img-fluid rounded" alt="">
                        </div>
                        <div class="d-flex flex-column justify-content-between ext-start w-100 mx-3">
                            <p>
                                <span class="fs-5 text-uppercase"><b>Titulo: {{ $item->titulo }}</b> </span> <br>
                                <span class="my-1 text-uppercase">Tipo: {{ $item->tipo_contenido }}</span>
                            </p>
                            <p class="text-end">
                                <a href="{{ $item->enlace }}" class="btn-sm btn btn-primary mt-1">Ver más</a>
                            </p>
                        </div>
                    </div><!-- End Team Member -->
                @endforeach
            </div>
            <div class="my-2">
                {{ $resultados->links() }}
            </div>

        </div>
        @if ($resultados->isEmpty())
            <div class="container">
                <h2>Aun no se han añadido publicaciones con lo que estas buscando, próximamente se añadiran ...</h2>
            </div>
        @endif
    </section><!-- /Team Section -->
@endsection
