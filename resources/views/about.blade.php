@extends('layout.default')

@section('head')
@endsection

<body>
    <!-- FADE OUT ANIMATION WHEN LOADED -->
    <span class="fade"></span>
    <main>
        <!-- SUB HERO BANNER START -->
        <section class="sub-hero-banner" style="background-image: url('art/hero1.webp');">
            <div class="hero-contained">
                <div class="hero-title fc-white">
                    <h1 class="ff-damion">Sobre nós</h1>
                    <a href="{{URL('index')}}" class="fc-white">
                        Home
                    </a>
                    <i class="bi bi-chevron-right"></i>
                    <a href="#" class="fc-white">
                        About Us
                    </a>
                </div>
                <!-- INICIO REDES SOCIAIS -->
                
                <!-- FINAL REDES SOCIAIS -->
            </div>
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

        <a href="#" class="btn-back-to-top" aria-label="Back to top button">
            <i class="bi bi-chevron-up"></i>
        </a>
        <!-- NAVIGATION END -->

        <section class="contained row">
            <div class="col-balance">
                <h2 class="section-title ff-damion">Sobre nós</h2>
                <span class="fc-primary fs-h2">
                Serviços Contábeis para Empresas.
                </span>
                <p>
                    Oferecemos uma gama completa de serviços contábeis para empresas, incluindo preparação de declarações fiscais, contabilidade financeira, folha de pagamento, auditoria e muito mais.
                </p>
                <p>
                    Nosso objetivo é ajudar sua empresa a prosperar, fornecendo relatórios financeiros precisos e oportunos que ajudam você a tomar decisões informada
                </p>
            </div>
            <div class="col-balance">
                <div class="sticky-img-dual">
                    <img src="{{asset('art/hero1.webp')}}" alt="">
                    <img src="{{asset('svg/blob.svg')}}" alt="" class="blob">
                    <img src="{{asset('art/hero2.webp')}}" alt="">
                </div>
            </div>
            <div class="sticky-img-dual-spacer"></div>
            
            
            <div class="col-balance">
                <div class="sticky-img-dual">
                    <img src="{{asset('art/hero1.webp')}}" alt="">
                    <img src="{{asset('svg/blob.svg')}}" alt="" class="blob">
                    <img src="{{asset('art/hero2.webp')}}" alt="">
                </div>
            </div>
            <div class="col-balance">
                <h2 class="section-title ff-damion">Sobre nós</h2>
                <span class="fc-primary fs-h2">
                    Serviços Contábeis para Indivíduos
                </span>
                <p>
                    Também oferecemos serviços contábeis para indivíduos, incluindo preparação de imposto de renda, planejamento tributário e consultoria financeira.
                </p>
                <p>
                    Nosso objetivo é ajudá-lo a maximizar suas economias fiscais e alcançar seus objetivos financeiros.
                </p>
            </div>
            <div class="sticky-img-dual-spacer"></div>

            <div class="col-balance">
                <h2 class="section-title ff-damion">Sobre nós</h2>
                <span class="fc-primary fs-h2">
                    Emissão de Certificado Digital.
                </span>
                <p>
                Além dos serviços contábeis, também oferecemos serviços de emissão de certificado digital. O certificado digital é uma identidade digital que garante a autenticidade de transações online. Ele pode ser usado para assinar documentos digitalmente, realizar transações seguras na internet e cumprir obrigações acessórias.
                </p>
                <p>
                Estamos ansiosos para trabalhar com você e ajudar a atender às suas necessidades contábeis. Entre em contato conosco hoje mesmo para saber mais sobre nossos serviços.
                </p>
            </div>
            <div class="col-balance">
                <div class="sticky-img-dual">
                    <img src="{{asset('art/hero1.webp')}}" alt="">
                    <img src="{{asset('svg/blob.svg')}}" alt="" class="blob">
                    <img src="{{asset('art/hero2.webp')}}" alt="">
                </div>
            </div>
            <div class="sticky-img-dual-spacer"></div>
        </section>

        <!-- <section class="contained">
            <h2 class="section-title ff-damion">Our team</h2>
            <p class="col-wide mlmr-a ta-center">
                Our team composes of highly competitive cloned
                individual with the same name too, they are top notch motivaded individual
                dedicated to give hundred and ten percent effort to make your vision comes to life.
            </p>
            <div class="row flex-just-center">
                <div class="col-tri">
                    <article class="card-team">
                        <img src="art/team.webp" alt="">
                        <h3 class="title ff-damion">Johnny Doe</h3>
                        <div class="info">
                            <h3 class="ff-damion">Frontend Developer</h3>
                            <p>
                                When I gaze upon the stars' gentle embrace, I glimpse a universe of 
                                dreams slipping into space, but dreamers must awaken to a stark and empty place.
                            </p>
                            <p>
                                Whispering in the language of forgotten dreams, I hear the echoes of 
                                desires lost in silent streams.
                            </p>
                        </div>
                    </article>
                </div>
                <div class="col-tri">
                    <article class="card-team">
                        <img src="art/team.webp" alt="">
                        <h3 class="title ff-damion">Johnny Doe</h3>
                        <div class="info">
                            <h3 class="ff-damion">Frontend Developer</h3>
                            <p>
                                When I gaze upon the stars' gentle embrace, I glimpse a universe of 
                                dreams slipping into space, but dreamers must awaken to a stark and empty place.
                            </p>
                            <p>
                                Whispering in the language of forgotten dreams, I hear the echoes of 
                                desires lost in silent streams.
                            </p>
                        </div>
                    </article>
                </div>
                <div class="col-tri">
                    <article class="card-team">
                        <img src="art/team.webp" alt="">
                        <h3 class="title ff-damion">Johnny Doe</h3>
                        <div class="info">
                            <h3 class="ff-damion">Frontend Developer</h3>
                            <p>
                                When I gaze upon the stars' gentle embrace, I glimpse a universe of 
                                dreams slipping into space, but dreamers must awaken to a stark and empty place.
                            </p>
                            <p>
                                Whispering in the language of forgotten dreams, I hear the echoes of 
                                desires lost in silent streams.
                            </p>
                        </div>
                    </article>
                </div>
            </div>
            <br>
        </section> -->

    </main>
    
    <!-- FOOTER START -->
    @section('footer')
    @endsection
    <!-- FOOTER END -->

</body>
</html>