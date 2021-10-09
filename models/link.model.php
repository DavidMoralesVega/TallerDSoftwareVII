<?php
class LinksModels
{
    static public function LinkModel($Link)
    {
        if (
            $Link === 'user' ||
            $Link === 'product' ||
            $Link === 'out' ||
            $Link === 'sale' ||
            $Link === 'login'
        ) {
            $component = 'views/components/' . $Link . '.php';
        } else if($Link === 'index') {
            $component = 'views/components/login.php';
        } else {
            $component = 'views/components/404.php';
        }
        return $component;
    }
}
