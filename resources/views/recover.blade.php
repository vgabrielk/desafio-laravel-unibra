@extends('master')

@section('content')
    <main class="form">
        <div class="logo">
            <img src="/assets//images/logo.png" alt="" />
        </div>
        <header class="header">
            <h2>Recuperar senha</h2>
            <p>Informe abaixo seu CPF para recuperar sua senha. Enviaremos um link para o email de cadastro</p>
        </header>
        <form class="form-content" id="form">
            @csrf
            <label for="nome">Cpf</label>
            <input class="input" name="cpf" id="cpf" type="text" />
            <button type="submit" class="button-submit">Enviar</button>
            <button type="submit" class="button-secondary">
                <a href="/login">Voltar</a>
            </button>
        </form>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    <script type="text/javascript">
        $("#form").on("submit", function(e) {
            e.preventDefault();
            let cpf = $("#cpf").val();
            let password = $("#password").val();

            $.ajax({
                url: "/password-email",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    cpf: cpf,
                    password: password,
                },
                success: function(response) {
                    console.log(response);
                    if (response.success) {
                        alertify.success("Link de recuperação de senha enviado com sucesso!");
                    } 
                },
                error: function(response) {
                    alertify.error("CPF não vinculado a um usuário!")
                },
            });
        });
    </script>
@endsection
