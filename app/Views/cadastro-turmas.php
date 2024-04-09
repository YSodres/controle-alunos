<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Cadastro de Turmas</title>
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
            <h1 class="text-center mb-4 fw-bold">Cadastro de Turmas</h1>

            <div class="d-flex .flex-colum">
                <form method="post">
                    <div class="mb-2">
                        <label for="escola_id" class="required form-label fw-bold">ID da Escola:</label>
                        <input type="number" class="form-control" id="escola_id" name="escola_id" required>
                    </div>

                    <div class="mb-2">
                        <label for="nome" class="required form-label fw-bold">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>

                    <div class="mb-2">
                        <label for="ano" class="required form-label fw-bold">Ano:</label>
                        <input type="number" class="form-control" id="ano" name="ano" value="2024" required>
                    </div>

                    <div class="mb-2">
                        <label for="nivel_ensino" class="form-label fw-bold">Nível de ensino:</label>
                        <select class="form-select" id="nivel_ensino" name="nivel_ensino">
                            <option value="1">Fundamental</option>
                            <option value="2">Médio</option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label for="serie" class="form-label fw-bold">Série:</label>
                        <select class="form-select" id="serie" name="serie">
                            <option value="1">1ª</option>
                            <option value="2">2ª</option>
                            <option value="3">3ª</option>
                            <option value="4">4ª</option>
                            <option value="5">5ª</option>
                            <option value="6">6ª</option>
                            <option value="7">7ª</option>
                            <option value="8">8ª</option>
                            <option value="9">9ª</option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label for="turno" class="form-label fw-bold">Turno:</label>
                        <select class="form-select" id="turno" name="turno">
                            <option value="1">Matutino</option>
                            <option value="2">Vespertino</option>
                            <option value="3">Noturno</option>
                            <option value="4">Integral</option>
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