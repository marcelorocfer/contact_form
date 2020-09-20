<!doctype html>
<html lang="pt-br">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Formulário de Contato</title>
    <style>
        body {
            padding: 0px;
        }

        .navbar {
            margin-bottom: 20px;
        }

        :root {
            --jumbotron-padding-y: 10px;
        }

        .jumbotron {
            padding-top: var(--jumbotron-padding-y);
            padding-bottom: var(--jumbotron-padding-y);
            margin-bottom: 0;
            background-color: #fff;
        }

        @media (min-width: 768px) {
            .jumbotron {
                padding-top: calc(var(--jumbotron-padding-y) * 2);
                padding-bottom: calc(var(--jumbotron-padding-y) * 2);
            }
        }

        .jumbotron p:last-child {
            margin-bottom: 0;
        }

        .jumbotron-heading {
            font-weight: 300;
        }

        .jumbotron .container {
            max-width: 40rem;
        }

        .btn-card {
            margin: 4px;
        }

        .btn {
            margin-right: 5px;
        }

        footer {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        footer p {
            margin-bottom: .25rem;
        }
    </style>
</head>
<body>

<header>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <strong>Formulário de Contato</strong>
            </a>
        </div>
    </div>
</header>

<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Envie a sua mensagem</h1>
            <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
                @csrf

                @if($errors)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                @if(session('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                @endif

                <div class="form-group text-left">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o Seu Nome">
                </div>
                <div class="form-group text-left">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="nome@dominio.com">
                </div>
                <div class="form-group text-left">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" id="telefone" name="telefone" minlength="14" maxlength="15"
                           placeholder="(99) 99999-9999">
                </div>
                <div class="form-group text-left">
                    <label for="mensagem">Sua mensagem</label>
                    <textarea class="form-control" id="mensagem" name="mensagem" rows="3"></textarea>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="arquivo" name="arquivo">
                    <label class="custom-file-label" for="arquivo">Escolha um arquivo</label>
                </div>
                <p>
                    <button type="reset" class="btn btn-secondary my-2">Cancelar</button>
                    <button type="submit" class="btn btn-primary my-2">Enviar</button>
                </p>
            </form>
        </div>
    </section>

</main>

<footer class="text-muted">
    <div class="container">
        <p style="text-align: center">Marcelo Rocha Ferreira - {{ date('Y') }}</p>
    </div>
</footer>

<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>
</html>

