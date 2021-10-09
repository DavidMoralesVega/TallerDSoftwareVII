<?php
class SaleControllers
{

    static public function AddNewSaleController($DataSale, $DataProducts)
    {
        // Almacenar venta
        $ResponseSale = SaleModels::AddSaleModel($DataSale->IdClient, $DataSale->IdUser);

        if ($ResponseSale['Code']) {
            // Almacenar detalle de venta (productos)
            foreach ($DataProducts as $key => $Product) {
                SaleModels::AddSaleDetaillModel($ResponseSale['UltimoID'], $Product->IdProduct, $Product->SDAmount);
                // Traer el stock actual del producto
                // SELECT * FROM product WHERE IdProduct = $Product->IdProduct
                $GetProduct = SaleModels::GetDataProductWhereModel($Product->IdProduct);
                $StockCurrent = $GetProduct[0]['PStock'];
                // Operacion StockActual - CantidadVenta
                $NewStock = $StockCurrent - $Product->SDAmount;
                // Actualizar el stock de cada producto
                $UpdateStockProduct = SaleModels::UpdateStockProductModel($NewStock, $Product->IdProduct);
            }
            return array(
                'Code' => true,
                'Message' => 'Venta exitosa.',
                'IdSale' => $ResponseSale['UltimoID']
            );
        }
    }
}
