<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Listagem de Turmas</title>
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
            <h1 class="text-center mb-4 fw-bold">Listagem de Turmas</h1>

            <input class="form-control mr-sm-2 mb-3 mt-4" type="search" id="search" placeholder="Buscar" aria-label="Search">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Escola</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Ano</th>
                        <th scope="col">Nível de ensino</th>
                        <th scope="col">Série</th>
                        <th scope="col">Turno</th>
                    </tr>
                </thead>
                <tbody id="table-to-search">
                    <?php foreach ($turmas as $turma): ?>
                        <tr>
                            <th scope="row"><?= $turma->id; ?></th>
                            <td><?= $turma->escola_id; ?></td>
                            <td><?= $turma->nome; ?></td>
                            <td><?= $turma->ano; ?></td>
                            <td><?= array_search($turma->nivel_ensino, \ControleAlunos\Models\Turma::NIVEL_ENSINO); ?></td>
                            <td><?= array_search($turma->serie, \ControleAlunos\Models\Turma::SERIE); ?></td>
                            <td><?= array_search($turma->turno, \ControleAlunos\Models\Turma::TURNO); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
        </section>
    </main>

    <footer></footer>
    <?php
    require_once __DIR__ . "/filtro-busca.html";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>