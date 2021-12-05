function carregaListaAlunos(alunos) {

    var tabelaAlunos = document.getElementById("lista_de_alunos");
    var corpo = tabelaAlunos.getElementsByTagName('tbody')[0];
    console.log("tabelaAlunos:" + tabelaAlunos.rows.length);
    var length = corpo.rows.length;
    for (var index = 1; index < length; index++) {
        corpo.deleteRow(1);
    }
    for (var aluno in alunos) {
        //console.log(JSON.stringify(aluno));
        var novaLinha = corpo.insertRow(corpo.rows.length);

        novaLinha.innerHTML = '<tr>'
                + '<td>' + alunos[aluno]["nome"] + '</td>'
                + '<td>' + alunos[aluno]['matricula'] + '</td>'
                + '<td>' + alunos[aluno]['email'] + '</td>'
                + '</tr>';
    }

}