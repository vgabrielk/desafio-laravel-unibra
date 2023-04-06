@extends('master') @section('content')
    <main class="form">
        <div class="logo">
            <img src="/assets/images/logo.png" alt="" />
        </div>
        <header class="header">
            <h2>Autenticação</h2>
            <p>
                Informe abaixo seu CPF e senha para fazer login no sistema da
                unibra.
            </p>
        </header>
        <form class="form-content" id="form">
            @csrf
            <label for="cpf">CPF</label>
            <input class="input" id="cpf" required name="cpf" type="number" />
            <span id="cpf-error" class="error"></span>
            <label for="password">Senha</label>
            <input type="password" id="password" required name="password" class="input" type="text" />
            <span id="password-error" class="error"></span>
            <button type="submit" class="button-submit">Entrar</button>
            <a href="/recover-password">Recuperar minha senha</a>
            <a href="/registration">Fazer cadastro</a>
        </form>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script type="text/javascript">
        $("#form").on("submit", function(e) {
            e.preventDefault();
            let cpf = $("#cpf").val();
            let password = $("#password").val();
           

            $.ajax({
                url: "/login",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    cpf: cpf,
                    password: password,
                },
                success: function(response) {
                    if (response.success) {
                        alertify.success(response.success);
                        console.log(cpf, password)
                        setTimeout(() => {
                            return (window.location.href = "/dashboard");
                        }, 1200);
                    } else {
                        alertify.error("✘ Usuário não existe ou senha incorreta!");
                        console.log(cpf, password)
                    }
                },
                error: function(response) {
                    alertify.error("✘ Usuário não existe ou senha incorreta!");
                    setTimeout(() => {
                        window.location.href = "/login";
                    },1200)
                },
            });
        });
    </script>
@endsection
