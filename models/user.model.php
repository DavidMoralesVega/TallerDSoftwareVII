<?php

require_once 'connection.model.php';

class UserModels {

    static public function AddUserModel($NewUser) {

        // statement
        $stmt = Connection::Connect()->prepare("INSERT INTO user (UName, UIdentity, UAddress, UCellular, UEmail, UPassword, UType)
        VALUES (:UName, :UIdentity, :UAddress, :UCellular, :UEmail, :UPassword, :UType)");

        $stmt -> bindParam(':UName', $NewUser->UName, PDO::PARAM_STR);
        $stmt -> bindParam(':UIdentity', $NewUser->UIdentity, PDO::PARAM_STR);
        $stmt -> bindParam(':UAddress', $NewUser->UAddress, PDO::PARAM_STR);
        $stmt -> bindParam(':UCellular', $NewUser->UCellular, PDO::PARAM_STR);
        $stmt -> bindParam(':UEmail', $NewUser->UEmail, PDO::PARAM_STR);
        $stmt -> bindParam(':UPassword', $NewUser->UPassword, PDO::PARAM_STR);
        $stmt -> bindParam(':UType', $NewUser->UType, PDO::PARAM_STR);

        return ($stmt -> execute()) ? 'success' : 'error';
        
    }

    static public function GetUserModel() {

        $stmt = Connection::Connect()->prepare("SELECT * FROM user WHERE UDelete = '0'");
        if ($stmt -> execute()) {
            return array(
                'ListUser' => $stmt -> fetchAll(),
                'Code' => true
            );
        } else {
            return array(
                'ListUser' => null,
                'Code' => false
            ); 
        }
    }

    static public function GetUserWhereModel($UEmail) {

        $stmt = Connection::Connect()->prepare("SELECT * FROM user WHERE UEmail = '$UEmail'");
        $stmt -> execute();
        return $stmt -> fetchAll();
        
    }

}