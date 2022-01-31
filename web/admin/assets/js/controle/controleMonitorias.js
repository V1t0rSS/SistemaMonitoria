var controleMonitoria = new ControleMonitoria();

function ControleMonitoria() {

    this.get = function (table_id) {
        $.ajax({
            'url': "/SistemaMonitoria/api/Monitorias.php",
            'method': "GET",
            'contentType': 'application/json'
        }).done( function(data) {
            json = JSON.parse(data);
            $(table_id).dataTable( {
                "destroy": true,
                "aaData": json,
                "columns": [
                    { "data": "titulo" },
                    { "data": "responsavel" },
                    { "data": "disciplina" },
                    { "render": function() {
                        return "<button type='button' class='btn btn-primary'><i class='bx bx-pencil'></i></button>"
                    }},
                    { "render": function(data, type, row) {
                        return "<button type='button' class='btn btn-danger' onclick='controleMonitoria.delete("+row.id+")'><i class='bx bx-trash'></i></button>"
                    }}
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

    this.delete = function (id) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function () {
            if (xmlhttp.status === 200)
            {
                controleMonitoria.get("#lista_de_monitorias");
                alert("Monitoria removido com sucesso");
            } else {
                alert("Erro ao remover a Monitoria");
            }
        };
        xmlhttp.open("DELETE", "/SistemaMonitoria/api/Monitorias.php?id=" + id);
        xmlhttp.send();
    };

    this.post = function (event) {
        event.preventDefault();//previne que o browser faça a submissao, premitindo que seja feita com javascript.
        var formElement = document.getElementById("adicionarmonitoria");
        //https://developer.mozilla.org/en-US/docs/Web/API/FormData/Using_FormData_Objects
        var monitoriaForm = new FormData(formElement);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function () {
            if (xmlhttp.readyState === xmlhttp.DONE) {
                if (xmlhttp.status === 201)
                {
                    controleMonitoria.get("#lista_de_monitorias");
                    alert("Monitoria criado com sucesso");
                } else {
                    alert("Erro ao criar a monitoria");
                }
            }
            //var listaMonitorias = JSON.parse(this.responseText);
            //carregaListaMonitorias(listaMonitorias);
        };
        xmlhttp.open("POST", "/SistemaMonitoria/api/Monitorias.php");
        xmlhttp.send(monitoriaForm);
    };
    
    this.put = function (event) {
        event.preventDefault();//previne que o browser faça a submissao, premitindo que seja feita com javascript.
        var formElement = document.getElementById("atualizarmonitoria");
        //https://developer.mozilla.org/en-US/docs/Web/API/FormData/Using_FormData_Objects
        var monitoriaForm = new FormData(formElement);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function () {
            if (xmlhttp.readyState === xmlhttp.DONE) {
                if (xmlhttp.status === 200)
                {
                    controleMonitoria.get();
                    alert("Monitoria atualizado com sucesso");
                    document.getElementById("atualizar").style = 'none';
                } else {
                    alert("Erro ao atualizar a monitoria");
                }
            }
            //var listaMonitorias = JSON.parse(this.responseText);
            //carregaListaMonitorias(listaMonitorias);
        };
        xmlhttp.open("POST", "/SistemaMonitoria/api/Monitorias.php?id=" + formElement['atualizarid'].value);
        xmlhttp.send(monitoriaForm);
    };
}