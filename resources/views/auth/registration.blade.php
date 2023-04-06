@extends('master')

@section('content')
    <main class="form">
        <div class="logo">
            <img src="/assets/images/logo.png" alt="" />
        </div>
        <header class="header">
            <h2>Cadastro</h2>
            <p>Informe os dados abaixo para poder se cadastrar no sistema.</p>
        </header>
        <form id="form" class="form-content">
            @csrf
            <label for="nome">Nome completo</label>
            <input autocomplete="off" class="input" id="fullname" name="fullname" type="text" />
            <label for="cpf">Cpf</label>
            <input autocomplete="off" class="input" id="cpf" name="cpf" type="number" />
            <label for="email">Email</label>
            <input autocomplete="off" class="input" id="email" name="email" type="email" />
            <label for="password">Senha</label>
            <input type="password"id="password" name="password" class="input" type="text" />
            <button type="submit" class="button-submit">Cadastrar</button>
                <a class="buttton-secondary" href="/login">
                    Voltar
                </a>
        </form>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

    <script type="text/javascript">
        $("#form").on("submit", function(e) {
            e.preventDefault();
            let fullname = $("#fullname").val();
            let cpf = $("#cpf").val();
            let email = $("#email").val();
            let password = $("#password").val();

            $.ajax({
                url: "/registration",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    fullname: fullname,
                    cpf: cpf,
                    email: email,
                    password: password,
                },
                success: function(response) {
                    console.log(response)
                    if (response.success) {
                        alertify.success(response.success);
                        setTimeout(() => {
                            window.location.href = "/login";
                        }, 1200);
                    } else {
                        alertify.error(response?.error);
                    }
                },
                error: function(response) {},
            });
        });
    </script>
@endsection
