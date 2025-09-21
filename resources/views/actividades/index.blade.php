@extends('layout.app')

@section('title', 'Actividades | ' . $tipo)

@section('content')
    <section id="team" class="team section ">
        <!-- Section Title -->
        <div class="container section-title " data-aos="fade-up">
            <h2 class="text-uppercase">{{ $tipo . 's' }}</h2>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row d-flex justify-content-center">
                @foreach ($actividades as $item)
                    <div class="col-sm-12 d-flex justify-content-center my-2" data-aos="fade-up" data-aos-delay="50">
                        <div
                            class="member d-flex w-100 flex-column flex-md-row  align-items-center justify-content-md-start">
                            <div style="max-width: 200px">
                                <img src="{{ asset('storage/' . $item->imagen) }}"
                                    style="max-height: 250px;aspect-ratio: 1 / 1  ;object-fit: cover; border-radius:15px 15px 0px 0px; "class="w-100 x-heroicon-m-x-circle-1"
                                    alt="">
                                <h5 class="fecha text-center">{{ $item->fecha }}</h5>
                            </div>
                            <div class="mx-3 text-center text-md-start">
                                <h4>{{ $item->nombre }}</h4>
                            <span><a href="{{ route('ver-publicacion', $item->slug) }}"
                                            class="btn btn-sm btn-primary mt-1">Ver
                                            más</a></span>
                            </div>

                        </div>
                    </div><!-- End Team Member -->
                @endforeach
                <div class="col-sm-12 mt-2" data-aos="zoom-in" data-aos-delay="50">
                    {{ $actividades->links() }}
                </div>

            </div>
        </div>
    </section><!-- /Team Section -->
@endsection
