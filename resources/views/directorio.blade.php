@extends('layout.app')

@section('title', 'Directorio')

@section('content')
    <section id="team" class="team section ">
        <!-- Section Title -->
        <div class="container section-title " data-aos="fade-up">
            <h2>{{ __('Directory') }}</h2>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row d-flex justify-content-center">
                @foreach ($directorio as $item)
                    <div class="col-sm-12 d-flex justify-content-center my-2" data-aos="fade-up" data-aos-delay="50">
                        <div
                            class="member d-flex w-100 flex-column flex-md-row  align-items-center justify-content-md-start">
                            <div style="max-width: 200px">
                                <img src="{{ $item->foto }}" class="w-100 m-1" alt=""
                                    style="border-radius: 30px 60px 0px;box-shadow: 1px 1px 8px 3px rgba(0, 0, 0, 0.1);">
                            </div>
                            <div class="mx-4 text-center text-md-start">
                                <h4 class="borde"><b>{{ $item->nombre }}</b></h4>
                                <span class="fs-5"><b>{{ $item->puesto }}</b></span>
                                <p>
                                    <span class="my-1"><b>Correo: {{ $item->correo }}</b></span> <br>
                                    <span class="my-1"><b>Teléfono: {{ $item->telefono }}</b></span><br>
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
