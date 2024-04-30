@extends('layout.default')

@section('head')
@endsection

<body>
    <!-- FADE OUT ANIMATION WHEN LOADED -->
    <span class="fade"></span>
    <main>

        <!-- SUB HERO BANNER START -->
        <section class="sub-hero-banner" style="background-image: url('art/hero3.webp');">
            <div class="hero-contained">
                <div class="hero-title fc-white">
                    <h1 class="ff-damion">Serviços que prestamos</h1>
                    <a href="{{URL('index')}}" class="fc-white">
                        Home
                    </a>
                    <i class="bi bi-chevron-right"></i>
                    <a href="#" class="fc-white">
                        Serviços
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

        <!-- SERVICES START -->
        <section class="contained">
            <h2 class="section-title ff-damion">Serviços</h2>
            <div class="col-wide mlmr-a ta-center">
                <span class="fc-primary fs-h2">
                    Experimente nossos serviços especializados disponiveis para nossos clientes..
                </span>
                <p>
                Somos uma empresa de contabilidade comprometida com a excelência, fornecendo serviços contábeis de alta qualidade para empresas e indivíduos. <br>
                Com uma equipe de profissionais altamente qualificados e experientes, estamos prontos para atender às suas necessidades contábeis.
                </p>
            </div>

            <div class="row">
                <div class="col-wide">

                    <!-- INDIVIDUAL SERVICES FEATURE START -->
                    <img src="{{asset('art/hero1.webp')}}" class="img-unheight" alt="" id="service-dev">
                    <span class="fs-h3 mt-25">Serviços Contábeis para Empresas</span>
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
                    <!-- INDIVIDUAL SERVICES FEATURE END -->

                    <!-- INDIVIDUAL SERVICES FEATURE START -->
                    <img src="{{asset('art/hero2.webp')}}" class="img-unheight mt-50" alt="" id="service-data">
                    <span class="fs-h3 mt-25">Serviços Contábeis para pessoa física</span>
                    <p>
                        <strong>Preparação de imposto de renda:</strong> Nossos especialistas em impostos trabalham para garantir que você esteja em conformidade com todas as leis fiscais e que esteja aproveitando todas as deduções e créditos fiscais disponíveis.<br>
                        <strong>Planejamento tributário</strong> Trabalhamos com você para desenvolver uma estratégia de planejamento tributário eficaz que pode ajudar a minimizar sua responsabilidade fiscal.<br>
                        <strong>Consultoria financeira:</strong> Nossos consultores financeiros podem fornecer orientação e conselhos sobre uma variedade de questões financeiras, incluindo planejamento de aposentadoria, investimentos e muito mais.
                    </p>
                    <!-- INDIVIDUAL SERVICES FEATURE END -->

                    <!-- INDIVIDUAL SERVICES FEATURE START -->
                    <img src="{{asset('art/hero3.webp')}}" class="img-unheight mt-50" alt="" id="service-design">
                    <span class="fs-h3 mt-25">Emissão de Certificado Digital</span>
                    <p>
                        <strong>Assinatura de documentos digitalmente:</strong> Com um certificado digital, você pode assinar documentos digitalmente, garantindo a autenticidade e integridade do documento.
                        <strong>Realização de transações seguras na internet</strong> Um certificado digital pode ser usado para criptografar dados sensíveis, garantindo que suas transações online sejam seguras.
                        <strong>Cumprimento de obrigações acessórias:</strong> Muitas obrigações fiscais e contábeis agora requerem um certificado digital para autenticação.
                    </p>
                    <p>
                        Estamos ansiosos para trabalhar com você e ajudar a atender às suas necessidades contábeis. Entre em contato conosco hoje mesmo para saber mais sobre nossos serviços.
                    </p>
                    <!-- INDIVIDUAL SERVICES FEATURE END -->
                </div>

                <!-- SERVICES SIDE BAR SHORTCUT LINKS START -->
                <div class="col-slim order-tab-1">
                    <div class="card-side card-side-navigation">
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
        <!-- SERVICES END -->
    </main>
    
    <!-- FOOTER START -->
    @section('footer')
    @endsection
    <!-- FOOTER END -->
    
</body>
</html>