@extends('layout.app')

@section('title', $tipo . 's')

@section('content')
    <section id="team" class="team section ">
        <div class="container section-title " data-aos="fade-up">
            <h2 class="text-uppercase">{{ $tipo . 's' }}</h2>
        </div>
        <div class=" d-flex flex-wrap justify-content-center">
            @foreach ($revistas as $item)
                <div class="col-sm-12 col-md-4 d-flex m-1 justify-content-center" data-aos="zoom-in" data-aos-delay="50">
                    <div class="member d-flex w-100 flex-column flex-xl-row  align-items-center justify-content-md-start">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/' . $item->image) }}"
                                style="aspect-ratio: 9 / 16; object-fit: cover;  max-width: 250px" class="w-100 m-1 rounded"
                                alt="">
                        </div>
                        <div class="mx-3 d-flex flex-column h-100 justify-content-between">
                            <div>
                                <h4 class="border-bottom my-2 py-2">{{ $item->nombre }}</h4>
                                <p style="text-align: justify">
                                    <b>Reseña</b> <br> {{ $item->descripcion }}
                                </p>
                            </div>
                            <p class="text-center text-md-end">
                                <a target="_blank" href="{{ $item->url }}" class="btn btn-sm btn-primary">Visitar</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="container">
            <div class="col-sm-12 mt-2" data-aos="zoom-in" data-aos-delay="50">
                {{ $revistas->links() }}
            </div>
        </div>
    </section>
@endsection
