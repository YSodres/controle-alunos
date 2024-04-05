<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Atualização de Escolas</title>
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
            <h1 class="text-center mb-4 fw-bold">Atualização de Escolas</h1>

            <div class="d-flex .flex-colum">
                <form method="post">
                    <div>
                        <label for="escola_id" class="form-label fw-bold">Selecione uma Escola:</label>
                        <select class="form-select" name="escola_id" id="escola_id" required>
                            <option value="" selected disabled>-</option>
                            <?php foreach ($escolas as $escolaOption): ?>
                                <option 
                                    value="<?= $escolaOption->id ?>"
                                >
                                    <?= $escolaOption->nome ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label for="nome" class="required form-label fw-bold">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="<?= $escola ? $escola->nome : ""; ?>"readonly required>
                    </div>

                    <div class="mb-2">
                        <label for="endereco" class="form-label fw-bold">Endereço:</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" value="<?= $escola ? $escola->endereco : ""; ?>" readonly>
                    </div>

                    <div class="mb-2">
                        <label for="situacao" class="form-label fw-bold">Situação:</label>
                        <select class="form-select" id="situacao" name="situacao" disabled>
                            <?php foreach (\ControleAlunos\Models\Escola::STATUS as $key => $value): ?>
                                <option 
                                    value="<?= $value ?>"
                                    <?= ($escola && $escola->status == $value) ? "selected" : ""; ?>
                                >
                                    <?= $key ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mt-5">
                        <button class="btn btn-success" type="submit" id="confirmar" name="confirmar" disabled>Confirmar</button>
                        <button class="btn btn-danger" type="submit" id="excluir" name="excluir" disabled>Excluir</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <footer></footer>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let escola = document.getElementById("escola_id");
            let nomeInput = document.getElementById("nome");
            let enderecoInput = document.getElementById("endereco");
            let statusSelect = document.getElementById("situacao");
            let confirmarButton = document.getElementById("confirmar");
            let excluirButton = document.getElementById("excluir");

            escola.addEventListener("change", function () {
                let selectedOption = escola.options[escola.selectedIndex];

                if (selectedOption.value !== "") {
                    fetch("obter-dados-escola?escola_id=" + selectedOption.value, {
                        method: "GET",
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded"
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error("Erro na requisição: " + response.statusText);
                        }
                        return response.json();
                    })
                    .then(dadosEscola => {
                        nomeInput.value = dadosEscola.nome;
                        enderecoInput.value = dadosEscola.endereco;
                        statusSelect.value = dadosEscola.status;

                        nomeInput.removeAttribute("readonly");
                        enderecoInput.removeAttribute("readonly");
                        statusSelect.removeAttribute("disabled");
                        confirmarButton.removeAttribute("disabled");
                        excluirButton.removeAttribute("disabled");
                    })
                    .catch(error => {
                        console.error("Erro na requisição:", error);
                    });
                }

                excluirButton.addEventListener("click", function (event) {
                let confirmacao = confirm("Tem certeza que deseja excluir o cadastro da escola?");

                if (!confirmacao) {
                    event.preventDefault();
                }
                })
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>