var controleAlunoEventoMonitoria = new ControleAlunoEventoMonitoria();

function ControleAlunoEventoMonitoria() {
    this.delete = function (monitoria_id) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function () {
            if (xmlhttp.status === 200 || xmlhttp.status === 201)
            {
                alert("Cancelamento feito com sucesso");
            } else {
                alert("Você já está participando");
            }
        };
        xmlhttp.open("DELETE", "/SistemaMonitoria/api/AlunoEventosMonitoria.php?id=" + monitoria_id);
        xmlhttp.send();
    };
    
    this.post = function (monitoria_id) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function () {
            if (xmlhttp.status === 200 || xmlhttp.status === 201)
            {
                alert("Participação efetuada com sucesso");
            } else {
                alert("Erro ao efetuar participação");
            }
        };
        xmlhttp.open("POST", "/SistemaMonitoria/api/AlunoEventosMonitoria.php?id=" + monitoria_id);
        xmlhttp.send();
    };
}