@extends('layout.default')

@section('head')
<link rel="preload" as="image" href="{{ asset('art/hero1.webp') }}">
<style>
.youtube-facade {
    width: 100%;
    height: 100%;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 12px;
    position: relative;
    overflow: hidden;
}
.youtube-facade .play-button {
    font-size: 4rem;
    color: white;
    text-shadow: 0 2px 10px rgba(0,0,0,0.5);
    transition: transform 0.2s;
    position: relative;
    z-index: 1;
}
.youtube-thumb {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: 0;
    border-radius: 12px;
}
.youtube-facade:hover .play-button {
    transform: scale(1.1);
}
</style>
@endsection

@section('content')
    <!-- FADE OUT ANIMATION WHEN LOADED -->
    <span class="fade"></span>
    <main>
        <!-- MAIN HERO BANNER START -->
        <section class="hero-banner">
            <div class="hero-contained">
                <div class="hero-title fc-white">
                    <h1 class="ff-damion">Bem-vindo à Siscon Contabilidade</h1>
                    <p class="fs-h4 fw-normal">
                        Somos uma empresa de contabilidade dedicada a fornecer serviços contábeis excepcionais para empresas e indivíduos. <br>
                        Com anos de experiência e uma equipe de profissionais altamente qualificados, estamos prontos para atender às suas necessidades contábeis.
                    </p>
                    <a href="{{URL('#about')}}" class="btn-bg2 border-round mt-20">
                        Saiba Mais <i class="bi bi-chevron-compact-right"></i>
                    </a>
                </div>
            </div>
            
            <!-- INICIO REDES SOCIAIS -->
            <!-- FINAL REDES SOCIAIS -->
        </section>
        <!-- MAIN HERO BANNER END -->

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

        <a href="https://wa.me/5511965873624"
            target="_blank"
            class="whatsapp-button"
            aria-label="Fale conosco pelo WhatsApp">  {{-- Label para acessibilidade --}}
        
            <img src="{{asset('image/whatsbggreen.webp')}}"
                alt="Ícone WhatsApp"> {{-- Alt text descrevendo a imagem --}}
        
            {{-- Opcional: Texto para leitores de tela, se quiser ser mais explícito --}}
            {{-- <span class="sr-only">Fale conosco pelo WhatsApp</span> --}}
        </a>

        <!-- <a href="#" class="btn-back-to-top" aria-label="Back to top button">
            <i class="bi bi-chevron-up"></i>
        </a> -->
        <!-- NAVIGATION END -->

        <!-- ABOUT SECTION START -->
        <section class="contained row" id="about">
            <!-- USER FEEDBACK START -->
            @if (session('success'))
                <div class="alert alert-success" role="alert" aria-live="polite">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger" role="alert" aria-live="polite">
                    {{ session('error') }}
                </div>
            @endif
             <!-- USER FEEDBACK END -->

            <h2 class="section-title ff-damion">Sobre nós</h2>
            <div class="col-balance">
                <span class="fc-primary fs-h2">
                    Serviços Contábeis para Empresas e Pessoa Física
                </span>
                <p>
                    Oferecemos uma gama completa de serviços contábeis para empresas, incluindo preparação de declarações fiscais, contabilidade financeira, folha de pagamento, auditoria e muito mais. <br>
                </p>
                <a href="{{URL('about')}}" class="btn-bg1 mt-25 border-round">Saiba mais</a>
            </div>
            <div class="col-balance">
                <div class="sticky-img-dual">
                    <!--
                    <img src="{{asset('art/hero1.webp')}}" alt="">
                    <img src="{{asset('svg/blob.svg')}}" alt="" class="blob">
                    <img src="{{asset('art/hero2.webp')}}" alt="">
                -->
                <div class="youtube-facade" data-video-id="3PWgUvvxjkI" aria-label="Play Video">
                    <img src="https://i.ytimg.com/vi/3PWgUvvxjkI/hqdefault.jpg" loading="lazy" alt="YouTube Thumbnail" class="youtube-thumb">
                    <div class="play-button"><i class="bi bi-play-circle-fill"></i></div>
                </div>
                </div>
            </div>
            <div class="sticky-img-dual-spacer"></div>
            <h2 class="section-title ff-damion">Sobre nós</h2>
            <div class="col-balance">
                <div class="sticky-img-dual">
                <div class="youtube-facade" data-video-id="-urSrobDaVE" aria-label="Play Video">
                    <img src="https://i.ytimg.com/vi/-urSrobDaVE/hqdefault.jpg" loading="lazy" alt="YouTube Thumbnail" class="youtube-thumb">
                    <div class="play-button"><i class="bi bi-play-circle-fill"></i></div>
                </div>
                </div>
            </div>
            <div class="col-balance">
                <span class="fc-primary fs-h2">
                    Emissão de Certificado digital
                </span>
                <p>
                    Oferecemos soluções em certificação digital em conjunto com nossa parceira Valid. <br>
                </p>
                <a href="{{URL('about')}}" class="btn-bg1 mt-25 border-round">Saiba mais</a>
            </div>
            
        </section>
        <!-- ABOUT SECTION END -->

        <!-- TEAM SECTION START -->
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
        <!-- TEAM SECTION END -->

        <!-- PREVIEW SERVICE SECTION START -->
        <section class="bg-primary-foot ta-center">
            <h2 class="section-title ff-damion bg-primary-foot">Serviços</h2>
            <div class="contained">
                <p class="col-wide mlmr-a">
                    Oferecemos uma gama de serviços contábeis na medida de suas necessidades.
                </p>
            </div>
            <div class="contained row flex-just-center">
                <div class="col-full">
                    <hr>
                </div>
                <div class="col-tri">
                    <i class="bi bi-stars fs-h2"></i>
                    <h3 class="mt-10 ff-damion">Serviços Contábeis para Empresas</h3>
                    <p>
                        Nosso objetivo é ajudar sua empresa a prosperar, fornecendo relatórios financeiros precisos e oportunos que ajudam você a tomar decisões informadas.
                    </p>
                </div>
                <div class="col-tri">
                    <i class="bi bi-diagram-3 fs-h2"></i>
                    <h3 class="mt-10 ff-damion">Serviços Contábeis para Indivíduos</h3>
                    <p>
                        Nosso objetivo é ajudá-lo a maximizar suas economias fiscais e alcançar seus objetivos financeiros.
                    </p>
                </div>
                <div class="col-tri">
                    <i class="bi bi-code-slash fs-h2"></i>
                    <h3 class="mt-10 ff-damion">Certificado Digital</h3>
                    <p>
                        Ele pode ser usado para assinar documentos digitalmente, realizar transações seguras na internet e cumprir obrigações acessórias.
                    </p>
                </div>
            </div>
            <a href="{{URL('service')}}" class="btn-bg2 border-round mt-25">
                Saiba mais sobre nossos serviços.
            </a>
        </section>
        <!-- PREVIEW SERVICE SECTION END -->

        <!-- PREVIEW BLOGS SECTION START -->
        <!-- <section class="contained">
            <h2 class="section-title ff-damion">Blogs</h2>
            <p class="ta-center col-wide mlmr-a">
                Stay informed about our blogs, it's highly unlikely that they will stay up to date. 
                This will be the latest blog from 2023 when it's already 2026, feel free to read our 
                outdated blogs.
            </p>
            <div class="row flex-just-center">
                <div class="col-tri">
                    <article class="card-blog">
                        <img src="art/work1.webp" alt="">
                        <div class="info">
                            <h3 class="mt-5 mb-5 ff-damion fc-primary">Duckonomics</h3>
                            <p class="ml-a mt-5">09/26/2023</p>
                        </div>
                        <p class="ml-10 mt-5 mb-20">
                            Duckonomics Meets Quackonomics.
                        </p>
                        <a href="{{URL('blog/blog-1')}}" class="ml-10">
                            Read blog <i class="bi bi-box-arrow-up-right"></i>
                        </a>
                    </article>
                </div>
                <div class="col-tri">
                    <article class="card-blog">
                        <img src="art/work2.webp" alt="">
                        <div class="info">
                            <h3 class="mt-5 mb-5 ff-damion fc-primary">Quackonomics</h3>
                            <p class="ml-a mt-5">09/26/2023</p>
                        </div>
                        <p class="ml-10 mt-5 mb-20">
                            A Duck's Guide to Financial Success.
                        </p>
                        <a href="{{URL('blog/blog-1')}}" class="ml-10">
                            Read blog <i class="bi bi-box-arrow-up-right"></i>
                        </a>
                    </article>
                </div>
                <div class="col-tri">
                    <article class="card-blog">
                        <img src="art/work3.webp" alt="">
                        <div class="info">
                            <h3 class="mt-5 mb-5 ff-damion fc-primary">Galactic Gastronomy</h3>
                            <p class="ml-a mt-5">09/26/2023</p>
                        </div>
                        <p class="ml-10 mt-5 mb-20">
                            Toasting with the Stars.
                        </p>
                        <a href="{{URL('blog/blog-1')}}" class="ml-10">
                            Read blog <i class="bi bi-box-arrow-up-right"></i>
                        </a>
                    </article>
                </div>
            </div>
        </section> -->
        <!-- PREVIEW BLOGS SECTION END -->

        <!-- SUBSCRIBE TO NEWS LETTERS START -->
        <section class="subscribe bg-primary-foot" style="background-image: url('art/overlay.webp');">
            <div class="contained row ta-center">
                <div class="col-balance fc-white">
                    <h3 class="mb-a ff-damion mt-a">Inscreva-se para saber mais sobre nós:</h3>
                </div>
                <div class="col-balance">
                    <form action="{{ route('contatos.store') }}" method="POST" id="newsletter-form">
                        @csrf

                        <input type="hidden" name="newslatter" value="1">
                        <input type="email" name="email" id="subscribe-email" aria-label="Receba nossos avisos" 
                            class="form-control @error('subscribe-email') is-invalid @else is-valid @enderror" 
                            placeholder="Email" required>
                            @error('email')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror

                        <button class="btn-bg2" id="btn-subscribe">Inscreva-se</button>
                    </form>
                </div>
            </div>
        </section>
        <!-- SUBSCRIBE TO NEWS LETTERS ENS -->

        <section class="contained ta-center">
            <h2 class="section-title ff-damion">Fale conosco</h2>
            <p class="col-wide mlmr-a">
                Para qualquer dúvida nos envie uma menssagem para entendermos como podemos melhor atender você.
            </p>
            <a href="{{URL('contact')}}" class="btn-bg1 border-round mt-25">
                Entrar em contato
            </a>
        </section>
    </main>

    <script>
        document.getElementById('newsletter-form').addEventListener('submit', function(e) {
            var btn = document.getElementById('btn-subscribe');
            btn.disabled = true;
            btn.innerHTML = 'Inscrevendo... <span class="spinner"></span>';
        });

        document.querySelectorAll('.youtube-facade').forEach(function(facade) {
            facade.addEventListener('click', function() {
                var videoId = this.dataset.videoId;
                var iframe = document.createElement('iframe');
                iframe.setAttribute('src', 'https://www.youtube.com/embed/' + videoId + '?autoplay=1');
                iframe.setAttribute('width', '100%');
                iframe.setAttribute('height', '100%');
                iframe.setAttribute('title', 'YouTube video player');
                iframe.setAttribute('frameborder', '0');
                iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture');
                iframe.setAttribute('allowfullscreen', '');
                iframe.style.borderRadius = '12px';

                this.innerHTML = '';
                this.appendChild(iframe);
                this.classList.remove('youtube-facade');
                this.style.backgroundImage = 'none';
                this.style.display = 'block';
            });
        });
    </script>
@endsection

@section('footer')
@endsection