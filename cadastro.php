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

        <h1 id="titulo" class="display-6">Preencha o cadastro abaixo</h1>

        <div id="alert-blank" class="text-center"> 
            <i class= "bi bi-exclamation-circle"></i> 
            <span>Todos os campos marcados em vermelho devem ser preenchidos</span>
        </div>

        <form>

            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome" >

            <label for="tel">Telefone</label>
            <input type="phone" class="form-control" id="tel" placeholder="DIgite seu telefone" >

            <label for="matricula">Matrícula</label>
            <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Digite sua matrícula" >

            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Digite seu email" >

            <label for="email2">Confirme seu email</label>
            <input type="email" class="form-control" id="email2" placeholder="Confirme seu email" >

            <label for="senha">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite uma senha" >

            <label for="senha2">Senha</label>
            <input type="password" class="form-control" id="senha2" name="senha2" placeholder="Confirme sua senha" >

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