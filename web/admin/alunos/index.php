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
</body>
</html>
<?php include('../includes/scripts_footer.php') ?>
<script src="../assets/js/visao/index.js"></script>
<script src="../assets/js/controle/controleAlunos.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });

    var controleAluno = new ControleAluno();
    controleAluno.get();
</script>