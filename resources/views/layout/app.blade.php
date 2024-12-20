<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ $site->nombre }} | @yield('title') </title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </script>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/glightbox.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <style>
        :root {
            --accent-color: {{ $site->accent_color }};
            --heading-color: {{ $site->heading_color }};
            --nav-color: {{ $site->nav_color }};
            --nav-hover-color: {{ $site->nav_hover_color }};
            --nav-dropdown-color: {{ $site->nav_dropdown_color }};
            --nav-dropdown-hover-color: {{ $site->nav_dropdown_hover_color }};

        }

        .header {
            --background-color: {{ $site->heading_color }};
        }

        .accent-background {
            --background-color: {{ $site->background_color }};
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        #footer {
            margin-top: auto;
        }

        .btn-primary {
            --bs-btn-bg: {{ $site->accent_color }};
            --bs-btn-border-color: {{ $site->accent_color }};
            --bs-btn-hover-bg: {{ $site->background_color }};
            --bs-btn-hover-border-color: {{ $site->background_color }};
        }

        .sticky-bottom {
            z-index: 900 !important;
        }
    </style>

</head>

<body class="index-page">

    <header id="header" class="header sticky-top">
        <div class="topbar d-flex align-items-center py-1" style="height: 50px;">
            <div class="container-fluid  mx-md-5 d-flex justify-content-center justify-content-md-between "
                >
                <div class="contact-info d-flex justify-content-center align-items-center flex-wrap">
                    <i class="bi bi-envelope d-flex align-items-center my-1"><a
                            href="mailto:{{ $site->email }}">{{ $site->email }}</a></i>
                    <i class="bi bi-phone d-flex align-items-center ms-4"><span>{{ $site->contacto }}</span></i>
                </div>
                <div class="social-links d-none d-md-flex align-items-center my-1 py-1">
                    <form action="{{ route('buscador') }}" class="fs-6 my-1 py-1" method="get">
                        <div class="d-flex p-2">
                            <input type="text" name="buscar" class="m-1 p-1 form-control" placeholder="Buscar"
                                required>
                            <button class="btn btn-sm btn-secoundary border-white my-1 py-1 text-white"
                                type="submit"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                    {{--
                    <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    --}}
                </div>
            </div>
        </div><!-- End Top Bar -->

        <div class="branding d-flex align-items-cente">

            <div class="container-fluid mx-md-5 position-relative d-flex align-items-center justify-content-between">
                <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                    <!-- Uncomment the line below if you also wish to use an image logo -->
                    <!-- <img src="assets/img/logo.png" alt=""> -->
                    <h1 class="sitename text-uppercase">{{ $site->nombre }}</h1>
                    <span>.</span>
                </a>
                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li class="d-md-none">
                            <form action="{{ route('buscador') }}" class="fs-6 my-1 py-1" method="get">
                                <div class="d-flex p-2">
                                    <input type="text" name="buscar" class="m-1 p-1 form-control"
                                        placeholder="Buscar">
                                    <button class="btn btn-sm btn-primary my-1 py-1" type="submit"><i
                                            class="bi bi-search"></i></button>
                                </div>
                            </form>
                        </li>
                        <li><a href="{{ route('home') }}"
                                class="{{ Route::is('home') ? 'active' : '' }}">{{ __('Home') }}</a></li>

                        <li><a href="{{ route('directorio') }}"
                                class="{{ Route::is('directorio') ? 'active' : '' }}">{{ __('Directory') }}</a></li>

                        <li><a href="{{ route('consejo.editorial') }}"
                                class="{{ Route::is('consejo.editorial') ? 'active' : '' }}">Consejo Editorial</a></li>

                        @if (!$publicaciones->isEmpty())
                            <li class="dropdown">
                                <a href="{{ route('publicaciones.show', 'todas') }}"
                                    class="{{ Route::is('publicaciones.show') ? 'active' : '' }}"><span>Publicaciones</span>
                                    <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    @foreach ($publicaciones as $item)
                                        <li><a
                                                href="{{ route('publicaciones.show', $item->name) }}">{{ $item->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                        @if (!$colecciones->isEmpty())
                            <li class="dropdown">
                                <a href="{{ route('publicaciones.colecciones', 'todas') }}"
                                    class="{{ Route::is('publicaciones.colecciones') ? 'active' : '' }}"><span>Colecciones</span>
                                    <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    @foreach ($colecciones as $item)
                                        <li><a
                                                href="{{ route('publicaciones.colecciones', $item->name) }}">{{ $item->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif

                        <li><a href="{{ route('revistas.index') }}"
                                class="{{ Route::is('revistas.index') ? 'active' : '' }}">Revistas Cientificas</a>
                        </li>
                        @if (isset($site->archivo))
                            <li><a href="{{ asset('storage/' . $site->archivo) }}" target="_blank">Lineamientos y
                                    normas editoriales</a>
                            </li>
                        @endif

                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>
            </div>

        </div>

    </header>

    <main class="main">
        @yield('content')
    </main>

    <footer id="footer" class="footer sticky-bottom accent-background">
        <div class="container footer-top">
            <div class="row">
                <div class="col-sm-12 footer-about d-flex flex-column flex-md-row"
                    style="align-items: center !important;">
                    <div class="mx-2 px-2  m-auto">
                        <a href="{{ route('home') }}" class=" logo m-auto">
                            <span class="sitename text-uppercase">{{ $site->nombre }}</span>
                        </a>
                    </div>

                    <div class="d-flex  flex-column flex-md-row  align-items-start align-items-md-center ">
                        <div class="mx-1 col-sm-12 col-md-4">
                            <h4>{{ __('Address') }}</h4>
                            <p>{{ $site->direccion }}</p>

                        </div>
                        <div class="mx-1 col-sm-12 col-md-auto">
                            <h4>{{ __('Contact Us') }}</h4>
                            <p>
                                <strong>{{ __('Phone') }}:</strong>
                                <span>{{ $site->contacto }}</span> <br>
                                <strong>{{ __('Email') }}:</strong> <span>{{ $site->email }}</span>
                            </p>
                        </div>
                    </div>
                    {{--
                    <div class="social-links d-flex mt-4">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                    --}}
                </div>
                {{--
                <div class="col-lg-2 col-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Terms of service</a></li>
                        <li><a href="#">Privacy policy</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">Web Development</a></li>
                        <li><a href="#">Product Management</a></li>
                        <li><a href="#">Marketing</a></li>
                        <li><a href="#">Graphic Design</a></li>
                    </ul>
                </div>
--}}

            </div>
        </div>
        {{--
        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Impact</strong> <span>All Rights Reserved</span>
            </p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
--}}
    </footer>
    <script>
        document.querySelectorAll('.faq-item h3, .faq-item .faq-toggle').forEach((faqItem) => {
            faqItem.addEventListener('click', () => {
                faqItem.parentNode.classList.toggle('faq-active');
            });
        });
    </script>
    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>


    <!-- Vendor JS Files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script src="{{ asset('js/glightbox.min.js') }}"></script>


    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>

    @include('sweetalert::alert')

</body>

</html>
