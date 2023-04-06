@extends('master')

@section('content')
    <main class="form">
        <div class="logo">
            <img src="/assets//images/logo.png" alt="" />
        </div>
        <header class="header">
            <h2 style="text-align: center">Home Unibra!</h2>
        </header>
        <div class="form-content">
            @csrf
                <a class="button-submit" href="/login">Ir para tela de login</a>
        </div>
    </main>
@endsection
