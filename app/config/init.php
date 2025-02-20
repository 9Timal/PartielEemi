<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'controller/PdoUtils.php';
require_once 'model/TacheModel.php';
require_once 'controller/TaskController.php';
