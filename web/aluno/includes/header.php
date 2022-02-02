<?php
    if($_SERVER['SERVER_NAME'] == 'localhost')
        $basepath = '/SistemaMonitoria';
?>
<nav class="clearfix">
    <span>
        <img src="" alt="">
        <a id="logo" href="index.php">MonitoriasOnline</a>
    </span>

    <a  href="../includes/sair.php">Logout</a>
    <a  href="<?= $basepath ?>/web/aluno/monitorias">Monitorias</a>
    <a  href="<?= $basepath ?>/web/aluno/dashboard">Eventos</a>
</nav>
