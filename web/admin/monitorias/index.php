<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Tutoria</title>
    <?php include('../includes/head.php') ?>
</head>
<body class="bg-light">
    <?php include('../includes/header.php') ?>
    <?php include('../includes/sidebar.php') ?>
    <!-- Main Container-->
    <div id="main-container" class="bg-body padded">
        <div class="d-flex justify-content-between">
            <h3>Monitorias</h3>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#monitoriaModal">Adicionar Monitoria <i class='bx bx-plus'></i></button>
        </div>
        <div class="container mt-4 px-0">
            <table id="lista_de_monitorias" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Disciplina</th>
                        <th>Responsável</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="modal fade" id="monitoriaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Novo Monitoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="adicionarmonitoria" action="#" method="POST">
                    <div class="modal-body">
                        <!-- FORMULÁRIO DE NOVO MONITORIA -->
                        <div class="mb-3">
                            <label for="titulo" class="col-form-label">Titulo:</label>
                            <input type="text" class="form-control" name="titulo" id="titulo">
                        </div>
                        <div class="mb-3">
                            <label for="professor_id" class="col-form-label">Responsável:</label>
                            <select class="form-control" name="professor_id" id="professor_id">
                                <option value="">Selecione...</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="disciplina_id" class="col-form-label">Disciplina:</label>
                            <select class="form-control" name="disciplina_id" id="disciplina_id">
                                <option value="">Selecione...</option>
                            </select>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-6">
                                <label for="data_inicio" class="col-form-label">Data de Início:</label>
                                <input type="date" class="form-control" name="data_inicio" id="data_inicio">
                            </div>
                            <div class="col-6">
                                <label for="data_fim" class="col-form-label">Data de Fim:</label>
                                <input type="date" class="form-control" name="data_fim" id="data_fim">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-6">
                                <label for="hora_inicio" class="col-form-label">Hora Início:</label>
                                <input type="time" class="form-control" name="hora_inicio" id="hora_inicio">
                            </div>
                            <div class="col-6">
                                <label for="hora_fim" class="col-form-label">Hora Fim:</label>
                                <input type="time" class="form-control" name="hora_fim" id="hora_fim">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="diassemana" class="col-form-label">Dias da Semana:</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="diassemana" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">Seg</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="diassemana" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">Ter</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="diassemana" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">Qua</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="diassemana" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">Qui</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="diassemana" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">Sex</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="diassemana" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">Sab</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="diassemana" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">Dom</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
<?php include('../includes/scripts_footer.php') ?>
<script src="../assets/js/controle/controleMonitorias.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
        $('#monitoriaModal').modal();
        $("#adicionarmonitoria").on('submit', controleMonitoria.post);
        controleMonitoria.get("#lista_de_monitorias");
    });
</script>