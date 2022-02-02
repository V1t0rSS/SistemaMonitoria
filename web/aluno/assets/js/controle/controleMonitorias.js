var controleMonitoria = new ControleMonitoria();

function ControleMonitoria() {

    this.get = function (table_id) {
        // CARREGANDO DADOS DA TABELA DE MONITORIA
        $.ajax({
            'url': "/SistemaMonitoria/api/Monitorias.php",
            'method': "GET",
            'contentType': 'application/json'
        }).done( function(data) {
            json = JSON.parse(data);
            $(table_id).dataTable( {
                "destroy": true,
                "aaData": json,
                "paginate": false,
                "columns": [
                    { "render": function(data, type, row) {
                        return "<div class='btn-group'>"
                        + "<button type='button' class='btn btn-danger' onclick='controleAlunoEventoMonitoria.delete("+row.id+")'><i class='bx bx-x'></i></button>"
                        + "<button type='button' class='ml-1 btn btn-primary' onclick='controleAlunoEventoMonitoria.post("+row.id+")'><i class='bx bx-pencil'></i></button>"
                        + "</div>"
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
    };
}