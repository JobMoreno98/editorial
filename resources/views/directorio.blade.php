@extends('layout.app')

@section('content')
    <section id="team" class="team section ">

        <!-- Section Title -->
        <div class="container section-title " data-aos="fade-up">
            <h2>Our Team</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row gy-4 d-flex justify-content-center">
                @foreach ($directorio as $item)
                    <div class="col-xl-3 col-md-6 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid" alt="">
                            <h4>{{ $item->nombre }}</h4>
                            <span class="fs-5"><b>{{ $item->puesto }}</b></span>
                            <p>
                                <span class="my-1"><b>Correo: {{ $item->correo }}</b></span>
                                <span class="my-1"><b>Teléfono: {{ $item->telefono }}</b></span>
                                <span class="my-1"><b>Dirección: {{ $item->direccion }}</b></span>
                            </p>
                        </div>
                    </div><!-- End Team Member -->
                @endforeach
            </div>
        </div>
    </section><!-- /Team Section -->
@endsection
