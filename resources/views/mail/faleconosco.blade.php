@extends('mail.layout')

<!DOCTYPE html>
<html lang="pt-br">
        <!-- header -->
        @section('title', 'Obrigado por enviar usa dúvida para nós.')

        @section('content')
        <body>
            <div class="container">
                <div class="header">
                    <h1>Obrigado por nos enviar a sua dúvda!</h1>
                </div>
                <div class="content">
                    <p>Olá, {{ $contatoName }}</p>
                    <br>
                    <p>Obrigado por se nos enviar a sua dúvida. Iremos analisar e responder no menor tempo possível, por favor fique a vontade para entrar em contato conosco.</p>
                    <p>Fique atento à sua caixa de entrada para nossas próximas mensagens.</p>
                    <br>
                    <p>Atenciosamente,</p>
                    <p>Siscon Contabilidade</p>
                </div>
            </div>
        </body>
    @endsection
</html>
