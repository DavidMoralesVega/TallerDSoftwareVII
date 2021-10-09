<?php
require_once 'connection.model.php';
class HeritageModels
{

    static public function GetTableModel($Table)
    {
        $stmt = Connection::Connect()->prepare("SELECT * FROM $Table");
        if ($stmt->execute()) {
            return array(
                'List' => $stmt->fetchAll(),
                'Code' => true
            );
        } else {
            return array(
                'List' => null,
                'Code' => false
            );
        }
    }
}
