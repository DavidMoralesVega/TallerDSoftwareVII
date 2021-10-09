<?php
class TemplateControllers {
    
    static public function GetTemplateController() {
        include 'views/template.php';
    }

    static public function GetHeaderController() {
        // Validar sesion
        session_start();
        if ($_SESSION['ValidateLogin'] !== true) {
            header('location:login');
            exit();
        }
        include 'views/components/shared/header.php';
    }
    
}