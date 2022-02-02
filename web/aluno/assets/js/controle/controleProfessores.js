var controleProfessor = new ControleProfessor();

function ControleProfessor() {

    this.get = function (table_id) {
        $.ajax({
            'url': "/SistemaMonitoria/api/Professores.php",
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
                        return "<button type='button' class='btn btn-danger' onclick='controleProfessor.delete("+row.id+")'><i class='bx bx-trash'></i></button>"
                    }}
                ],
                "language": {
                    "info": "Mostrando _START_ à _END_ de _TOTAL_ professores",
                    "emptyTable": "Nenhum professor para mostrar",
                    "lengthMenu": "Mostrando _MENU_ professores",
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
            if (xmlhttp.status === 200 || xmlhttp.status === 201)
            {
                controleProfessor.get("#lista_de_professores");
                alert("Professor removido com sucesso");
            } else {
                alert("Erro ao remover a Professor");
            }
        };
        xmlhttp.open("DELETE", "/SistemaMonitoria/api/Professores.php?id=" + id);
        xmlhttp.send();
    };

    this.post = function (event) {
        event.preventDefault();//previne que o browser faça a submissao, premitindo que seja feita com javascript.
        var formElement = document.getElementById("adicionarprofessor");
        //https://developer.mozilla.org/en-US/docs/Web/API/FormData/Using_FormData_Objects
        var professorForm = new FormData(formElement);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function () {
            if (xmlhttp.readyState === xmlhttp.DONE) {
                if (xmlhttp.status === 201)
                {
                    controleProfessor.get("#lista_de_professores");
                    alert("Professor criado com sucesso");
                } else {
                    alert("Erro ao criar a professor");
                }
            }
            //var listaProfessores = JSON.parse(this.responseText);
            //carregaListaProfessores(listaProfessores);
        };
        xmlhttp.open("POST", "/SistemaMonitoria/api/Professores.php");
        xmlhttp.send(professorForm);
    };
    
    this.put = function (event) {
        event.preventDefault();//previne que o browser faça a submissao, premitindo que seja feita com javascript.
        var formElement = document.getElementById("atualizarprofessor");
        //https://developer.mozilla.org/en-US/docs/Web/API/FormData/Using_FormData_Objects
        var professorForm = new FormData(formElement);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function () {
            if (xmlhttp.readyState === xmlhttp.DONE) {
                if (xmlhttp.status === 200 || xmlhttp.status === 201)
                {
                    controleProfessor.get();
                    alert("Professor atualizado com sucesso");
                    document.getElementById("atualizar").style = 'none';
                } else {
                    alert("Erro ao atualizar a professor");
                }
            }
            //var listaProfessores = JSON.parse(this.responseText);
            //carregaListaProfessores(listaProfessores);
        };
        xmlhttp.open("POST", "/SistemaMonitoria/api/Professores.php?id=" + formElement['atualizarid'].value);
        xmlhttp.send(professorForm);
    };
}