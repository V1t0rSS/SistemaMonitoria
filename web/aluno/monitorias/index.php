<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SistemaTutoria</title>
    <?php include('../includes/head.php') ?>
</head>

<body style="background-color: initial">

    <header>
        <?php
		include("../includes/header.php");
        require "../includes/verifica.php";
        ?>
    </header>

    <div id="content" class="container text-center bg-light">
        <table id="lista_de_monitorias" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Cancelar/Participar</th>
                    <th>Titulo</th>
                    <th>Disciplina</th>
                    <th>Responsável</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <footer>
        <?php
            include("../includes/scripts_footer.php")
        ?>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            controleMonitoria.get("#lista_de_monitorias");
        });
    </script>

</body>


</html>