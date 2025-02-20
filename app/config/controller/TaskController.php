<?php

require_once '../../config/init.php';

class TaskController{


    public static function RegisterTask(Task $task) {
        $title = $task->getTitle();
        $description = $task->getDescription();
        $status = $task->getStatus();
        $date = $task->getDate(); 
    
        PdoUtils::ExecSQL(
            "INSERT INTO tache (title, description, status, date) VALUES (?,?,?,?)", 
            [$title, $description, $status, $date]
        );
    }

    public static function getAllTasks(){
        $result = Pdoutils::SelectSQLAll("SELECT * FROM tache");
        return $result;
    }

    public static function createTaskModel($taskData) {
        return new Task(
            $taskData['title'],
            $taskData['description'],
            $taskData['status'],
            $taskData['date']
        );
    }
    public static function deleteTask($id){
        $pdo = PdoUtils::ExecSQL("DELETE FROM tache WHERE id = ?",[ $id]);
            
    }
    public static function UpdateTask($title, $description,$status,$date, $id){
        $pdo = PdoUtils::ExecSQL("UPDATE tache SET title = ?, description = ?, status = ?, date= ? WHERE id = ?",[$title, $description,$status,$date,$id]);
    }



}