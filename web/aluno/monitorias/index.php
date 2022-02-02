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
                    <th>Cancelar</th>
                    <th>Participar</th>
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
            var calendarEl = document.getElementById('calendar');

            // CARREGANDO DADOS DA TABELA DE MONITORIA
            $.ajax({
                'url': "/SistemaMonitoria/api/Monitorias.php",
                'method': "GET",
                'contentType': 'application/json'
            }).done( function(data) {
                json = JSON.parse(data);
                $("#lista_de_monitorias").dataTable( {
                    "destroy": true,
                    "aaData": json,
                    "paginate": false,
                    "columns": [
                        { "render": function(data, type, row) {
                            return "<button type='button' class='btn btn-danger' onclick='controleMonitoria.delete("+row.id+")'><i class='bx bx-x'></i></button>"
                        }},
                        { "render": function() {
                            return "<button type='button' class='btn btn-primary'><i class='bx bx-pencil'></i></button>"
                        }},
                        { "data": "titulo" },
                        { "data": "responsavel" },
                        { "data": "disciplina" }
                    ],
                    "language": {
                        "info": "Mostrando _START_ à _END_ de _TOTAL_ monitorias",
                        "emptyTable": "Nenhum monitoria para mostrar",
                        "lengthMenu": "Mostrando _MENU_ monitorias",
                        "paginate": {
                            "first":      "Primeiro",
                            "last":       "Último",
                            "next":       "Próx.",
                            "previous":   "Ant."
                        }
                    }
                })
            })
        });
    </script>

</body>


</html>