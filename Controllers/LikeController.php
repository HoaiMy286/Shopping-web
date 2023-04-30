<?php
    class LikeController extends BaseController
    {
        public function index()
        {
            if(!isset($_GET['id']))
            {
                return header('Location: http://localhost/index.php?controller=product');
            }
            else{
                $id = $_GET['id'];
                if(empty($_SESSION['like']) || !array_key_exists($id, $_SESSION['like']))
                {
                    $_SESSION['like'][$id] = true;
                    $json = [
                        'likes' => 'Add to favorites successfully'
                    ];
                }
                else{
                    $_SESSION['like'][$id] = true;
                    $json = [
                        'likes' => 'Your item already exist'
                    ];
                }
                $json = json_encode($json);
                echo $json;
            }

        }
        public function showlike()
        {
            if(empty( $_SESSION['like']))
            {
                $likes = "Your like is empty";
            }
            else{
                $this->loadModel('ProductModel');
                $productModel = new ProductModel;
                $likes = [];
                foreach($_SESSION['like'] as $key => $value){
                    $data = $productModel->getby([
                            'id' => $key
                    ]);
                    $data[0]['like'] = $value;
                    array_push($likes, $data[0]);
                }
            }

            return $this->view('frontend.likes.index',[
                'likes' => $likes
            ]);
        }
    }
?>