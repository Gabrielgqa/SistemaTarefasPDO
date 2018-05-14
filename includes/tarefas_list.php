<?php
require_once('../../config/config.php');
require_once('../../models/Usuario.php');
require_once('../../models/Tarefa.php');
require_once('../../models/Setor.php');
require_once('../../models/Projeto.php');

if (!isset($_SESSION['id'])) {
    header('location: ../../views/login.php');
} else {
    switch ($_SESSION['tipo']) {
        case Usuario::TIPO_ADMIN:
            $tarefas = Tarefa::selectAll($pdo);
            break;

        case Usuario::TIPO_CHEFE:
            $tarefas = Tarefa::selectAllBySetor($_SESSION['setor'], $pdo);
            break;

        case Usuario::TIPO_COLABORADOR:
            $tarefas = Tarefa::selectAllByUsuario($_SESSION['id'], $pdo);
            break;

        default:
            # code...
            break;
    }
}

if (!empty($tarefas)) {
    foreach ($tarefas as $tarefa) {
        $usuario = Usuario::select($tarefa['id_usuario'], $pdo);
        $projeto = Projeto::select($tarefa['id_projeto'], $pdo);

        echo "
        <tr>
            <td>".$tarefa['nome']."</td>
            <td>".$tarefa['descricao']."</td>
            <td>".(new DateTime($tarefa['data_ini']))->format('d/m/Y')."</td>
            <td>".(empty($tarefa['data_fim']) ? '-' : (new DateTime($tarefa['data_fim']))->format('d/m/Y'))."</td>
            <td>".$usuario['nome']."</td>
            <td>".$projeto['nome']."</td>".

            (empty($tarefa['data_fim']) ? "<td><a href='../../controllers/TarefaController.php?id=".$tarefa['id']."&action=complete'>Completar</a></td>" : "<td></td>").
            "<td><a href='editar.php?id=".$tarefa['id']."'>Editar</a></td>
            <td><a href='../../controllers/TarefaController.php?id=".$tarefa['id']."&action=delete'>Excluir</a></td>
        </tr>
        ";
    }
} else {
    echo "
        <tr>
            <td colspan='7'>Não existem tarefas cadastradas.</td>

        </tr>
        ";
}

?>
