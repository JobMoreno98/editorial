@extends('layout.app')

@section('title', 'Busqueda')

@section('content')
    <section id="team" class="team section ">
        <div class="container section-title " data-aos="fade-up">
            <h2 class="text-uppercase">Palabra buscada - {{ $buscado }}</h2>
        </div><!-- End Section Title -->
        <div class="container d-flex flex-column flex-lg-row">
            <div class=" col-md-11 d-flex justify-content-evenly flex-wrap">
                @foreach ($result as $item)
                    <div class="  col-sm-12 d-flex justify-content-center m-1" data-aos="fade-up" data-aos-delay="50">
                        <div class="member">
                            <img style="max-height: 250px;aspect-ratio: 1 / 1  ;object-fit: cover; "
                                src="{{ asset('storage/' . $item->imagen) }}" class="img-fluid rounded" alt="">
                        </div>
                        <div class="text-start w-100 mx-3">
                            <p>
                                <span class="fs-5 text-uppercase">{{ $item->nombre }}</span> <br>
                                @if (count($item->autor) > 0)
                                    <span class="fs-5  text-uppercase"><b>Autores -
                                            {{ implode(', ', $item->autor->toArray()) }}</b></span>
                                @endif
                                @if (count($item->coordinadores) > 0)
                                    <span class="my-1  text-uppercase"><b>ISBN: {{ $item->isbn }}</b></span><br>

                                    @php
                                        $coordinadores = json_decode($item->coordinadores, true);
                                    @endphp

                                    <span class="my-1 text-capitalize"><b>

                                            @if (is_array($coordinadores))
                                                Coordinadores: {{ implode(', ', $coordinadores) }}
                                            @else
                                                Coordinadores: {{ $item->coordinadores }}
                                            @endif
                                        </b></span>
                                @endif
                                <br>
                                <span class="my-1"><b>Año de publicación: {{ $item->anio_publicacion }}</b></span>
                            </p>
                            <p class="text-end">
                                <a href="{{ route('ver-publicacion', $item->slug) }}"
                                    class="btn-sm btn btn-primary mt-1">Ver
                                    más</a>
                            </p>
                        </div>
                    </div><!-- End Team Member -->
                @endforeach
            </div>
            <div>
                {{ $result->links() }}
            </div>

        </div>
        @if ($result->isEmpty())
            <div class="container">
                <h2>Aun no se han añadido publicaciones con lo que estas buscando, próximamente se añadiran ...</h2>
            </div>
        @endif
    </section><!-- /Team Section -->
@endsection
