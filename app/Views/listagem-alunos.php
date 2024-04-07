<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Listagem de Alunos</title>
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
            <h1 class="text-center mb-4 fw-bold">Listagem de Alunos</h1>

            <input class="form-control mr-sm-2 mb-3 mt-4" type="search" id="search" placeholder="Buscar" aria-label="Search">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Escola</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Data de Nascimento</th>
                        <th scope="col">Gênero</th>
                    </tr>
                </thead>
                <tbody id="table-to-search">
                    <?php foreach ($alunos as $aluno): ?>
                        <tr>
                            <th scope="row"><?= $aluno->id; ?></th>
                            <td><?= $aluno->escola_id; ?></td>
                            <td><?= $aluno->nome; ?></td>
                            <td><?= $aluno->telefone; ?></td>
                            <td><?= $aluno->email; ?></td>
                            <td><?= date("d/m/Y", strtotime($aluno->data_nascimento)); ?></td>
                            <td><?= ($aluno->genero == "M") ? "Masculino" : "Feminino"; ?></td>
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