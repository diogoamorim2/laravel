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
        <meta property="og:image" content="{{asset('art/og-card.png')}}>
                <meta property=" og:title" content="Siscon Contabilidade">
        <meta name="twitter:card" content="summary_large_image">

        <!-- THE TITLE OF THE PAGE -->
        <title>Siscon Contabilidade</title>

        <link rel="preload" href="{{URL('icons/bootstrap-icons.css')}}" as="style">
        <link rel="preload" href="{{URL('css/fontstyle.css')}}" as="style">
        <link rel="preload" href="{{URL('css/layout.css')}}" as="style">
        <link rel="preload" href="{{URL('css/animation.css')}}" as="style">
        <link rel="preload" href="{{URL('css/style.css')}}" as="style">

        <link rel="stylesheet" href="{{URL('icons/bootstrap-icons.css')}}">
        <link rel="stylesheet" href="{{URL('css/fontstyle.css')}}">
        <link rel="stylesheet" href="{{URL('css/layout.css')}}">
        <link rel="stylesheet" href="{{URL('css/animation.css')}}">
        <link rel="stylesheet" href="{{URL('css/style.css')}}">
        <link rel="icon" type="image/png" href="{{URL('image/favicon.png')}}">
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

        <style>
            .col-quad_bg{
                width: 200px !import;
            },
            /* Estilo Base para o Botão WhatsApp */
            .whatsapp-button {
                position: fixed; /* Mantém o botão fixo na tela */
                bottom: 30px;    /* Distância da parte inferior */
                right: 30px;     /* Distância da direita */
                z-index: 1000;   /* Garante que fique sobre outros elementos */
                display: flex;   /* Útil para alinhar a imagem interna se necessário */
                justify-content: center;
                align-items: center;
                /* background-color: #25D366; */ /* Cor de fundo opcional, se a imagem não preencher */
                /* border-radius: 50%; */      /* Para deixar o fundo redondo, se tiver cor */
                /* padding: 10px; */           /* Espaçamento interno, se tiver cor de fundo */
                box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2); /* Sombra sutil */
                transition: transform 0.2s ease-in-out; /* Efeito suave ao passar o mouse */
            }

            .whatsapp-button img {
                display: block; /* Remove espaço extra abaixo da imagem */
                width: 60px;    /* Tamanho padrão para desktop (ajuste conforme necessário) */
                height: 60px;   /* Manter proporção ou definir igual à largura para redondo */
                border-radius: 50%; /* Se a própria imagem deve ser redonda */
            }

            .whatsapp-button:hover {
                transform: scale(1.1); /* Aumenta um pouco no hover */
            }


            /* --- Ajustes para Telas Menores (Mobile) --- */

            /* Exemplo: Telas com largura máxima de 768px (Tablets e Celulares) */
            @media (max-width: 768px) {
                .whatsapp-button {
                    bottom: 20px; /* Menor distância da borda */
                    right: 20px;  /* Menor distância da borda */
                    /* padding: 8px; */ /* Menor espaçamento interno, se tiver fundo */
                }

                .whatsapp-button img {
                    width: 50px;  /* Tamanho ligeiramente menor para mobile */
                    height: 50px;
                }
            }

            /* Exemplo: Telas com largura máxima de 480px (Celulares menores) */
            @media (max-width: 480px) {
                .whatsapp-button {
                    bottom: 15px;
                    right: 15px;
                }

                .whatsapp-button img {
                    width: 45px; /* Ainda menor se necessário */
                    height: 45px;
                }
            }

        </style>
        @yield('head')
    </head>
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
                <img loading="lazy" src="{{asset('image/logo-removebg_204_200.png')}}">
        </div>
        <!-- FOOTER WEBSITE LOGO END -->

        <!-- FOOTER QUICK CONTACT START -->
        <div class="col-quad">
            <h3 class="ff-damion">Fale conosco</h3>
            <a href="contact" class="display-block fc-white icon-link mt-10 mb-10">
                <i class="bi bi-envelope-fill"></i>
                contato@sisconsp.com.br
            </a>
            <a href="https://wa.me/11965873624" class="display-inblock" target=”blank”>
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

</html>