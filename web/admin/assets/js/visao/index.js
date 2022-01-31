function carregaListaAlunos(alunos) {

    var tabelaAlunos = document.getElementById("lista_de_alunos");
    var corpo = tabelaAlunos.getElementsByTagName('tbody')[0];
    var length = corpo.rows.length;
    corpo.innerHTML = "";
    for (var aluno in alunos) {
        var novaLinha = corpo.insertRow(corpo.rows.length);

        novaLinha.innerHTML = '<tr>'
                + '<td>' + alunos[aluno]["nome"] + '</td>'
                + '<td>' + alunos[aluno]['matricula'] + '</td>'
                + '<td>' + alunos[aluno]['email'] + '</td>'
                + '<td><button type="button" class="btn btn-primary" onclick="controleAluno.put('+ alunos[aluno]['id'] +')"><i class="bx bx-pencil"></i></button></td>'
                + '<td><button type="button" class="btn btn-danger" onclick="controleAluno.delete('+ alunos[aluno]['id'] +')"><i class="bx bx-trash"></i></button></td>'
                + '</tr>';
    }

}