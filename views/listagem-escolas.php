<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Listagem de Escolas</title>
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
            <h1 class="text-center mb-4 fw-bold">Listagem de Escolas</h1>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Data de Cadastro</th>
                        <th scope="col">Situação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($escolas as $escola): ?>
                        <tr>
                            <th scope="row"><?= $escola->id; ?></th>
                            <td><?= $escola->nome; ?></td>
                            <td><?= $escola->endereco; ?></td>
                            <td><?= date('d/m/Y', strtotime($escola->data_cadastro)); ?></td>
                            <td><?= ($escola->status == 1) ? "Ativo" : "Inativo"; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
        </section>
    </main>

    <footer></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>