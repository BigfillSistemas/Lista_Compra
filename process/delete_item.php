<?php
require_once '../includes/config.php';
require_once '../includes/functions.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    if (deleteItem($id)) {
        header('Location: ../index.php?status=delete_success');
    } else {
        header('Location: ../index.php?status=delete_error');
    }
    exit;
}

header('Location: ../index.php');
?>