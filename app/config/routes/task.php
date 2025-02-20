<?php
require_once '../init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id']) && $_GET['id'] === 'create') {
    var_dump($_POST);
    $task = new Task(
        $title = $_POST['title'],
        $description = $_POST['description'],
        $status = $_POST['status'],
        $date = $_POST['date']
    );

    TaskController::RegisterTask($task);

    header('location:../../public/pages/Task.php');

}elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id']) && $_GET['id'] === 'deleteTask') {

    TaskController::deleteTask($_POST['id']);
    header('location:../../public/pages/Task.php');
}elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id']) && $_GET['id'] === 'updateTask') {
    var_dump($_POST);
    TaskController::UpdateTask($_POST['title'],$_POST['description'],$_POST['status'],$_POST['date'],$_POST['id']);
    header('location:../../public/pages/Task.php');
}