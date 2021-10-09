<?php

require_once 'connection.model.php';

class SaleModels {

    static public function AddSaleModel($IdClient, $IdUser) {

        // statement
        $link = Connection::Connect();
        $stmt = $link->prepare("INSERT INTO sale (IdClient, IdUser)
        VALUES (:IdClient, :IdUser)");

        $stmt -> bindParam(':IdClient', $IdClient, PDO::PARAM_STR);
        $stmt -> bindParam(':IdUser', $IdUser, PDO::PARAM_STR);

        if (($stmt -> execute())) {
            return array(
                'Code' => true,
                'UltimoID' => $link -> lastInsertId()
            );
        } else {
            return array(
                'Code' => false,
                'UltimoID' => null
            );
        }
        
    }

    static public function AddSaleDetaillModel($IdSale, $IdProduct, $SDAmount) {

        $stmt = Connection::Connect()->prepare("INSERT INTO sale_detaill (IdSale, IdProduct, SDAmount)
        VALUES (:IdSale, :IdProduct, :SDAmount)");

        $stmt -> bindParam(':IdSale', $IdSale, PDO::PARAM_STR);
        $stmt -> bindParam(':IdProduct', $IdProduct, PDO::PARAM_STR);
        $stmt -> bindParam(':SDAmount', $SDAmount, PDO::PARAM_STR);

        return ($stmt -> execute()) ? 'success' : Connection::Connect()->errorInfo();
        
    }

    static public function GetDataProductWhereModel($IdProduct) {
        $stmt = Connection::Connect()->prepare("SELECT * FROM product WHERE IdProduct = '$IdProduct'");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static public function UpdateStockProductModel($NewStock, $IdProduct) {
        $stmt = Connection::Connect()->prepare("UPDATE product SET PStock = '$NewStock' WHERE IdProduct = '$IdProduct'");
        return ($stmt -> execute()) ? 'success' : Connection::Connect()->errorInfo();
    }

    static public function GetDataSaleWhereModel($IdSale) {
        $stmt = Connection::Connect()->prepare("SELECT * FROM sale
        INNER JOIN client ON sale.IdClient = client.IdClient
        INNER JOIN user ON sale.IdUser = user.IdUser
        WHERE sale.IdSale = '$IdSale'");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static public function GetDataSaleDetaillWhereModel($IdSale) {
        $stmt = Connection::Connect()->prepare("SELECT * FROM sale_detaill
        INNER JOIN product ON sale_detaill.IdProduct = product.IdProduct
        WHERE sale_detaill.IdSale = '$IdSale'");
        $stmt->execute();
        return $stmt->fetchAll();
    }


}