<!DOCTYPE html>
<html lang="pt-br">
    <head>
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
            table {
              font-family: arial, sans-serif;
              border-collapse: collapse;
              width: 80%;
              border-left: 1px;
              border-right: 1px;
            }

            td, th {
              text-align: left;
              padding: 8px;
            }
            .footer {
                 background-color: #f8f9fa;
                border-bottom: 1px solid #dee2e6;
            }
        </style>
        <meta charset="UTF-8">
        <title>@yield('title')</title>

        
        <link rel="preload" href="{{URL('icons/bootstrap-icons.css')}}" as="style">
        <link rel="preload" href="{{URL('css/fontstyle.css')}}" as="style">
        <link rel="preload" href="{{URL('css/layout.css')}}" as="style">
        <link rel="preload" href="{{URL('css/style.css')}}" as="style">
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
    <footer class="footer">
        <table>
            <tr>
                <a href="{{URL('index')}}"> <th rowspan="5"><img src="{{URL('image/logo-removebg.png')}}"></th> </a>
                <th>Fale conosco</th>
                <th>Links úteis</th>
                <th>Contato</th>
            </tr>
            
            <tr>
                <td>
                    <!-- <h3 class="ff-damion">Fale conosco</h3> -->
                    <p>
                        contato@sisconsp.com.br
                    </p>
                </td>
                <td>
                    <p>
                        (11) 9 6587-3624
                    </p>
                </td>
                <td>
                    <a href="{{URL('https://maps.app.goo.gl/v68DNXwJwkwtCE6s5')}}" class="display-block fc-white icon-link mt-10 mb-10">
                        Estrada do Aderno, 50 - Carapicuíba - SP
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="{{URL('index')}}" class="display-block fc-white mt-5 mb-5">
                        Home
                    </a>
                </td>
                <td>
                    <a href="{{URL('about')}}" class="display-block fc-white mt-5 mb-5">
                        Sobre nós
                    </a>
                </td>
                <td>
                    <a href="{{URL('service')}}" class="display-block fc-white mt-5 mb-5">
                        Serviços
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="{{URL('contact')}}" class="display-block fc-white mt-5 mb-5">
                        Contato
                    </a>
                </td>
            </tr>
        </table>
       
        <div class="copy ta-center fc-white">
            <small>&copy; Siscon contabilidade - Copyright 2024</small>
        </div>
    </footer>
</html>
