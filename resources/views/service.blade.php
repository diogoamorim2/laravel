@extends('layout.default')

@section('head')
    {{--
        ⚡ Bolt Optimization: Preload LCP image to improve Largest Contentful Paint.
    --}}
    <link rel="preload" as="image" href="{{ asset('art/hero3.webp') }}">
@endsection

@section('content')
    <!-- FADE OUT ANIMATION WHEN LOADED -->
    <span class="fade"></span>
    <main id="main-content" tabindex="-1">

        <!-- SUB HERO BANNER START -->
        <section class="sub-hero-banner sub-hero-bg-service">
            <div class="hero-contained">
                <div class="hero-title fc-white">
                    <h1 class="ff-damion">Serviços que oferecemos</h1>
                    <nav aria-label="Breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="{{ url('/') }}" class="fc-white">Home</a></li>
                            <li><span class="fc-white" aria-current="page">Serviços</span></li>
                        </ol>
                    </nav>
                </div>
            </div>
                 <!-- INICIO REDES SOCIAIS -->
                <!-- FINAL REDES SOCIAIS -->
        </section>
        <!-- SUB HERO BANNER END -->

        <!-- NAVIGATION START -->
        @include('layout.nav')
        <!-- NAVIGATION END -->

        <!-- SERVICES START -->
        <section class="contained">
            <h2 class="section-title ff-damion">Serviços</h2>
            <div class="col-wide mlmr-a ta-center">
                <p class="fc-primary fs-h2">
                    Experimente nossos serviços especializados disponiveis para nossos clientes.
                </p>
                <p>
                Somos uma empresa de contabilidade comprometida com a excelência, fornecendo serviços contábeis de alta qualidade para empresas e indivíduos. <br>
                Com uma equipe de profissionais altamente qualificados e experientes, estamos prontos para atender às suas necessidades contábeis.
                </p>
            </div>

            <div class="row">
                <div class="col-wide">

                    <!-- INDIVIDUAL SERVICES FEATURE START -->
                    <div id="service-dev" tabindex="-1">
                        <img loading="lazy" src="{{asset('art/hero1.webp')}}" class="img-unheight" width="1920" height="1246" alt="">
                        <h3 class="fc-primary fs-h2"> Serviços Contábeis para Empresas</h3>
                        <p>
                            Nossos serviços contábeis para empresas são projetados para fornecer um suporte financeiro completo para o seu negócio. <br>
                            Oferecemos uma variedade de serviços, incluindo:
                        </p>
                        <p>
                            <strong>Preparação de declarações fiscais: </strong>Nossos especialistas em impostos trabalham diligentemente para garantir que sua empresa esteja em conformidade com todas as leis fiscais aplicáveis e que você esteja aproveitando todas as deduções e créditos fiscais disponíveis.<br>
                            <strong>Contabilidade financeira: </strong>Fornecemos relatórios financeiros precisos e oportunos que ajudam você a entender a saúde financeira da sua empresa e a tomar decisões informadas.<br>
                            <strong>Folha de pagamento: </strong>Nosso serviço de folha de pagamento cuida de todas as suas necessidades de folha de pagamento, garantindo que seus funcionários sejam pagos corretamente e no prazo.<br>
                            <strong>Auditoria: </strong>Nossos auditores podem realizar uma auditoria completa das suas finanças para garantir a conformidade e identificar áreas de melhoria.
                        </p>
                    </div>
                    <!-- INDIVIDUAL SERVICES FEATURE END -->

                    <!-- INDIVIDUAL SERVICES FEATURE START -->
                    <div id="service-data" tabindex="-1" class="mt-50">
                        <img loading="lazy" src="{{asset('art/hero2.webp')}}" class="img-unheight" width="1920" height="1246" alt="">
                        <h3 class="fc-primary fs-h2"> Serviços Contábeis para pessoa física</h3>
                        <p>
                            Além de atender empresas, a Siscon oferece um conjunto abrangente de serviços contábeis especializados para pessoas físicas. Nossa missão é simplificar sua vida financeira e maximizar seus benefícios fiscais.
                        </p>
                        <br>
                        <h4 class="fc-primary fs-h3">
                            Nossos Serviços Incluem:
                        </h4>
                        <div>
                            <strong class="display-block mb-10">Preparação de Imposto de Renda:</strong>
                            <ul>
                                <li>Análise detalhada de sua situação fiscal</li>
                                <li>Preenchimento preciso da declaração</li>
                                <li>Identificação de todas as deduções possíveis</li>
                                <li>Acompanhamento pós-entrega e suporte em caso de malha fina</li>
                            </ul>
                        </div>
                        <div class="mt-20">
                            <strong class="display-block mb-10">Planejamento Tributário Personalizado:</strong>
                            <ul>
                                <li>Avaliação completa de sua situação financeira</li>
                                <li>Estratégias para otimização da carga tributária</li>
                                <li>Recomendações para investimentos fiscalmente eficientes</li>
                                <li>Planejamento sucessório e patrimonial</li>
                            </ul>
                        </div>
                        <div class="mt-20">
                            <strong class="display-block mb-10">Consultoria Financeira Abrangente:</strong>
                            <ul>
                                <li>Análise de fluxo de caixa pessoal</li>
                                <li>Aconselhamento para gestão de dívidas</li>
                                <li>Planejamento para aposentadoria</li>
                                <li>Orientação para investimentos alinhados com seus objetivos</li>
                            </ul>
                        </div>
                        <div class="mt-20">
                            <strong class="display-block mb-10">Serviços Especializados:</strong>
                            <ul>
                                <li>Assessoria para profissionais autônomos e freelancers</li>
                                <li>Consultoria para expatriados e não-residentes</li>
                                <li>Planejamento financeiro para eventos de vida (casamento, filhos, compra de imóveis)</li>
                            </ul>
                        </div>
                    <!-- INDIVIDUAL SERVICES FEATURE END -->

                    <!-- INDIVIDUAL SERVICES FEATURE START -->
                    <div id="service-design" tabindex="-1" class="mt-50">
                        <img loading="lazy" src="{{asset('art/hero3.webp')}}" class="img-unheight" width="1920" height="1246" alt="">
                        <h3 class="fc-primary fs-h2">Emissão de Certificado Digital.</h3>
                        <p>
                            Aqui na Siscon, não nos limitamos apenas aos serviços contábeis tradicionais. Expandimos nossa oferta para incluir soluções digitais essenciais para o seu negócio no mundo moderno.
                        </p>
                        <p>
                            Estamos ansiosos para trabalhar com você e ajudar a atender às suas necessidades contábeis. Entre em contato conosco hoje mesmo para saber mais sobre nossos serviços.
                        </p>
                        <h4 class="fc-primary fs-h3">
                            Digital: Sua Identidade no Mundo Virtual
                        </h4>
                        <p>
                            Além de nossa expertise contábil, oferecemos serviços de emissão de certificado digital, uma ferramenta indispensável para empresas e profissionais no ambiente digital atual.
                        </p>
                        <h4 class="fc-primary fs-h3">
                            O que é o Certificado Digital?
                        </h4>
                        <p>
                            O certificado digital é uma identidade eletrônica que garante a autenticidade e a segurança de suas transações online. É como um documento de identidade virtual, único e intransferível.
                        </p>
                        <h4 class="fc-primary fs-h3">
                            Benefícios do Certificado Digital:
                        </h4>
                        <ul>
                            <li> Assinatura Digital de Documentos: Assine contratos e documentos oficiais eletronicamente, com validade jurídica.</li>
                            <li>Transações Seguras: Realize operações bancárias e financeiras online com máxima segurança.</li>
                            <li>Cumprimento de Obrigações Acessórias: Envie declarações e cumpra obrigações fiscais de forma eficiente e segura.</li>
                            <li>Economia de Tempo: Elimine a necessidade de deslocamentos para realizar processos burocráticos.</li>
                            <li>Sustentabilidade: Reduza o uso de papel, contribuindo para a preservação do meio ambiente.</li>
                        </ul>
                        <h4 class="fc-primary fs-h3">
                            Nosso Compromisso
                        </h4>
                        <p>
                            Estamos empenhados em oferecer soluções contábeis abrangentes e inovadoras, adaptadas às necessidades específicas do seu negócio. Nossa equipe de especialistas está pronta para guiá-lo através dos complexos cenários contábeis e digitais, garantindo conformidade e eficiência.
                        </p>
                        <h4 class="fc-primary fs-h3">
                            Entre em Contato
                        </h4>
                        <p>
                            Descubra como podemos impulsionar o sucesso do seu negócio com nossos serviços contábeis especializados e soluções de certificação digital. Entre em contato conosco hoje mesmo para uma consulta personalizada e gratuita.
                        </p>
                        <a href="{{URL('contact')}}" class="btn-bg1 border-round">Fale conosco</a>
                    </div>
                    <!-- INDIVIDUAL SERVICES FEATURE END -->
                </div>

                <!-- SERVICES SIDE BAR SHORTCUT LINKS START -->
                <div class="col-slim order-tab-1">
                    <div class="card-side card-side-navigation" role="navigation" aria-label="Navegação rápida de serviços">
                        <h3 class="no-margin ff-damion">Serviços</h3>
                        <hr>
                        <a href="#service-dev">Serviços Contábeis para Empresas</a>
                        <a href="#service-data">Serviços Contábeis para Indivíduos</a>
                        <a href="#service-design">Emissão de Certificado Digital</a>
                    </div>
                </div>
                <!-- SERVICES SIDE BAR SHORTCUT LINKS END -->

            </div>
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
        <!-- SERVICES END -->
    </main>
    
@endsection

@section('footer')
@endsection