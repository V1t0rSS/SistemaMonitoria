var controleAluno = new ControleAluno();

function ControleAluno() {

    this.get = function (table_id) {
        $.ajax({
            'url': "/SistemaMonitoria/api/Alunos.php",
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
                        return "<button type='button' class='btn btn-danger' onclick='controleAluno.delete("+row.id+")'><i class='bx bx-trash'></i></button>"
                    }}
                ],
                "language": {
                    "info": "Mostrando _START_ à _END_ de _TOTAL_ alunos",
                    "emptyTable": "Nenhum aluno para mostrar",
                    "lengthMenu": "Mostrando _MENU_ alunos",
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
                controleAluno.get("#lista_de_alunos");
                alert("Aluno removido com sucesso");
            } else {
                alert("Erro ao remover a Aluno");
            }
        };
        xmlhttp.open("DELETE", "/SistemaMonitoria/api/Alunos.php?id=" + id);
        xmlhttp.send();
    };

    this.post = function (event) {
        event.preventDefault();//previne que o browser faça a submissao, premitindo que seja feita com javascript.
        var formElement = document.getElementById("adicionaraluno");
        //https://developer.mozilla.org/en-US/docs/Web/API/FormData/Using_FormData_Objects
        var alunoForm = new FormData(formElement);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function () {
            if (xmlhttp.readyState === xmlhttp.DONE) {
                if (xmlhttp.status === 201)
                {
                    controleAluno.get("#lista_de_alunos");
                    alert("Aluno criado com sucesso");
                } else {
                    alert("Erro ao criar a aluno");
                }
            }
            //var listaAlunos = JSON.parse(this.responseText);
            //carregaListaAlunos(listaAlunos);
        };
        xmlhttp.open("POST", "/SistemaMonitoria/api/Alunos.php");
        xmlhttp.send(alunoForm);
    };
    
    this.put = function (event) {
        event.preventDefault();//previne que o browser faça a submissao, premitindo que seja feita com javascript.
        var formElement = document.getElementById("atualizaraluno");
        //https://developer.mozilla.org/en-US/docs/Web/API/FormData/Using_FormData_Objects
        var alunoForm = new FormData(formElement);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function () {
            if (xmlhttp.readyState === xmlhttp.DONE) {
                if (xmlhttp.status === 200 || xmlhttp.status === 201)
                {
                    controleAluno.get();
                    alert("Aluno atualizado com sucesso");
                    document.getElementById("atualizar").style = 'none';
                } else {
                    alert("Erro ao atualizar a aluno");
                }
            }
            //var listaAlunos = JSON.parse(this.responseText);
            //carregaListaAlunos(listaAlunos);
        };
        xmlhttp.open("POST", "/SistemaMonitoria/api/Alunos.php?id=" + formElement['atualizarid'].value);
        xmlhttp.send(alunoForm);
    };
}