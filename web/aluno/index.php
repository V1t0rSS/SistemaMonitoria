<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SistemaTutoria</title>
    <link rel="stylesheet" href="../lib/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../lib/bootstrap/dist/css/">
    <link rel="stylesheet" href="../assets/css/login_aluno.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
	<script src="../assets/js/controleAlunos.js"></script>
    <script src="../js/visao/menu.js"></script>
</head>

<body>

    <header>
        <?php
		include("includes/header.php");
        require "includes/verifica.php";
        ?>
    </header>

    <div id="content" class="container text-center bg-light">

                <p>  
                Perdeu sua senha? Contate o Suporte: suporte@sistemamonitoria.edu.br
                </p>
    </div>

    <footer>
        <?php
            include("includes/footer.php")
        ?>
    </footer>

</body>


</html>