<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Registro de Escolas</title>
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <header id="header" class="header fixed-top d-flex align-items-center">
        <?php
        require_once __DIR__ . '/sidebar.html';
        ?>
    </header>

    <main id="main" class="main">
        <section class="container mt-4">
            <h1 class="text-center mb-4 fw-bold">Registro de Escolas</h1>

            <div class="d-flex .flex-colum">
                <form method="post">
                    <div class="mb-2">
                        <label for="nome" class="required form-label fw-bold">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>

                    <div class="mb-2">
                        <label for="endereco" class="form-label fw-bold">Endereço:</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" >
                    </div>

                    <div class="mb-2">
                        <label for="situacao" class="form-label fw-bold">Situação:</label>
                        <select class="form-select" id="situacao" name="situacao" required>
                            <option value="1">Ativo</option>
                            <option value="2">Inativo</option>
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