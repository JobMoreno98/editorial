@extends('layout.app')
@section('title', 'Inicio')
@section('content')
    <section id="hero" class="hero section accent-background">
        <div class="container position-relative" id="contenedor-banner"  data-aos="zoom-in" data-aos-delay="50">
            <div class="row gy-5 justify-content-between">
                <div class="col-sm-12 order-2 order-lg-1 d-flex flex-column justify-content-center banner p-0 pb-xl-3">
                    <img src="{{ asset('storage/' . $site->image_banner) }}" class="h-100 img-banner" alt="" >
                </div>
            </div>
        </div>

    </section><!-- /Hero Section -->
    <!-- About Section -->
    <section id="about" class="about section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="zoom-in">
            <h2>{{ __('About Us') }}<br></h2>
            <p style="text-align: justify">{!! $site->about !!}</p>
        </div><!-- End Section Title -->


        <div class="container">

            <div class="row gy-4">
                <div class="col-lg-6" style="text-align: justify" data-aos="zoom-in" data-aos-delay="50">
                    <h3>Voluptatem dignissimos provident laboris nisi ut aliquip ex ea commodo</h3>
                    <img src="assets/img/about.jpg" class="img-fluid rounded-4 mb-4" alt="">
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

    </section><!-- /About Section -->

    <section id="novedades" class="novedades section">

        <div class="container">
            <div class="swiper init-swiper">
                <h3 class="text-center border-bottom my-2 py-2">Novedades</h3>
                <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 15
                },
                "480": {
                  "slidesPerView":2,
                  "spaceBetween": 20
                },
                "640": {
                  "slidesPerView": 3,
                  "spaceBetween": 50
                },
                "1400": {
                  "slidesPerView": 3,
                  "spaceBetween": 50
                },
                "1450": {
                    "slidesPerView": 4,
                    "spaceBetween": 50
                  }
              }
            }
          </script>
                <div class="swiper-wrapper align-items-center">
                    @foreach ($novedades as $item)
                        <div class="swiper-slide h-100 p-3 rounded border shadow-sm d-flex flex-column justify-content-around"
                            style="min-width:250px;min-height:500px;">
                            <div class="member text-center w-100">
                                <img style="max-height: 250px;aspect-ratio: 1 / 1  ;object-fit: cover; "
                                    src="{{ asset('storage/' . $item->imagen) }}" class="img-fluid rounded" alt="">
                                <div class="fs-6">
                                    <h6 class="mt-2 pt-2">{{ Str::limit($item->nombre, 80) }}</h6>
                                    <hr>
                                    <span class="my-1"><b>Año de publicación: {{ $item->anio_publicacion }}</b></span>
                                </div>
                            </div>
                            <div class="text-end">
                                <a href="{{ route('ver-publicacion', $item->slug) }}"
                                    class="btn-sm btn btn-primary mt-1">Ver más</a>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="mt-2">
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </div>

    </section>

    <section id="call-to-action" class="call-to-action section dark-background m-2">
        <div class="container">
            <img src="https://picsum.photos/1250/500" alt="">
            <div class="content row justify-content-center" data-aos="zoom-in" data-aos-delay="50">
                <div class="col-xl-10">
                    <div class="text-center">
                        <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox play-btn"></a>
                        <h3>Call To Action</h3>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                            officia deserunt mollit anim id est laborum.</p>
                        <a class="cta-btn" href="#">Call To Action</a>
                    </div>
                </div>
            </div>
        </div>

    </section>

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

    </section><!-- /Services Section -->

    <!-- Faq Section -->
    <section id="faq" class="faq section">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="50">
                    <div class="content px-xl-5">
                        <h3><span>Preguntas</span><strong><br>frecuentes</strong></h3>
                        <p style="text-align: justify">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                        </p>
                    </div>
                </div>

                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

                    <div class="faq-container">
                        <div class="faq-item ">
                            <h3><span class="num">1.</span> <span>Pregunta 1 ?</span></h3>
                            <div class="faq-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3><span class="num">2.</span> <span>Pregunta 2 ?</span></h3>
                            <div class="faq-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3><span class="num">3.</span> <span>Pregunta 3 ?</span></h3>
                            <div class="faq-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                                </p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3><span class="num">4.</span> <span>Pregunta 4 ?</span></h3>
                            <div class="faq-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3><span class="num">5.</span> <span>Pregunta 5 ?</span></h3>
                            <div class="faq-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                                </p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                    </div>

                </div>
            </div>

        </div>

    </section><!-- /Faq Section -->


@endsection
