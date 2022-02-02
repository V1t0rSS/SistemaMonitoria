controleAdministrador = new ControleAdministradores();

function ControleAdministradores() {

    this.get = function (table_id) {
        $.ajax({
            'url': "/SistemaMonitoria/api/Administradores.php",
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
                        return "<button type='button' class='btn btn-danger' onclick='controleAdministrador.delete("+row.id+")'><i class='bx bx-trash'></i></button>"
                    }}
                ],
                "language": {
                    "info": "Mostrando _START_ à _END_ de _TOTAL_ administradores",
                    "emptyTable": "Nenhum administrador para mostrar",
                    "lengthMenu": "Mostrando _MENU_ administradores",
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
                controleAdministrador.get("#lista_de_administradores");
                alert("Administrador removido com sucesso");
            } else {
                alert("Erro ao remover a Administrador");
            }
        };
        xmlhttp.open("DELETE", "/SistemaMonitoria/api/Administradores.php?id=" + id);
        xmlhttp.send();
    };

    this.post = function (event) {
        event.preventDefault();//previne que o browser faça a submissao, premitindo que seja feita com javascript.
        var formElement = document.getElementById("adicionaradministrador");
        //https://developer.mozilla.org/en-US/docs/Web/API/FormData/Using_FormData_Objects
        var administradorForm = new FormData(formElement);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function () {
            if (xmlhttp.readyState === xmlhttp.DONE) {
                if (xmlhttp.status === 201)
                {
                    controleAdministrador.get("#lista_de_administradores");
                    alert("Administrador criado com sucesso");
                } else {
                    alert("Erro ao criar a administrador");
                }
            }
            //var listaAdministradores = JSON.parse(this.responseText);
            //carregaListaAdministradores(listaAdministradores);
        };
        xmlhttp.open("POST", "/SistemaMonitoria/api/Administradores.php");
        xmlhttp.send(administradorForm);
    };
    
    this.put = function (event) {
        event.preventDefault();//previne que o browser faça a submissao, premitindo que seja feita com javascript.
        var formElement = document.getElementById("atualizaradministrador");
        //https://developer.mozilla.org/en-US/docs/Web/API/FormData/Using_FormData_Objects
        var administradorForm = new FormData(formElement);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function () {
            if (xmlhttp.readyState === xmlhttp.DONE) {
                if (xmlhttp.status === 200 || xmlhttp.status === 201)
                {
                    controleAdministrador.get();
                    alert("Administrador atualizado com sucesso");
                    document.getElementById("atualizar").style = 'none';
                } else {
                    alert("Erro ao atualizar a administrador");
                }
            }
            //var listaAdministradores = JSON.parse(this.responseText);
            //carregaListaAdministradores(listaAdministradores);
        };
        xmlhttp.open("POST", "/SistemaMonitoria/api/Administradores.php?id=" + formElement['atualizarid'].value);
        xmlhttp.send(administradorForm);
    };

    this.login = function (event) {
        event.preventDefault();             //previne que o browser faça a submissao, premitindo que seja feita com javascript.
        var formElement = document.getElementById("login_admin");
        //https://developer.mozilla.org/en-US/docs/Web/API/FormData/Using_FormData_Objects
        var tarefaForm = new FormData(formElement);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function () {
            if (xmlhttp.readyState === xmlhttp.DONE) {
                console.log(xmlhttp.status)
                if (xmlhttp.status === 201)
                {   
                    alert("Usuario logado com sucesso");
                    window.location.href = "./dashboard";

                } else {
                    alert("Usuario ou senha incorretos");
                }
            }
        };
        xmlhttp.open("POST", "/SistemaMonitoria/api/Administradores.php/login");
        xmlhttp.send(tarefaForm);
    };
    
    
     this.logout = function (event) {
        event.preventDefault();//previne que o browser faça a submissao, premitindo que seja feita com javascript.
       var xmlhttp = new XMLHttpRequest();
       console.log("entrou");
        xmlhttp.onload = function () {
            if (xmlhttp.readyState === xmlhttp.DONE) {
                if (xmlhttp.status === 200)
                {
                    carregaListaTarefas([]);
                    alert("Deslogado com sucesso");
                    window.location.href = "./";
                } else {
                    alert("Nao foi possivel deslogar");
                }
            }
        };
        xmlhttp.open("POST", "/SistemaMonitoria/api/Administradores.php/logout");
        var logoutForm = new FormData();
        logoutForm.append('method', 'LOGOUT');
        xmlhttp.send(logoutForm);
    };

}