@extends('layout.app')

@section('title', $categoria->name)

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
            @if (!$publicaciones_items->isEmpty())
                <div class="text-center col-lg-1 my-1 py-1" data-aos="fade-up" data-aos-delay="50">
                    <h4 class="border-bottom my-1 py-1">Años</h4>
                    @foreach ($anios as $item => $value)
                        <a class="btn btn-primary btn-sm my-1" style="min-width: 100px;"
                            href=" {{ $url . '/' . $value->anio }}">
                            {{ $value->anio }} </a>
                    @endforeach
                </div>
                <div class="col-md-11 d-flex justify-content-evenly flex-wrap">
                    @foreach ($publicaciones_items as $item)
                        <div class="col-xl-3 col-md-5 col-sm-12 d-flex justify-content-center my-2 mx-1" data-aos="zoom-in"
                            data-aos-delay="50">
                            <div class="member text-center w-100">
                                <img style="max-height: 250px;aspect-ratio: 1 / 1  ;object-fit: cover; "
                                    src="{{ asset('storage/' . $item->imagen) }}" class="img-fluid" alt="">
                                <h6 class="mt-2">{{ Str::limit($item->nombre, 80) }}</h6>
                                <hr>

                                @php
                                    if (($key = array_search('', $item->autor->toArray())) !== false) {
                                        unset($item->autor[$key]);
                                    }

                                @endphp

                                @if (count($item->autor))
                                    <span
                                        class="fs-6 text-uppercase"><b>{{ implode(', ', $item->autor->toArray()) }}</b></span>
                                @else
                                    <span
                                        class="fs-6 text-uppercase"><b>{{ implode(', ', $item->coordinadores->toArray()) }}</b></span>
                                @endif

                                <p class="text-end">
                                    {{--
                                <span class="my-1  text-uppercase"><b>ISBN: {{ $item->isbn }}</b></span>
                                <span class="my-1 text-capitalize"><b>Corrdinadores: {{ $item->coordinadores }}</b></span>
                                <span class="my-1"><b>Año de publicación: {{ $item->anio_publicacion }}</b></span>
                                --}}
                                    <span><a href="{{ route('ver-publicacion', $item->slug) }}"
                                            class="btn btn-sm btn-primary mt-1">Ver
                                            más</a></span>
                                </p>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-sm-12 mt-2" data-aos="zoom-in" data-aos-delay="50">
                        {{ $publicaciones_items->links() }}
                    </div>
                </div>


            @endif


            @if ($publicaciones_items->isEmpty())
                <div data-aos="fade-up" data-aos-delay="50">
                    <h2>Aun no se han añadido publicaciones a esta categoria, próximamente se añadiran ...</h2>
                </div>
            @endif
        </div>
    </section>
@endsection
