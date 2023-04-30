<?php
    class HomeController extends BaseController
    {
        function __construct()
        {
            $_SESSION['olduri'] = $_SERVER['REQUEST_URI'];
        }
        public function index()
        {
            return $this->view('frontend.homes.index');
        }
    }
?>