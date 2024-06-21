@extends('mail.layout')

<!DOCTYPE html>
<html lang="pt-br">
        <!-- header -->
        @section('title', 'Nova mensagem enviado pelo site Siscon.')

        @section('content')
        <body>
            <div class="container">
                <div class="header">
                    <h1>Obrigado por nos enviar a sua dúvda!</h1>
                </div>
                <div class="content">
                    <p>Olá, Contato Siscon</p>
                    <br>
                    <p>Recebemos novo questionamento recebido pelo site:</p>
                    <p>Nome do contato: {{ $contatoName }}</p>
                    <p>Email: {{ $email }}</p>
                    <p>Assunto: {{ $assunto }}</p>
                    <p>Telefone_fixo: {{ $telefone_fixo }}</p>
                    <p>Telefone celular: {{ $telefone_celular }}</p>
                    <p>Empresa nome: {{ $empresa_nome }}</p>
                    <p>Empresa Contato: {{ $empresa_contato }}</p>
                    <p>Comentario: {{ $comentario }}</p>
                    <br>
                    <p>Atenciosamente,</p>
                    <p>Siscon Contabilidade</p>
                </div>
            </div>
        </body>
    @endsection
</html>
