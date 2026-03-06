@extends('layout.default')

@section('head')
    {{--
        ⚡ Bolt Optimization: Preload LCP image to improve Largest Contentful Paint.
    --}}
    <link rel="preload" as="image" href="{{ asset('art/hero1.webp') }}">
@endsection

@section('content')
    <!-- FADE OUT ANIMATION WHEN LOADED -->
    <span class="fade"></span>
    <main id="main-content" tabindex="-1">
        <!-- SUB HERO BANNER START -->
        <section class="sub-hero-banner sub-hero-bg-about">
            <div class="hero-contained">
                <div class="hero-title fc-white">
                    <h1 class="ff-damion">Sobre nós</h1>
                    <nav aria-label="Breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="{{ url('/') }}" class="fc-white">Home</a></li>
                            <li><span class="fc-white" aria-current="page">Sobre nós</span></li>
                        </ol>
                    </nav>
                </div>
                <!-- INICIO REDES SOCIAIS -->
                
                <!-- FINAL REDES SOCIAIS -->
            </div>
        </section>
        <!-- SUB HERO BANNER END -->

        <!-- NAVIGATION START -->

        @include('layout.nav')

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
                    <!-- <img src="{{asset('art/hero1.webp')}}" alt=""> -->
                    <img loading="lazy" src="{{asset('svg/blob.svg')}}" alt="" class="blob">
                    <img loading="lazy" src="{{asset('art/hero2.webp')}}" alt="">
                </div>
            </div>
            <div class="sticky-img-dual-spacer"></div>
            
            
            <div class="col-balance">
                <div class="sticky-img-dual">
                    <img loading="lazy" src="{{asset('svg/blob.svg')}}" alt="" class="blob">
                    <img loading="lazy" src="{{asset('art/hero1.webp')}}" alt="">
                    <!-- <img src="{{asset('art/hero2.webp')}}" alt=""> -->
                </div>
            </div>
            <div class="col-balance">
                <h2 class="section-title ff-damion">Sobre nós</h2>
                <span class="fc-primary fs-h2">
                    Serviços Contábeis para pessoa física
                </span>
                <p>
                    Além de atender empresas, a Siscon oferece um conjunto abrangente de serviços contábeis especializados para pessoas físicas. Nossa missão é simplificar sua vida financeira e maximizar seus benefícios fiscais.
                    <br>
                    <br>
                    <span class="fc-primary fs-h2">
                        Nossos Serviços Incluem:
                    </span>
                    <ul>
                        <strong>Preparação de Imposto de Renda:</strong>
                        <ul>
                            <li>Análise detalhada de sua situação fiscal</li>
                            <li>Preenchimento preciso da declaração</li>
                            <li>Identificação de todas as deduções possíveis</li>
                            <li>Acompanhamento pós-entrega e suporte em caso de malha fina</li>
                        </ul>
                        <strong>Planejamento Tributário Personalizado:</strong>
                        <ul>
                            <li>Avaliação completa de sua situação financeira</li>
                            <li>Estratégias para otimização da carga tributária</li>
                            <li>Recomendações para investimentos fiscalmente eficientes</li>
                            <li>Planejamento sucessório e patrimonial</li>
                        </ul>
                        <strong>Consultoria Financeira Abrangente:</strong>
                        <ul>
                            <li>Análise de fluxo de caixa pessoal</li>
                            <li>Aconselhamento para gestão de dívidas</li>
                            <li>Planejamento para aposentadoria</li>
                            <li>Orientação para investimentos alinhados com seus objetivos</li>
                        </ul>
                        <strong>Serviços Especializados:</strong>
                        <ul>
                            <li>Assessoria para profissionais autônomos e freelancers</li>
                            <li>Consultoria para expatriados e não-residentes</li>
                            <li>Planejamento financeiro para eventos de vida (casamento, filhos, compra de imóveis)</li>
                        </ul>
                    </ul>
                </p>
            </div>
            <div class="sticky-img-dual-spacer"></div>

            <div class="col-balance">
                <h2 class="section-title ff-damion">Sobre nós</h2>
                <span class="fc-primary fs-h2">
                    Emissão de Certificado Digital.
                </span>
                <p>
                    Aqui na Siscon, não nos limitamos apenas aos serviços contábeis tradicionais. Expandimos nossa oferta para incluir soluções digitais essenciais para o seu negócio no mundo moderno.
                </p>
                <p>
                    Estamos ansiosos para trabalhar com você e ajudar a atender às suas necessidades contábeis. Entre em contato conosco hoje mesmo para saber mais sobre nossos serviços.
                </p>
                <span class="fc-primary fs-h2"> 
                    Digital: Sua Identidade no Mundo Virtual
                </span>
                <p>
                    Além de nossa expertise contábil, oferecemos serviços de emissão de certificado digital, uma ferramenta indispensável para empresas e profissionais no ambiente digital atual.
                </p>
                <span class="fc-primary fs-h2">
                    O que é o Certificado Digital?
                </span>
                <p>
                    O certificado digital é uma identidade eletrônica que garante a autenticidade e a segurança de suas transações online. É como um documento de identidade virtual, único e intransferível.
                <p>
                <span class="fc-primary fs-h2">
                    Benefícios do Certificado Digital:
                </span>
                <ul>
                    <li> Assinatura Digital de Documentos: Assine contratos e documentos oficiais eletronicamente, com validade jurídica.</li>
                    <li>Transações Seguras: Realize operações bancárias e financeiras online com máxima segurança.</li>
                    <li>Cumprimento de Obrigações Acessórias: Envie declarações e cumpra obrigações fiscais de forma eficiente e segura.</li>
                    <li>Economia de Tempo: Elimine a necessidade de deslocamentos para realizar processos burocráticos.</li>
                    <li>Sustentabilidade: Reduza o uso de papel, contribuindo para a preservação do meio ambiente.</li>
                </ul>
                <span class="fc-primary fs-h2">
                    Nosso Compromisso
                </span>
                <p>
                    Estamos empenhados em oferecer soluções contábeis abrangentes e inovadoras, adaptadas às necessidades específicas do seu negócio. Nossa equipe de especialistas está pronta para guiá-lo através dos complexos cenários contábeis e digitais, garantindo conformidade e eficiência.
                </p>
                <span class="fc-primary fs-h2">
                    Entre em Contato
                </span>
                <p>
                    Descubra como podemos impulsionar o sucesso do seu negócio com nossos serviços contábeis especializados e soluções de certificação digital. Entre em contato conosco hoje mesmo para uma consulta personalizada e gratuita.
                </p>
                <a href="{{URL('contact')}}" class="btn-bg1 border-round">Fale conosco</a>
            </div>
            <div class="col-balance">
                <div class="sticky-img-dual">
                    <img loading="lazy" src="{{asset('svg/blob.svg')}}" alt="" class="blob">
                    <img loading="lazy" src="{{asset('image/banner.webp')}}" alt="">
                </div>
            </div>
            <div class="sticky-img-dual-spacer"></div>
        </section>
        
        <a href="https://wa.me/5511965873624"
            target="_blank"
            rel="noopener noreferrer"
            class="whatsapp-button"
            aria-label="Fale conosco pelo WhatsApp"
            title="Fale conosco pelo WhatsApp">  {{-- Label para acessibilidade --}}
        
            <img loading="lazy" src="{{asset('image/whatsbggreen.webp')}}" width="300" height="300"
                alt="Ícone WhatsApp"> {{-- Alt text descrevendo a imagem --}}
        
            {{-- Opcional: Texto para leitores de tela, se quiser ser mais explícito --}}
            {{-- <span class="sr-only">Fale conosco pelo WhatsApp</span> --}}
        </a>

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
    
@endsection

@section('footer')
@endsection