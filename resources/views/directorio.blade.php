@extends('layout.app')

@section('title','Directorio')

@section('content')
    <section id="team" class="team section ">
        <!-- Section Title -->
        <div class="container section-title " data-aos="fade-up">
            <h2>{{ __('Directory') }}</h2>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row d-flex justify-content-center">
                @foreach ($directorio as $item)
                    <div class="col-sm-12 d-flex justify-content-center my-2" data-aos="fade-up" data-aos-delay="100">
                        <div class="member d-flex w-100 flex-column flex-md-row  align-items-center justify-content-md-start">
                            <div style="max-width: 200px">
                                <img src="{{ asset('storage/' . $item->image) }}" class="w-100 m-1" alt="">
                            </div>
                            <div class="mx-3 text-center text-md-start">
                                <h4>{{ $item->nombre }}</h4>
                                <span class="fs-5"><b>{{ $item->puesto }}</b></span>
                                <p>
                                    <span class="my-1"><b>Correo: {{ $item->correo }}</b></span>
                                    <span class="my-1"><b>Teléfono: {{ $item->telefono }}</b></span>
                                    <span class="my-1"><b>Dirección: {{ $item->direccion }}</b></span>
                                </p>
                            </div>

                        </div>
                    </div><!-- End Team Member -->
                @endforeach
            </div>
        </div>
    </section><!-- /Team Section -->
@endsection
