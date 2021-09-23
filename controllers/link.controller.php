<?php
class LinksControllers {

    static public function LinkController() {
        if (isset($_GET['action'])) {
            $link = $_GET['action'];
        } else {
            $link = 'index';
        }

        $Response = LinksModels::LinkModel($link);
        include $Response;
    }

}