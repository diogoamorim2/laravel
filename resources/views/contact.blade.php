@extends('layout.default')

@section('head')
    {{--
        ⚡ Bolt Optimization: Preload LCP image to improve Largest Contentful Paint.
    --}}
    <link rel="preload" as="image" href="{{ asset('art/hero2.webp') }}">

    {{--
        ⚡ Bolt Optimization: Preconnect to Google Maps domains.
        This speeds up the map iframe loading by performing DNS/TCP handshakes early.
    --}}
    <link rel="preconnect" href="https://www.google.com">
    <link rel="dns-prefetch" href="https://www.google.com">
    <link rel="preconnect" href="https://maps.gstatic.com">
    <link rel="dns-prefetch" href="https://maps.gstatic.com">
@endsection

@section('content')
    <!-- FADE OUT ANIMATION WHEN LOADED -->
    <span class="fade"></span>
    <main id="main-content" tabindex="-1">
        <!-- SUB HERO BANNER START -->
        <section class="sub-hero-banner sub-hero-bg-contact">
            <div class="hero-contained">
                <div class="hero-title fc-white">
                    <h1 class="ff-damion">Fale conosco</h1>
                    <nav aria-label="Breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="{{ url('/') }}" class="fc-white">Home</a></li>
                            <li><span class="fc-white" aria-current="page">Fale conosco</span></li>
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

        
        <section class="contained">
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
    
            </div>
            <!-- USER FEEDBACK END -->
            <h2 class="section-title ff-damion">Nos encontre</h2>
            <p class="col-wide ta-center mlmr-a">
                Estamos localizados próximo ao largo da vila Menck em Carapicuíba ao lado da auto-peças NVR.
            </p>
            <div class="row">
                <!-- EMBEDED MAP IFRAME START -->
                <div class="col-balance map-embed">
                    <iframe title="Mapa de localização da Siscon Contabilidade" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.823880210025!2d-46.8454585!3d-23.538836099999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cf0176bf7078b9%3A0xe39d1a9bc9557b5f!2sEstr.%20do%20Aderno%2C%2050%20-%20Vila%20Menk%2C%20Carapicu%C3%ADba%20-%20SP%2C%2006390-070!5e0!3m2!1spt-BR!2sbr!4v1714513667536!5m2!1spt-BR!2sbr" width="600" height="450" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <!-- EMBEDED MAP IFRAME END -->

                <!-- CONTACT INFO START -->
                <div class="col-balance">
                    <span class="fs-h4 mb-15 mt-25 fc-primary">Onde nos encontrar:</span>
                    <a href="https://www.google.com/maps/search/?api=1&query=Estrada+do+Aderno,+50,+Carapicuíba,+SP" target="_blank" rel="noopener noreferrer" class="display-inblock">
                        <i aria-hidden="true" class="bi bi-geo-alt-fill"></i>
                        Estrada do Aderno, 50
                    </a>
                    
                    <span class="fs-h4 mb-15 mt-25 fc-primary">Nos ligue:</span>
                    <a href="mailto:contato@sisconsp.com.br" class="display-inblock">
                        <i aria-hidden="true" class="bi bi-envelope-fill"></i>
                        contato@sisconsp.com.br
                    </a>
                    <a href="https://wa.me/11965873624" class="display-inblock" target="_blank" rel="noopener noreferrer">
                        <i aria-hidden="true" class="bi bi-whatsapp"></i>
                        (11) 9 6587-3624
                    </a>
                    <form action="{{ route('contatos.store') }}" method="POST" class="message-form mt-50 mb-25" id="contact-form">
                        @csrf
                        {{-- Honeypot field for spam protection --}}
                        <input type="text" name="fax" class="honeypot" tabindex="-1" autocomplete="off">

                        <span class="fs-h4 fc-primary mb-15">Envie uma mensagem para nós</span>
                        <div class="row mb-20">
                            <input type="hidden" name='newslatter' value="1">
                            <div class="col-balance">
                                <label for="message-name" class="sr-only">Seu nome</label>
                                <input name="nome" type="text" id="message-name" placeholder="Seu nome *" aria-label="Digite seu nome" required maxlength="255"
                                    class="@error('nome') is-invalid @enderror"
                                    aria-invalid="{{ $errors->has('nome') ? 'true' : 'false' }}"
                                    aria-describedby="error-nome"
                                    autocomplete="name">
                                @error('nome')
                                    <span id="error-nome" class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-balance ml-a">
                                <label for="message-email" class="sr-only">Seu email</label>
                                <input name="email" type="email" id="message-email" placeholder="Seu email *" aria-label="Digite seu email" required maxlength="255"
                                    class="@error('email') is-invalid @enderror"
                                    aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}"
                                    aria-describedby="error-email"
                                    autocomplete="email">
                                @error('email')
                                    <span id="error-email" class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-20">
                            <label for="message-subject" class="sr-only">Assunto</label>
                            <input name="assunto" type="text" id="message-subject" aria-label="Nos fale o tema da pergunta" placeholder="Assunto" maxlength="255"
                                class="@error('assunto') is-invalid @enderror"
                                aria-invalid="{{ $errors->has('assunto') ? 'true' : 'false' }}"
                                aria-describedby="error-assunto">
                            @error('assunto')
                                <span id="error-assunto" class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="message-message" class="sr-only">Mensagem</label>
                            <textarea name="comentario" id="message-message" rows="5" placeholder="Escreva a sua mensagem" aria-label="Escreva a sua mensagem" maxlength="2000"
                                class="@error('comentario') is-invalid @enderror"
                                aria-invalid="{{ $errors->has('comentario') ? 'true' : 'false' }}"
                                aria-describedby="error-comentario char-count-comentario"></textarea>
                            @error('comentario')
                                <span id="error-comentario" class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="row"><small id="char-count-comentario" class="fc-primary ml-a">0/2000</small></div>
                        </div>
                        <button type="submit" class="btn-bg1 border-round mt-20" id="btn-submit">Enviar mensagem</button>
                    </form>
                </div>
                <!-- CONTACT INFO END -->

            </div>
        </section>

    </main>

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
@endsection

@section('footer')
@endsection