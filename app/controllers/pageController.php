<?php

class PageController {

    public function handle() {

        $section = $_GET['section'] ?? 'home';

        $file = "./app/views/" . $section . ".php";

        require "./app/views/layout.php";
    }
}