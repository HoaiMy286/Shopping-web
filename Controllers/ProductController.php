<?php
    class ProductController extends BaseController
    {
        private $productModel;
        public function __construct()
        {
            $this->loadModel('ProductModel');
            $this->productModel = new ProductModel;
            $_SESSION['olduri'] = $_SERVER['REQUEST_URI'];
        }
        public function index()
        {
            return $this->view('frontend.products.index');
        }
        public function getitem()
        {
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $products = $this->productModel->getby([
                    'id' => $id
                ]);
            }
            else if(isset($_GET['type']) && isset($_GET['gender']))
            {
                $type = $_GET['type'];
                $gender = $_GET['gender'];
                $products = $this->productModel->getby([
                    'type' => $type,
                    'gender' => $gender
                ]);
            }
            else if(isset($_GET['type']))
            {
                $type = $_GET['type'];
                $products = $this->productModel->getby([
                    'type' => $type
                ]);
            }
            else if(isset($_GET['gender']))
            {
                $gender = $_GET['gender'];
                $products = $this->productModel->getby([
                    'gender' => $gender
                ]);
            }
            else{
                $products = $this->productModel->getall();
            }
            $json = json_encode($products);
            echo $json;
        }

    }

?>