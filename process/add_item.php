<?php
require_once '../includes/config.php';
require_once '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Converter a data do formato HTML para MySQL
    $data = date('Y-m-d H:i:s', strtotime($_POST['itemDateTime']));
    $item = $_POST['itemName'];
    $quantidade = $_POST['itemQuantity'];
    
    if (addItem($data, $item, $quantidade)) {
        header('Location: ../index.php?status=success');
    } else {
        header('Location: ../index.php?status=error');
    }
    exit;
}

header('Location: ../index.php');
?>