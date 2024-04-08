<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Atualização de Alunos</title>
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
            <h1 class="text-center mb-4 fw-bold">Atualização de Alunos</h1>

            <div class="d-flex .flex-colum">
                <form method="post">
                    <div>
                        <label for="id" class="form-label fw-bold">Selecione um Aluno:</label>
                        <select class="form-select" name="id" id="id" required>
                            <option value="" selected disabled>-</option>
                            <?php foreach ($alunos as $alunoOption): ?>
                                <option 
                                    value="<?= $alunoOption->id ?>"
                                >
                                    <?= $alunoOption->nome ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label for="escola_id" class="required form-label fw-bold">Escola:</label>
                        <input type="number" class="form-control" id="escola_id" name="escola_id" value="<?= $aluno ? $aluno->escola_id : ""; ?>"readonly required>
                    </div>

                    <div class="mb-2">
                        <label for="nome" class="required form-label fw-bold">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="<?= $aluno ? $aluno->nome : ""; ?>"readonly required>
                    </div>

                    <div class="mb-2">
                        <label for="telefone" class="form-label fw-bold">Telefone:</label>
                        <input type="tel" class="form-control" id="telefone" name="telefone" value="<?= $aluno ? $aluno->telefone : ""; ?>" readonly>
                    </div>

                    <div class="mb-2">
                        <label for="email" class="form-label fw-bold">E-mail:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $aluno ? $aluno->email : ""; ?>" readonly>
                    </div>

                    <div class="mb-2">
                        <label for="data_nascimento" class="form-label fw-bold">Data de nascimento:</label>
                        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?= $aluno ? $aluno->data_nascimento : ""; ?>" readonly>
                    </div>

                    <div class="mb-2">
                        <label for="genero" class="form-label fw-bold">Gênero:</label>
                        <select class="form-select" id="genero" name="genero" disabled>
                            <?php foreach (\ControleAlunos\Models\Aluno::GENERO as $key => $value): ?>
                                <option 
                                    value="<?= $value ?>"
                                    <?= ($aluno && $aluno->genero == $value) ? "selected" : ""; ?>
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
            let aluno = document.getElementById("id");
            let escolaInput = document.getElementById("escola_id");
            let nomeInput = document.getElementById("nome");
            let telefoneInput = document.getElementById("telefone");
            let emailInput = document.getElementById("email");
            let dataNascimentoInput = document.getElementById("data_nascimento");
            let generoSelect = document.getElementById("genero");
            let confirmarButton = document.getElementById("confirmar");
            let excluirButton = document.getElementById("excluir");

            aluno.addEventListener("change", function () {
                let selectedOption = aluno.options[aluno.selectedIndex];

                if (selectedOption.value !== "") {
                    fetch("obter-dados-aluno?id=" + selectedOption.value, {
                        method: "GET",
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded"
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error("Erro na requisição: " + response.generoText);
                        }
                        return response.json();
                    })
                    .then(dadosaluno => {
                        escolaInput.value = dadosaluno.escola_id;
                        nomeInput.value = dadosaluno.nome;
                        telefoneInput.value = dadosaluno.telefone;
                        dataNascimentoInput.value = dadosaluno.data_nascimento;
                        emailInput.value = dadosaluno.email;
                        generoSelect.value = dadosaluno.genero;

                        escolaInput.removeAttribute("readonly");
                        nomeInput.removeAttribute("readonly");
                        telefoneInput.removeAttribute("readonly");
                        emailInput.removeAttribute("readonly");
                        generoSelect.removeAttribute("disabled");
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
                        let selectedOption = aluno.options[aluno.selectedIndex].value;
                        
                        fetch("excluir-aluno?id=" + selectedOption, {
                            method: "DELETE",
                            headers: {
                                "Content-Type": "application/x-www-form-urlencoded"
                            },
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error("Erro na requisição: " + response.generoText);
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    title: "Excluído!",
                                    text: "O aluno foi excluído.",
                                    icon: "success"
                                }).then(() => {
                                    window.location.href = "listar-alunos";
                                });
                            } else {
                                Swal.fire({
                                    title: "Erro!",
                                    text: "Erro ao excluir aluno: " + data.message,
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