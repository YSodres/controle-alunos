<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Cadastro de Alunos</title>
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <header id="header" class="header fixed-top d-flex align-items-center">
        <?php
        require_once __DIR__ . "/sidebar.html";
        ?>
    </header>

    <main id="main" class="main">
        <section class="container mt-4">
            <h1 class="text-center mb-4 fw-bold">Cadastro de Alunos</h1>

            <div class="d-flex .flex-colum">
                <form method="post">
                    <div class="mb-2">
                        <label for="escola" class="form-label fw-bold">ID da Escola:</label>
                        <input type="number" class="form-control" id="escola" name="escola">
                    </div>

                    <div class="mb-2">
                        <label for="nome" class="required form-label fw-bold">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>

                    <div class="mb-2">
                        <label for="endereco" class="form-label fw-bold">Telefone:</label>
                        <input type="tel" class="form-control" id="endereco" name="endereco">
                    </div>

                    <div class="mb-2">
                        <label for="email" class="required form-label fw-bold">E-mail:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-2">
                        <label for="dataNascimento" class="form-label fw-bold">Data de Nascimento:</label>
                        <input type="date" class="form-control" id="dataNascimento" name="dataNascimento">
                    </div>

                    <div class="mb-2">
                        <label for="genero" class="form-label fw-bold">Gênero:</label>
                        <select class="form-select" id="genero" name="genero">
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select>
                    </div>

                    <div class="mt-5">
                        <button class="btn btn-success" type="submit" name="confirmar">Confirmar</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <footer></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>