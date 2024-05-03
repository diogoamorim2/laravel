<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
            <title>Obrigado por se inscrever na nossa newsletter</title>
            <style>
            body {
                font-family: Arial, sans-serif;
            }
            .container {
                width: 80%;
                margin: auto;
            }
            .header {
                text-align: center;
                padding: 20px;
                background-color: #f8f9fa;
                border-bottom: 1px solid #dee2e6;
            }
            .content {
                padding: 20px;
            }
            .footer {
                text-align: center;
                padding: 20px;
                background-color: #f8f9fa;
                border-top: 1px solid #dee2e6;
            }
            .col-quad {
                text-align: center; /* Isso centralizará os elementos dentro da div */
            }

            .col-quad a {
                display: inline-block; /* Isso fará com que os links se comportem como elementos em linha */
                margin: 0 10px; /* Isso adiciona margem entre os elementos para separá-los */
            }
            .col-quad p {
                display: inline-block; /* Isso fará com que os links se comportem como elementos em linha */
                margin: 0 10px; /* Isso adiciona margem entre os elementos para separá-los */
            }
            </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h1>Obrigado por se inscrever em nossa newsletter!</h1>
            </div>
            <div class="content">
                <p>Olá, {{ $contatoName }}</p>
                <br>
                <p>Obrigado por se inscrever na nossa newsletter. Estamos animados para compartilhar as últimas notícias, atualizações e ofertas com você.</p>
                <p>Fique atento à sua caixa de entrada para nossas próximas mensagens.</p>
                <br>
                <p>Atenciosamente,</p>
                <p>Siscon Contabilidade</p>
            </div>
            <div class="footer">
                <div class="contained row flex-just-center">
                    <!-- FOOTER WEBSITE MOTO START -->
                    <div class="col-quad">
                        <h3 class="ff-damion">Siscon</h3>
                        <!-- <p>
                            Nossa missão é empoderar empresas e indivíduos através de serviços contábeis excepcionais e personalizados. <br>
                        </p> -->
                        <p>
                            Nos dedicamos a ajudar nossos clientes a alcançar seus objetivos financeiros, fornecendo orientação contábil precisa, estratégias de planejamento tributário eficazes e soluções digitais seguras.
                        </p>
                        <p>
                            Acreditamos no poder da tecnologia para simplificar a contabilidade e estamos comprometidos em fornecer soluções inovadoras, como a emissão de certificados digitais, para manter nossos clientes à frente na era digital.
                        </p>
                    </div>
                    <!-- FOOTER WEBSITE MOTO END -->
            
                    <!-- FOOTER QUICK CONTACT START -->
                    <div class="col-quad">
                        <h3 class="ff-damion">Fale conosco</h3>
                        <p>
                            contato@sisconsp.com.br
                        </p>

                        <p>
                            (11) 9 6587-3624
                        </p>

                        <a href="{{URL('https://maps.app.goo.gl/v68DNXwJwkwtCE6s5')}}" class="display-block fc-white icon-link mt-10 mb-10">
                            Estrada do Aderno, 52 - Carapicuíba - SP
                        </a>
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
            </div>
        </div>
    </body>
</html>