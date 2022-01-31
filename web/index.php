<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SistemaTutoria</title>
    <link rel="stylesheet" href="lib/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/bootstrap/dist/css/">
    <link rel="stylesheet" href="assets/css/login_aluno.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
	<script src="assets/js/controleAlunos.js"></script>
</head>

<body>

        <script>
            //esse evento será disparado quando a pagina for carregada
            document.addEventListener("DOMContentLoaded", function() {
                console.log("DOM completamente carregado e analisado");
                var controleAlunos = new ControleAlunos();
                var formLogin = document.getElementById("login_aluno");
                //esse evento será disparado quando o formulario for submetido
                formLogin.addEventListener('submit', controleAlunos.login);
           });

        </script>

    <header>
        <?php
            include("includes/header.php");
            include("includes/verifica.php");
        ?>
    </header>

    <!div id="content" class="container text-center bg-light">


        <div id="caixaLogin" class="center-block bg-light">

            <h1 id="titulo" class="display-6">Login</h1>

            <form id="login_aluno" method="post">
                <input type="hidden" name="method" value="LOGIN"/>

				<label for="email">E-mail</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">@</span>
					</div>
					<input autocomplete type="text" class="form-control" id="email" name="email" placeholder="Digite seu e-mail" >
				</div>

				<label for="senha">Senha</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">
						<i class="bi bi-key"></i>
					</span>
					</div>
					<input autocomplete type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" >
				</div>
				<input type="submit" value="Login" id="submit" class="btn"></input>
            </form>

            <div id="contatesuporte" class="center-block bg-light">
                <p>  
                Perdeu sua senha? Contate o Suporte: suporte@sistemamonitoria.edu.br
                </p>

            </div>

    </div>

    <footer>
        <?php
            include("includes/footer.php")
        ?>
    </footer>

</body>


</html>