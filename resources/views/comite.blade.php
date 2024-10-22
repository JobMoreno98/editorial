@extends('layout.app')
@section('title', 'Consejo Editorial')
@section('content')
    <section id="team" class="team section ">

        <!-- Section Title -->
        <div class="container section-title " data-aos="fade-up">
            <h2>Consejo Editorial</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row d-flex justify-content-center">
                @foreach ($comite as $item)
                    <div class="col-sm-12 d-flex  justify-content-center " data-aos="fade-up" data-aos-delay="50">
                        <div class="member d-flex w-100 flex-column flex-md-row  align-items-center justify-content-md-start">
                            <div style="min-width: 150px;max-width:150px">
                                <img src="{{ asset('storage/' . $item->image) }}" class="w-100 m-1" alt="">
                            </div>
                            <div class="mx-3">
                                <h4 class="border-bottom my-2 py-2 text-center text-md-start">{{ $item->nombre }}</h4>
                                <p style="text-align: justify">
                                    <b>Reseña</b> <br> {{ $item->reseña }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Team Member -->
                @endforeach
            </div>
        </div>
    </section><!-- /Team Section -->
@endsection