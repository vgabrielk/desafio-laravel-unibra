@extends('master')

@section('content')
    <main class="form">
        <div class="logo">
            <img src="/assets/images/logo.png" alt="" />
        </div>
        <header class="header">
            <h2>Resetar senha</h2>
        </header>
        <form action="{{ route('reset') }}" class="form-content" method="POST">
            @csrf
            <label for="password-new">Nova senha</label>
            <input autocomplete="off" class="input" id="password" name="password-new" type="text" />
            <label for="cpf">Confirmar nova senha</label>
            <input autocomplete="off" class="input" id="password_confirmation" name="password-new-confirm" type="text" />
            <button type="submit" class="button-submit">Enviar</button>
            <button type="button" class="button-secondary">
                <a href="/login">
                    Voltar
                </a>
            </button>
        </form>
    </main>
@endsection
