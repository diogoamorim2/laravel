@extends('mail.layout')

<!DOCTYPE html>    
<!-- header -->
    @section('title', 'Obrigado pelo cadastro em nossa newsletter.')

    @section('content')    
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
            </div>
        </body>
    @endsection
</html>
