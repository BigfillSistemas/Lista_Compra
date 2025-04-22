<?php
require_once 'config.php';

function getItens() {
    global $conn;
    $sql = "SELECT Id, DATE_FORMAT(Data, '%d/%m/%Y %H:%i') as Data, Item, Quantidade FROM TB_Item ORDER BY Data DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addItem($data, $item, $quantidade) {
    global $conn;
    $sql = "INSERT INTO TB_Item (Data, Item, Quantidade) VALUES (:data, :item, :quantidade)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':data', $data);
    $stmt->bindParam(':item', $item);
    $stmt->bindParam(':quantidade', $quantidade);
    return $stmt->execute();
}

function deleteItem($id) {
    global $conn;
    $sql = "DELETE FROM TB_Item WHERE Id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}
?>