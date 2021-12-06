<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Tutoria</title>
    <?php include('../includes/head.php') ?>
</head>
<body class="bg-light">
    <?php include('../includes/header.php') ?>
    <?php include('../includes/sidebar.php') ?>
    <!-- Main Container-->
    <div id="main-container" class="bg-body">
        <div class="d-flex justify-content-between">
            <h3>Alunos</h3>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Adicionar Novo <i class='bx bx-plus'></i></button>
        </div>
        <div class="container mt-4 px-0">
            <table id="lista_de_alunos" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Matrícula</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Novo Aluno</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3">
                        <div class="col-md-6">
                            <label for="nome-cadastro" class="form-label">Nome:</label>
                            <input type="name" class="form-control" id="nome-cadastro">
                        </div>
                        <div class="col-md-6">
                            <label for="telefone-cadastro" class="form-label">Telefone:</label>
                            <input type="text" class="form-control" id="telefone-cadastro">
                        </div>
                        <div class="col-md-12">
                            <label for="matricula-cadastro" class="form-label">Matrícula:</label>
                            <input type="text" class="form-control" id="matricula-cadastro">
                        </div>
                        <div class="col-md-12">
                            <label for="email-cadastro" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email-cadastro">
                        </div>
                        <div class="col-md-6">
                            <label for="senha-cadastro" class="form-label">Senha:</label>
                            <input type="password" class="form-control" id="senha-cadastro">
                        </div>
                        <div class="col-md-6">
                            <label for="csenha-cadastro" class="form-label">Confirme a Senha:</label>
                            <input type="password" class="form-control" id="csenha-cadastro">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php include('../includes/scripts_footer.php') ?>
<script src="../assets/js/visao/index.js"></script>
<script src="../assets/js/controle/controleAlunos.js"></script>

<script>
    $(document).ready(function() {
        var controleAluno = new ControleAluno();
        controleAluno.get("#lista_de_alunos");
    });
</script>