@extends('master')

@section('content')
    <main class="form">
        <div class="logo">
            <img src="/assets//images/logo.png" alt="" />
        </div>
        <header class="header">
            <h2>Nova senha</h2>
            <p>Informe abaixo sua nova senha.</p>
        </header>
        <form class="form-content" id="form">
            @csrf
            <label for="nome">Nova senha</label>
            <input class="input" name="password" id="password" type="password" />
            <label for="nome">Confirme a nova senha</label>
            <input class="input" id="passwordConfirm" name="passwordConfirm" type="password" />
            <button type="submit" class="button-submit">Enviar</button>
            <button type="submit" class="button-secondary">
                <a href="/dashboard">Voltar</a>
            </button>
        </form>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script type="text/javascript">
        $('#form').on('submit', function(e) {
            e.preventDefault();
            let password = $('#password').val();
            let passwordConfirm = $('#passwordConfirm').val();

            $.ajax({
                url: "/change-password",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    password: password,
                    passwordConfirm: passwordConfirm
                },
                success: function(response) {
                    if (!response[1].includes('As senhas são diferentes')) {
                        alertify.success("✔ Senha alterada com sucesso!");
                        setTimeout(() => {
                            window.location.href = '/dashboard'
                        }, 1200);
                    }
                    else {
                        alertify.error("✘ As senhas não coincidem!");
                    }
                },
                error: function(response) {
                    window.location.href = '/login'
                },
            });
        });
    </script>
@endsection
