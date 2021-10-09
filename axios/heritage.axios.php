<?php

require_once '../controllers/heritage.controller.php';
require_once '../models/heritage.model.php';

class HeritageAxios
{

    public $Table;

    public function GetTableAxios()
    {
        $Table = $this->Table;

        $Response = HeritageControllers::GetTableController($Table);
        echo json_encode($Response);
    }

}

if (isset($_POST['Table'])) {
    $ExecuteGetTable = new HeritageAxios();
    $ExecuteGetTable->Table = $_POST['Table'];
    $ExecuteGetTable->GetTableAxios();
}