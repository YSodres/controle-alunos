<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Atualização de Turmas</title>
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
            <h1 class="text-center mb-4 fw-bold">Atualização de Turmas</h1>

            <div class="d-flex .flex-colum">
                <form method="post">
                    <div>
                        <label for="id" class="form-label fw-bold">Selecione uma Turma:</label>
                        <select class="form-select" name="id" id="id" required>
                            <option value="" selected disabled>-</option>
                            <?php foreach ($turmas as $turmaOption): ?>
                                <option 
                                    value="<?= $turmaOption->id ?>"
                                >
                                    <?= $turmaOption->id ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label for="escola_id" class="required form-label fw-bold">Escola:</label>
                        <input type="number" class="form-control" id="escola_id" name="escola_id" value="<?= $turma ? $turma->escola_id : ""; ?>"readonly required>
                    </div>

                    <div class="mb-2">
                        <label for="nome" class="required form-label fw-bold">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="<?= $turma ? $turma->nome : ""; ?>"readonly required>
                    </div>

                    <div class="mb-2">
                        <label for="ano" class="required form-label fw-bold">Ano:</label>
                        <input type="number" class="form-control" id="ano" name="ano" value="<?= $turma ? $turma->ano : ""; ?>" readonly required>
                    </div>

                    <div class="mb-2">
                        <label for="nivel_ensino" class="form-label fw-bold">Nível de ensino:</label>
                        <select class="form-select" id="nivel_ensino" name="nivel_ensino" disabled>
                            <?php foreach (\ControleAlunos\Models\Turma::NIVEL_ENSINO as $key => $value): ?>
                                <option 
                                    value="<?= $value ?>"
                                    <?= ($turma && $turma->nivel_ensino == $value) ? "selected" : ""; ?>
                                >
                                    <?= $key ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label for="serie" class="form-label fw-bold">Série:</label>
                        <select class="form-select" id="serie" name="serie" disabled>
                            <?php foreach (\ControleAlunos\Models\Turma::SERIE as $key => $value): ?>
                                <option 
                                    value="<?= $value ?>"
                                    <?= ($turma && $turma->serie == $value) ? "selected" : ""; ?>
                                >
                                    <?= $key ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label for="turno" class="form-label fw-bold">Turno:</label>
                        <select class="form-select" id="turno" name="turno" disabled>
                            <?php foreach (\ControleAlunos\Models\Turma::TURNO as $key => $value): ?>
                                <option 
                                    value="<?= $value ?>"
                                    <?= ($turma && $turma->turno == $value) ? "selected" : ""; ?>
                                >
                                    <?= $key ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mt-5">
                        <button class="btn btn-success" type="submit" id="confirmar" name="confirmar" disabled>Confirmar</button>
                        <button class="btn btn-danger" type="button" id="excluir" name="excluir" disabled>Excluir</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <footer></footer>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let turma = document.getElementById("id");
            let escolaInput = document.getElementById("escola_id");
            let nomeInput = document.getElementById("nome");
            let anoInput = document.getElementById("ano");
            let nivelEnsinoSelect = document.getElementById("nivel_ensino");
            let serieSelect = document.getElementById("serie");
            let turnoSelect = document.getElementById("turno");
            let confirmarButton = document.getElementById("confirmar");
            let excluirButton = document.getElementById("excluir");

            turma.addEventListener("change", function () {
                let selectedOption = turma.options[turma.selectedIndex];

                if (selectedOption.value !== "") {
                    fetch("obter-dados-turma?id=" + selectedOption.value, {
                        method: "GET",
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded"
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error("Erro na requisição: " + response.turnoText);
                        }
                        return response.json();
                    })
                    .then(dadosturma => {
                        escolaInput.value = dadosturma.escola_id;
                        nomeInput.value = dadosturma.nome;
                        anoInput.value = dadosturma.ano;
                        nivelEnsinoSelect.value = dadosturma.nivel_ensino;
                        serieSelect.value = dadosturma.serie;
                        turnoSelect.value = dadosturma.turno;

                        escolaInput.removeAttribute("readonly");
                        nomeInput.removeAttribute("readonly");
                        anoInput.removeAttribute("readonly");
                        nivelEnsinoSelect.removeAttribute("disabled");
                        serieSelect.removeAttribute("disabled");
                        turnoSelect.removeAttribute("disabled");
                        confirmarButton.removeAttribute("disabled");
                        excluirButton.removeAttribute("disabled");
                    })
                    .catch(error => {
                        console.error("Erro na requisição:", error);
                    });
                }
            });

            excluirButton.addEventListener("click", function () {
                Swal.fire({
                    title: "Tem certeza?",
                    text: "Você não poderá reverter isso!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sim, excluir!",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        let selectedOption = turma.options[turma.selectedIndex].value;
                        
                        fetch("excluir-turma?id=" + selectedOption, {
                            method: "DELETE",
                            headers: {
                                "Content-Type": "application/x-www-form-urlencoded"
                            },
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error("Erro na requisição: " + response.turnoText);
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    title: "Excluído!",
                                    text: "A turma foi excluída.",
                                    icon: "success"
                                }).then(() => {
                                    window.location.href = "listar-turmas";
                                });
                            } else {
                                Swal.fire({
                                    title: "Erro!",
                                    text: "Erro ao excluir turma: " + data.message,
                                    icon: "error"
                                });
                            }
                        })
                        .catch(error => {
                            console.error("Erro na requisição:", error);
                        });
                    }
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>