var controleMonitor = new ControleMonitor();

function ControleMonitor() {

    this.get = function (table_id) {
        $.ajax({
            'url': "/SistemaMonitoria/api/Monitores.php",
            'method': "GET",
            'contentType': 'application/json'
        }).done( function(data) {
            json = JSON.parse(data);
            $(table_id).dataTable( {
                "destroy": true,
                "aaData": json,
                "columns": [
                    { "data": "nome" },
                    { "data": "matricula" },
                    { "data": "email" },
                    { "render": function() {
                        return "<button type='button' class='btn btn-primary'><i class='bx bx-pencil'></i></button>"
                    }},
                    { "render": function(data, type, row) {
                        return "<button type='button' class='btn btn-danger' onclick='controleMonitor.delete("+row.id+")'><i class='bx bx-trash'></i></button>"
                    }}
                ],
                "language": {
                    "info": "Mostrando _START_ à _END_ de _TOTAL_ monitores",
                    "emptyTable": "Nenhum monitor para mostrar",
                    "lengthMenu": "Mostrando _MENU_ monitores",
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
                controleMonitor.get("#lista_de_monitores");
                alert("Monitor removido com sucesso");
            } else {
                alert("Erro ao remover a Monitor");
            }
        };
        xmlhttp.open("DELETE", "/SistemaMonitoria/api/monitores.php?id=" + id);
        xmlhttp.send();
    };

    this.post = function (event) {
        event.preventDefault();//previne que o browser faça a submissao, premitindo que seja feita com javascript.
        var formElement = document.getElementById("adicionarmonitor");
        //https://developer.mozilla.org/en-US/docs/Web/API/FormData/Using_FormData_Objects
        var monitorForm = new FormData(formElement);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function () {
            if (xmlhttp.readyState === xmlhttp.DONE) {
                if (xmlhttp.status === 201)
                {
                    controleMonitor.get("#lista_de_monitores");
                    alert("Monitor criado com sucesso");
                } else {
                    alert("Erro ao criar a monitor");
                }
            }
            //var listaMonitores = JSON.parse(this.responseText);
            //carregaListaMonitores(listaMonitores);
        };
        xmlhttp.open("POST", "/SistemaMonitoria/api/monitores.php");
        xmlhttp.send(monitorForm);
    };
    
    this.put = function (event) {
        event.preventDefault();//previne que o browser faça a submissao, premitindo que seja feita com javascript.
        var formElement = document.getElementById("atualizarmonitor");
        //https://developer.mozilla.org/en-US/docs/Web/API/FormData/Using_FormData_Objects
        var monitorForm = new FormData(formElement);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function () {
            if (xmlhttp.readyState === xmlhttp.DONE) {
                if (xmlhttp.status === 200)
                {
                    controleMonitor.get();
                    alert("Monitor atualizado com sucesso");
                    document.getElementById("atualizar").style = 'none';
                } else {
                    alert("Erro ao atualizar a monitor");
                }
            }
            //var listaMonitores = JSON.parse(this.responseText);
            //carregaListaMonitores(listaMonitores);
        };
        xmlhttp.open("POST", "/SistemaMonitoria/api/monitores.php?id=" + formElement['atualizarid'].value);
        xmlhttp.send(monitorForm);
    };
}