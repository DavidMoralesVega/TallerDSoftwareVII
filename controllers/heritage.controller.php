<?php
class HeritageControllers
{

    static public function GetTableController($Table)
    {
        return HeritageModels::GetTableModel($Table);
    }
}
