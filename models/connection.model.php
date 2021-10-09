<?php
class Connection {
    static public function Connect() {
        $link = new PDO('mysql:host=localhost;dbname=tallerjm', 'root', '');
        return $link;
    }
}