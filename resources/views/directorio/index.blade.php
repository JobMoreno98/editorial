@extends('layout.app')

@section('title', 'Directorio')

@section('content')
    <section id="team" class="team section ">
        <div class="container section-title " data-aos="fade-up">
            <h2>{{ __('Directory') }}</h2>
        </div>
        <div class="container">
            @include('directorio.partials.nodo', ['items' => $directorio, 'nivel' => 0])
        </div>
    </section>
@endsection

@push('js')
    <script>
        function aplicarIndentacionJerarquica() {
            const nodos = document.querySelectorAll('.directorio-nodo');

            const esPantallaGrande = window.innerWidth >= 768;

            nodos.forEach(nodo => {
                const nivel = parseInt(nodo.dataset.nivel || 0);
                if (esPantallaGrande) {
                    nodo.style.marginLeft = (nivel * 30) + 'px';
                } else {
                    nodo.style.marginLeft = '0px';
                }
            });
        }

        window.addEventListener('DOMContentLoaded', aplicarIndentacionJerarquica);
        window.addEventListener('resize', aplicarIndentacionJerarquica);
    </script>
@endpush
