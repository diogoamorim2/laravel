<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Diogo Amorim">
        <!-- DESCRIPTION OF THE PAGE -->
        <meta name="description" content="Siscon Contabilidade">

        <!-- KEYWORDS OF THE PAGE TO HELP SEARCH ENGINE -->
        <meta name="keywords" content="Contabilidade , serviços contabeis , certificado digital">

        <!-- OG IMAGE IS THE IMAGE SHOWN WHEN YOUR WEBSITE LINK IS SHARED ON SOCIAL MEDIA -->
        <meta property="og:image" content="{{asset('art/og-card.png')}}">
        <meta property="og:title" content="Siscon Contabilidade">
        <meta name="twitter:card" content="summary_large_image">

        <!-- THE TITLE OF THE PAGE -->
        <title>Siscon Contabilidade</title>

        {{--
            ⚡ Bolt Optimization: Preload critical fonts to improve LCP and reduce CLS.
            These fonts are used above the fold or are essential for the initial paint.
        --}}
        <link rel="preload" href="{{ asset('font/Damion.ttf') }}" as="font" type="font/ttf" crossorigin>
        <link rel="preload" href="{{ asset('font/Nunito-Regular.ttf') }}" as="font" type="font/ttf" crossorigin>
        <link rel="preload" href="{{ asset('icons/fonts/bootstrap-icons.woff2') }}?1fa40e8900654d2863d011707b9fb6f2" as="font" type="font/woff2" crossorigin>

        {{--
            ⚡ Bolt Optimization: Preload CSS and load non-critical styles asynchronously.
            Bootstrap Icons (92KB) is deferred to unblock the main thread and improve FCP.
        --}}
        <link rel="preload" href="{{ asset('icons/bootstrap-icons.css') }}" as="style">
        <link rel="preload" href="{{ asset('css/fontstyle.css') }}" as="style">
        <link rel="preload" href="{{ asset('css/layout.css') }}" as="style">
        <link rel="preload" href="{{ asset('css/animation.css') }}" as="style">
        <link rel="preload" href="{{ asset('css/style.css') }}" as="style">

        <link rel="stylesheet" href="{{ asset('icons/bootstrap-icons.css') }}" media="print" onload="this.media='all'">
        <noscript><link rel="stylesheet" href="{{ asset('icons/bootstrap-icons.css') }}"></noscript>

        <link rel="stylesheet" href="{{ asset('css/fontstyle.css') }}">
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
        <link rel="stylesheet" href="{{ asset('css/animation.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="icon" type="image/png" href="{{ asset('image/favicon.png') }}">
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

        @yield('head')
    </head>
<body>
    <a href="#main-content" class="skip-link">Pular para o conteúdo principal</a>
    @yield('content')

<!-- MAIN HERO BANNER END -->

<!-- INICIO REDES SOCIAIS -->
@yield('redessociais')
<!-- <div class="hero-socials">
        <a href="#" class="mt-a icon-link" aria-label="Follow us on facebook">
            <i class="bi bi-facebook"></i>
        </a>
        <a href="#" class="icon-link mt-10" aria-label="Follow us on instagram">
            <i class="bi bi-instagram"></i>
        </a>
        <a href="#" class="icon-link mt-10" aria-label="Follow us on twitter">
            <i class="bi bi-twitter"></i>
        </a>
        <a href="#" class="icon-link mt-10" aria-label="Follow us on youtube">
            <i class="bi bi-youtube"></i>
        </a>
    </div> -->
<!-- FINAL REDES SOCIAIS -->

@yield('nav')
<!-- <nav>
    <div class="contained">
        <a href="{{URL('index')}}" class="logo fc-primary ff-damion row flex-alig-center">
            <span class="fs-h2">Siscon</span>
        </a>
        <input type="checkbox" name="tablet-mobile-menu" class="tab-mob-menu" aria-label="tablet and mobile menu">
        <div class="navigation-container">
            <a href="{{URL('index')}}">Home</a>
            <a href="{{URL('about')}}">Sobre nós</a>
            <a href="{{URL('service')}}">Serviços</a> -->
            <!-- <a href="{{URL('industries')}}">Industries</a>
                <a href="{{URL('blog/blog')}}">Blog</a> 
                <a href="{{URL('career/career')}}">Career</a> -->
            <!--<a href="{{URL('contact')}}" class="btn-bg1 border-round">Fale conosco</a>
        </div>
    </div>
</nav> -->

@yield('footer')
<footer class="fc-white">
    <div class="contained row flex-just-center">

        <!-- FOOTER WEBSITE LOGO START -->
        <div class="col-quad_bg">
                <img loading="lazy" src="{{asset('image/logo-removebg_204_200.png')}}" width="204" height="200" alt="Siscon Contabilidade">
        </div>
        <!-- FOOTER WEBSITE LOGO END -->

        <!-- FOOTER QUICK CONTACT START -->
        <div class="col-quad">
            <h3 class="ff-damion">Fale conosco</h3>
            <a href="contact" class="display-block fc-white icon-link mt-10 mb-10">
                <i class="bi bi-envelope-fill"></i>
                contato@sisconsp.com.br
            </a>
            <a href="https://wa.me/11965873624" class="display-inblock" target="_blank" rel="noopener noreferrer">
                <i class="bi bi-telephone-fill"></i>
                (11) 9 6587-3624
            </a>
            <a href="{{URL('https://maps.app.goo.gl/v68DNXwJwkwtCE6s5')}}" class="display-block fc-white icon-link mt-10 mb-10">
                <i class="bi bi-geo-alt-fill"></i>
                Estrada do Aderno, 50 - Carapicuíba - SP
            </a>
            <!-- <a href="#" class="display-inblock fc-white icon-link mt-20" aria-label="Follow on facebook">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" class="display-inblock fc-white icon-link" aria-label="Follow on instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="#" class="display-inblock fc-white icon-link" aria-label="Follow on twitter">
                        <i class="bi bi-twitter"></i>
                    </a>
                    <a href="#" class="display-inblock fc-white icon-link" aria-label="Follow on youtube">
                        <i class="bi bi-youtube"></i>
                    </a> -->
        </div>
        <!-- FOOTER QUICK CONTACT END -->

        <!-- FOOTER SCHEDULE START -->
        <div class="col-quad">
            <h3 class="ff-damion">Horário de funcionamento</h3>
            <p class="mt-10 mb-10 fw-bold">
                Segunda-feira - Sexta-feira:
                <span class="fw-normal display-block">9:00 - 17:00</span>
            </p>
            <p class="mt-10 mb-10 fw-bold">
                Sabado:
                <span class="fw-normal display-block">Fechado</span>
            </p>
            <p class="mt-10 mb-10 fw-bold">
                Domingo:
                <span class="fw-normal display-block">Fechado</span>
            </p>
        </div>
        <!-- FOOTER SCHEDULE END -->

        <!-- FOOTER USEFUL LINKS START -->
        <div class="col-quad">
            <h3 class="ff-damion">Links úteis</h3>
            <a href="{{URL('index')}}" class="display-block fc-white mt-5 mb-5">
                <i class="bi bi-chevron-compact-right"></i>
                Home
            </a>
            <a href="{{URL('about')}}" class="display-block fc-white mt-5 mb-5">
                <i class="bi bi-chevron-compact-right"></i>
                Sobre nós
            </a>
            <a href="{{URL('service')}}" class="display-block fc-white mt-5 mb-5">
                <i class="bi bi-chevron-compact-right"></i>
                Serviços
            </a>
            <a href="{{URL('contact')}}" class="display-block fc-white mt-5 mb-5">
                <i class="bi bi-chevron-compact-right"></i>
                Contato
            </a>
        </div>
        <!-- FOOTER USEFUL LINKS END -->

    </div>
    <div class="copy ta-center fc-white">
        <small>&copy; Siscon contabilidade - Copyright 2024</small>
    </div>
</footer>

<a href="#main-content" class="btn-back-to-top" aria-label="Voltar para o topo" title="Voltar para o topo">
    <i class="bi bi-chevron-up"></i>
</a>

<script src="{{ asset('js/script.js') }}" defer></script>
</body>
</html>