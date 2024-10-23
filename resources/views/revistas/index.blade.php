@extends('layout.app')

@section('title','Revistas Cientificas')

@section('content')
    <section id="team" class="team section ">
        <!-- Section Title -->
        <div class="container section-title " data-aos="fade-up">
            <h2>Revistas Cientificas</h2>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row gy-4 d-flex justify-content-center">
                @foreach ($revistas as $item)
                    <div class="col-sm-12 col-md-6 d-flex  justify-content-center" data-aos="zoom-in" data-aos-delay="50">
                        <div
                            class="member d-flex w-100 flex-column flex-md-row  align-items-center justify-content-md-start">
                            <div style="width: 250px !important">
                                <img src="{{ asset('storage/' . $item->image) }}" class="w-100 m-1" alt="">
                            </div>
                            <div class="mx-3">
                                <h4 class="border-bottom my-2 py-2">{{ $item->nombre }}</h4>
                                <p style="text-align: justify">
                                    <b>Reseña</b> <br> {{ $item->descripcion }}
                                </p>
                                <p class="text-end">
                                    <a href="{{ $item->url }}" class="btn btn-sm btn-primary">Visitar</a>
                                </p>
                            </div>
                        </div>
                    </div><!-- End Team Member -->
                @endforeach
            </div>
        </div>
    </section><!-- /Team Section -->
@endsection
