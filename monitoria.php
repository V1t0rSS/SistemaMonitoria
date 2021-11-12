<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SistemaTutoria</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="lib/bootstrap/dist/css/bootstrap.min.css">
    <!-- Estilo dessa página -->
    <link rel="stylesheet" href="assets/css/monitoria.css">
    <!-- Bootstra Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <!-- Estilos do FullCalendar (precisa em todas as páginas) -->
</head>

<body>

    <header>
        <?php
            include("includes/header.php")
        ?>
    </header>

    <div id="content" class="container clearfix text-center bg-light">

        <h1 class="display-6">TÍTULO VINDO DO BACKEND</h1>


        <?php
            include("includes/calendario.php")
        ?>

    </div>
    
    <footer>
        <?php
            include("includes/footer.php")
        ?>
    </footer>

</body>


</html>