<?php
	require_once('../config/config.php');
	require_once('../models/Projeto.php');
    $action = $_POST['action'];
    switch ($action) {
        case 'create':
            if (isset($_POST)) {
                $user = new Projeto($_POST);
                $user->insert($pdo);
                header('Location: ../views/projeto/index.php');
            }
        break;

        case 'update':
            if (isset($_POST)) {
                $user = new Projeto($_POST);
                $user->update( $_POST['id'], $pdo);
                header('Location: ../views/projeto/index.php');
            }
        break;

        case 'delete':
            if (isset($_GET['id'])) {
                if(Projeto::delete($_GET['id'], $pdo))
                    header('Location: ../views/projeto/index.php');
            }
        break;
    }	
?>