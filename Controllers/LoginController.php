<?php
    class LoginController
    {
        public function index(){
            echo __METHOD__;
        }
        public function login()
        {
            echo __METHOD__;
            return header('http://localhost/MVC_ProjectShopping/index.php?');
        }
    }
?>