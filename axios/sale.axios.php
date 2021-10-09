<?php
require_once '../controllers/sale.controller.php';
require_once '../models/sale.model.php';

class SaleAxios
{

    public $DataSale;
    public $DataProducts;

    public function AddNewSaleAxios()
    {

        $DataSale = $this->DataSale;
        $DataProducts = $this->DataProducts;

        $DataSaleConvert = json_decode($DataSale);
        $DataProductsConvert = json_decode($DataProducts);

        $Response = SaleControllers::AddNewSaleController($DataSaleConvert, $DataProductsConvert);
        
        echo json_encode($Response);

    }

    
}


if (isset($_POST['DataSale'])) {

    $ExecuteNewSale = new SaleAxios();
    $ExecuteNewSale->DataSale = $_POST['DataSale'];
    $ExecuteNewSale->DataProducts = $_POST['DataProducts'];
    $ExecuteNewSale->AddNewSaleAxios();
}
