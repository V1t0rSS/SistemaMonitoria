<?php
if($_SERVER['SERVER_NAME'] == 'localhost')
    $basepath = '/SistemaMonitoria';
?>
<div class="l-navbar show-sidebar" id="nav-bar">
    <nav class="nav">
        <div>
            <a href="#" class="nav_logo">
                <i class='bx bxs-graduation nav_logo-icon'></i>
                <span class="nav_logo-name">SistemaMonitoria</span>
            </a>
            <div class="nav_list">
                <a href="<?= $basepath ?>/web/admin/dashboard" class="nav_link <?php if (basename(getcwd()) == "dashboard") echo 'active'; ?>">
                    <i class='bx bx-home nav_icon'></i>
                    <span class="nav_name">Início</span>
                </a>
                <a href="#" class="nav_link">
                    <i class='bx bx-message-square-detail nav_icon'></i>
                    <span class="nav_name">Chamados 
                        <span class="badge rounded-pill bg-danger">2</span>
                    </span>
                </a>
                <a href="<?= $basepath ?>/web/admin/monitorias" class="nav_link <?php if (basename(getcwd()) == "monitorias") echo 'active'; ?>">
                    <i class='bx bx-calendar'></i>
                    <span class="nav_name">Monitorias</span>
                </a>
                <a href="<?= $basepath ?>/web/admin/administradores" class="nav_link <?php if (basename(getcwd()) == "administradores") echo 'active'; ?>">
                    <i class='bx bx-key'></i>
                    <span class="nav_name">Administradores</span>
                </a>
                <a href="<?= $basepath ?>/web/admin/professores" class="nav_link <?php if (basename(getcwd()) == "professores") echo 'active'; ?>">
                    <i class='bx bxs-graduation'></i>
                    <span class="nav_name">Professores</span>
                </a>
                <a href="<?= $basepath ?>/web/admin/monitores" class="nav_link <?php if (basename(getcwd()) == "monitores") echo 'active'; ?>">
                    <i class='bx bxs-user-account'></i>
                    <span class="nav_name">Monitores</span>
                </a>
                <a href="<?= $basepath ?>/web/admin/alunos" class="nav_link <?php if (basename(getcwd()) == "alunos") echo 'active'; ?>">
                    <i class='bx bxs-user-account'></i>
                    <span class="nav_name">Alunos</span>
                </a>
                <a href="#" class="nav_link text-danger">
                    <i class='bx bx-log-out'></i>
                    <span class="nav_name">Sair</span>
                </a>
            </div>
        </div>
    </nav>
</div>