@extends('layout.default')

@section('head')
@endsection

<body>
    <!-- FADE OUT ANIMATION WHEN LOADED -->
    <span class="fade"></span>
    <main>
        <!-- SUB HERO BANNER START -->
        <section class="sub-hero-banner" style="background-image: url('art/hero2.webp');">
            <div class="hero-contained">
                <div class="hero-title fc-white">
                    <h1 class="ff-damion">Fale conosco</h1>
                    <a href="index.html" class="fc-white">
                        Home
                    </a>
                    <i class="bi bi-chevron-right"></i>
                    <a href="#" class="fc-white">
                        Fale conosco
                    </a>
                </div>
            </div>
            <!-- INICIO REDES SOCIAIS -->
            <!-- FINAL REDES SOCIAIS -->
        </section>
        <!-- SUB HERO BANNER END -->

        <!-- NAVIGATION START -->
        <nav>
            <div class="contained">
                <a href="{{URL('index')}}" class="logo fc-primary ff-damion row flex-alig-center">
                    <span class="fs-h2">Siscon</span>
                </a>
                <input type="checkbox" name="tablet-mobile-menu" class="tab-mob-menu" aria-label="tablet and mobile menu">
                <div class="navigation-container">
                    <a href="{{URL('index')}}">Home</a>
                    <a href="{{URL('about')}}">Sobre nós</a>
                    <a href="{{URL('service')}}">Serviços</a>
                    <!-- <a href="{{URL('industries')}}">Industries</a>
                        <a href="{{URL('blog/blog')}}">Blog</a> 
                        <a href="{{URL('career/career')}}">Career</a> -->
                    <a href="{{URL('contact')}}" class="btn-bg1 border-round">Fale conosco</a>
                </div>
            </div>
        </nav>
        <a href="#" class="btn-back-to-top" aria-label="Voltar para o topo">
            <i class="bi bi-chevron-up"></i>
        </a>
        <!-- NAVIGATION END -->

        <section class="contained">
            <h2 class="section-title ff-damion">Nos encontre</h2>
            <p class="col-wide ta-center mlmr-a">
                Estamos localizados próximo ao largo da vila Menck em Carapicuíba ao lado da auto-peças NVR.
            </p>
            <div class="row">
                <!-- EMBEDED MAP IFRAME START -->
                <div class="col-balance map-embed">
                    <iframe title="google-map" src="{{URL('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.823880210025!2d-46.8454585!3d-23.538836099999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cf0176bf7078b9%3A0xe39d1a9bc9557b5f!2sEstr.%20do%20Aderno%2C%2050%20-%20Vila%20Menk%2C%20Carapicu%C3%ADba%20-%20SP%2C%2006390-070!5e0!3m2!1spt-BR!2sbr!4v1714513667536!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade')}}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <!-- EMBEDED MAP IFRAME END -->

                <!-- CONTACT INFO START -->
                <div class="col-balance">
                    <span class="fs-h4 mb-15 mt-25 fc-primary">Onde nos encontrar:</span>
                    <a href="#" class="display-inblock">
                        <i class="bi bi-geo-alt-fill"></i>
                        Estrada do Aderno, 50
                    </a>
                    
                    <span class="fs-h4 mb-15 mt-25 fc-primary">Nos ligue:</span>
                    <a href="#" class="display-inblock">
                        <i class="bi bi-envelope-fill"></i>
                        contato@sisconsp.com.br
                    </a>
                    <a href="#" class="display-inblock">
                        <i class="bi bi-telephone-fill"></i>
                        (11) 9 6587-3623
                    </a>
                    
                    <!--<span class="fs-h4 mb-15 mt-25 fc-primary">Follow:</span>
                    <a href="#" class="display-inblock mr-10">
                        <i class="bi bi-facebook"></i>
                        Facebook
                    </a>
                    <a href="#" class="display-inblock mr-10">
                        <i class="bi bi-instagram"></i>
                        Instagram
                    </a>
                    <a href="#" class="display-inblock mr-10">
                        <i class="bi bi-twitter"></i>
                        Twitter
                    </a>
                    <a href="#" class="display-inblock mr-10">
                        <i class="bi bi-youtube"></i>
                        Youtube
                    </a>-->
    
                    <form action="{{ route('contatos.store') }}" class="message-form mt-50 mb-25">
                        @csrf

                        <span class="fs-h4 fc-primary mb-15">Envie uma mensagem para nós</span>
                        <div class="row mb-20">
                            <input name="nome" type="text" id="message-name" placeholder="Seu nome" aria-label="Digite seu nome" required>
                            <input name="email" type="email" class="ml-a" id="message-email" placeholder="Seu email" aria-label="Digite seu email" required>
                        </div>
                        <input name="assunto" type="text" id="message-subject" aria-label="Nos fale o tema da pergunta" class="mb-20" placeholder="Assunto">
                        <textarea name="comentario" id="message-message" rows="5" placeholder="Escreva a sua mensagem" aria-label="Escreva a sua mensagem"></textarea>
                        <button type="submit" class="btn-bg1 border-round mt-20">Enviar menssagem</button>
                    </form>
                </div>
                <!-- CONTACT INFO END -->

            </div>
        </section>

    </main>

    <!-- FOOTER START -->
    @section('footer')
    @endsection
    <!-- FOOTER END -->

</body>
</html>