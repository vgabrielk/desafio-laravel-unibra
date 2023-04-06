@extends('master')

@section('content')
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="/css/dashboard.css" />
        <title>Dashboard</title>
    </head>

    <body id="body">
        <main class="form">
            <div class="logo">
                <img src="/assets/images/logo.png" alt="" />
            </div>
            <header class="header">
                <h2>Dashboard</h2>
                <p>Parabéns, você está logado no sistema de testes</p>
            </header>
            <div class="message-logged">
                <h3>Olá <span id="user-name"> <?= session()->get('user')->fullname ?>, </span> seja bem vindo !</h3>
            </div>
            <div class="form-content">
                <a href="/change-password"  class="button-submit">Mudar senha</a>
                <a href="/logout" id="btn-logout" type="submit" class="button-secondary">Sair</a>
            </div>
        </main>
    </body>

    </html>
@endsection
