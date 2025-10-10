@extends('layout.app')
@section('title', 'Inicio')
@section('content')
    <section id="hero" class="hero section accent-background">
        <div class="container position-relative" id="contenedor-banner" data-aos="zoom-in" data-aos-delay="50">
            <div class="row gy-5 justify-content-between">
                <div class="col-sm-12 order-2 order-lg-1 d-flex flex-column justify-content-center banner p-0 pb-xl-3">
                    <img src="{{ isset($site->image_banner) ? asset('storage/' . $site->image_banner) : asset('img/banner.jpg') }}"
                        class="h-100 img-banner" alt="">
                </div>
            </div>
        </div>

    </section><!-- /Hero Section -->
    <!-- About Section -->
    <section id="about" class="about section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="zoom-in">
            <h2>{{ __('About Us') }}<br></h2>
            <p style="text-align: justify">{!! isset($site->about) ? $site->about : 'Aquí va la descripción de la página' !!}</p>
        </div><!-- End Section Title -->

        {{--  
        <div class="container">

            <div class="row gy-4">
                <div class="col-lg-6" style="text-align: justify" data-aos="zoom-in" data-aos-delay="50">
                    <h3>Voluptatem dignissimos provident laboris nisi ut aliquip ex ea commodo</h3>
                    <!--<img src="assets/img/about.jpg" class="img-fluid rounded-4 mb-4" alt="">-->
                    <p>Ut fugiat ut sunt quia veniam. Voluptate perferendis perspiciatis quod nisi et. Placeat
                        debitis quia recusandae odit et consequatur voluptatem. Dignissimos pariatur consectetur
                        fugiat voluptas ea.</p>
                    <p>Temporibus nihil enim deserunt sed ea. Provident sit expedita aut cupiditate nihil vitae quo
                        officia vel. Blanditiis eligendi possimus et in cum. Quidem eos ut sint rem veniam qui. Ut
                        ut repellendus nobis tempore doloribus debitis explicabo similique sit. Accusantium sed ut
                        omnis beatae neque deleniti repellendus.</p>
                </div>
                <div class="col-lg-6" style="text-align: justify" data-aos="zoom-in" data-aos-delay="50">
                    <div class="content ps-0 ps-lg-5">
                        <p class="fst-italic">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore
                            magna aliqua.
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle-fill"></i> <span>Ullamco laboris nisi ut aliquip ex ea
                                    commodo consequat.</span></li>
                            <li><i class="bi bi-check-circle-fill"></i> <span>Duis aute irure dolor in
                                    reprehenderit in voluptate velit.</span></li>
                            <li><i class="bi bi-check-circle-fill"></i> <span>Ullamco laboris nisi ut aliquip ex ea
                                    commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta
                                    storacalaperda mastiro dolore eu fugiat nulla pariatur.</span></li>
                        </ul>
                        <p>
                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                            reprehenderit in voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident
                        </p>
                    </div>
                </div>
            </div>

        </div>
--}}
    </section><!-- /About Section -->

    @if (!$novedades->isEmpty())
        <section id="novedades" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
            <div class="container text-center">
                <h3 class="my-2 py-2 "> Novedades</h3>
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @foreach ($novedades as $item)
                            <div class="swiper-slide h-100 p-3 rounded border shadow-sm d-flex flex-column justify-content-start"
                                style="min-width:250px;min-height:300px;">
                                <div class=" h-100 text-center w-100">
                                    <img style="height: 250px;aspect-ratio: 1 / 1  ;object-fit: cover; "
                                        src="{{ $item->portada }}" class="img-fluid rounded" alt="">
                                    <div class="fs-6">
                                        <h6 class="mt-2 pt-2">{{ Str::limit($item->nombre, 50) }}</h6>
                                        <hr>
                                        <span class="my-1"><b>
                                                {{ \Carbon\Carbon::parse($item->fecha)->translatedFormat('  j \\d\\e F \\d\\e  Y') }}</b></span>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <a href="{{ route('ver-publicacion', $item->slug) }}"
                                        class="btn-sm btn btn-primary mt-1">Ver más</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
    @endif

    @if (!$noticias->isEmpty())
        <section id="noticias" data-aos="fade-up"  data-aos-anchor-placement="center-bottom">
            <div class="container text-center">
                <h3 class="my-2 py-2 "> Noticias</h3>
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @foreach ($noticias as $item)
                            <div class="swiper-slide h-100 p-3 rounded border shadow-sm d-flex flex-column justify-content-start"
                                style="min-width:250px;min-height:300px;">
                                <div class=" h-100 text-center w-100">
                                    <img style="height: 250px;aspect-ratio: 1 / 1  ;object-fit: cover; "
                                        src="{{ $item->portada }}" class="img-fluid rounded" alt="">
                                    <div class="fs-6">
                                        <h6 class="mt-2 pt-2">{{ Str::limit($item->nombre, 50) }}</h6>
                                        <hr>
                                        <span class="my-1"><b>
                                                {{ \Carbon\Carbon::parse($item->fecha)->translatedFormat('  j \\d\\e F \\d\\e  Y') }}</b></span>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <a href="{{ route('ver-actividad', ['tipo' => $item->tipo, 'slug' => $item->slug]) }}"
                                        class="btn-sm btn btn-primary mt-1">Ver más</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
    @endif
    {{-- 
    <section id="services" class="services section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Our Services</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div>
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="50">
                    <div class="service-item  position-relative">
                        <div class="icon">
                            <i class="bi bi-activity"></i>
                        </div>
                        <h3>Nesciunt Mete</h3>
                        <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores
                            iure perferendis tempore et consequatur.</p>
                        <a href="service-details.html" class="readmore stretched-link">Read more <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-broadcast"></i>
                        </div>
                        <h3>Eosle Commodi</h3>
                        <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum
                            hic non ut nesciunt dolorem.</p>
                        <a href="service-details.html" class="readmore stretched-link">Read more <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-easel"></i>
                        </div>
                        <h3>Ledo Markt</h3>
                        <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id
                            voluptas adipisci eos earum corrupti.</p>
                        <a href="service-details.html" class="readmore stretched-link">Read more <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-bounding-box-circles"></i>
                        </div>
                        <h3>Asperiores Commodit</h3>
                        <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga
                            sit provident adipisci neque.</p>
                        <a href="service-details.html" class="readmore stretched-link">Read more <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-calendar4-week"></i>
                        </div>
                        <h3>Velit Doloremque</h3>
                        <p>Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed
                            animi at autem alias eius labore.</p>
                        <a href="service-details.html" class="readmore stretched-link">Read more <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-chat-square-text"></i>
                        </div>
                        <h3>Dolori Architecto</h3>
                        <p>Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure.
                            Corrupti recusandae ducimus enim.</p>
                        <a href="service-details.html" class="readmore stretched-link">Read more <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div><!-- End Service Item -->

            </div>

        </div>

    </section>
 --}}
    <!-- Faq Section -->
    <section id="faq" class="faq section">
        <div class="container">
            <div class="d-flex flex-column flex-md-row">
                <div class="col-lg-4 member " data-aos="zoom-in" data-aos-delay="50">
                    <section id="services" class="services section p-0">
                        <div class="container section-title service-item  d-flex" data-aos="fade-up">

                            <div class="icon me-3">
                                <i class="bi bi-chat-square-text"></i>
                            </div>
                            <h3>Contacto</h3>
                        </div>
                        <div class="container">
                            <div class="row gy-4">
                                <div class="w-100" data-aos="fade-up" data-aos-delay="300">
                                    <div class="service-item position-relative d-flex flex-wrap p-0">
                                        <p class="fs-5" style="text-align: justify">
                                            Si deseas adquirir un libro, escríbenos un correo a: <br>
                                        <ul>
                                            <li><a href="mailto:kiosko.editorial@csh.udg.mx ">kiosko.editorial@csh.udg.mx
                                                </a></li>
                                            <li><a
                                                    href="mailto:apoyo.editorial@administrativos.udg.mx">apoyo.editorial@administrativos.udg.mx</a>
                                            </li>
                                        </ul>
                                        o visítanos en nuestro
                                        Kiosko: Edificio E piso 2 del CUCSH.

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-lg-8 ms-md-5 mt-3 mt-md-0" data-aos="fade-up" data-aos-delay="200">

                    <div class="faq-container">
                        <div class="content px-xl-5">
                            <h3 class="text-end d-block" style="border: none;"> <i><span>Preguntas</span><strong><br>frecuentes</strong></i></h3>
                            {{--  
                        <p style="text-align: justify">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                        </p>
                        --}}
                        </div>
                        @if (isset($preguntas))
                            @foreach ($preguntas as $key => $value)
                                <div class="faq-item ">
                                    <h3 style="border: none;"><span class="num">{{ $key + 1 }}.- </span>
                                        <span>{{ $value->pregunta }}</span>
                                    </h3>
                                    <div class="faq-content" style="text-align: justify">
                                        {!! str($value->respuesta)->markdown()->sanitizeHtml() !!}
                                    </div>
                                    <i class="faq-toggle bi bi-chevron-right"></i>
                                </div><!-- End Faq item-->
                            @endforeach
                        @else
                            <p>Aun no se registran preguntas</p>
                        @endif
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Faq Section -->


@endsection
