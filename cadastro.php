<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SistemaTutoria</title>
    <link rel="stylesheet" href="lib/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/bootstrap/dist/css/">
    <link rel="stylesheet" href="assets/css/cadastro_aluno.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
</head>

<body>

    <header>
        <?php
            include("includes/header.php")
        ?>
    </header>

    <div id="content" class="container clearfix bg-light">

        <h2 id="titulo" class="display-6">Preencha o cadastro abaixo</h2>

        <form>

            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome" required>

            <label for="tel">Telefone</label>
            <input type="phone" class="form-control" id="tel" placeholder="DIgite seu telefone" required>

            <label for="matricula">Matrícula</label>
            <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Digite sua matrícula" required>

            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Digite seu email" required>

            <label for="email2">Confirme seu email</label>
            <input type="email" class="form-control" id="email2" placeholder="Confirme seu email" required>

            <label for="senha">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite uma senha" required>

            <label for="senha2">Senha</label>
            <input type="password" class="form-control" id="senha2" name="senha2" placeholder="Confirme sua senha" required>

            <button id="enviar" type="submit" class="btn">Enviar</button>

        </form>
        
    </div>
    
    <footer>
        <?php
            include("includes/footer.php")
        ?>
    </footer>

</body>


</html>