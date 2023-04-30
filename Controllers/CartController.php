 <?php
    class CartController extends BaseController
    {
        // public function __construct()
        // {

        // }
        public function index()
        {
            if(!isset($_GET['id']))
            {
                return header('Location: http://localhost/index.php?controller=product');
            }
            else{
                $id = $_GET['id'];
                if(empty($_SESSION['cart']) || !array_key_exists($id, $_SESSION['cart']))
                {
                    $_SESSION['cart'][$id] = 1;
                }
                else{
                    $_SESSION['cart'][$id]= $_SESSION['cart'][$id] + 1;
                }
                $json = json_encode([
                    'carts' => count($_SESSION['cart']),
            ]);
                echo $json;
            }
        }
        
        public function showcart()
        {

            return $this->view('frontend.carts.showcart');
        }
        public function updatecart()
        {
            if(empty( $_SESSION['cart']))
            {
                $carts = [
                    "empty" => "Your cart is empty"
                ];
            }
            else{
                $this->loadModel('ProductModel');
                $productModel = new ProductModel;
                $carts = [];
                foreach($_SESSION['cart'] as $key => $value){
                    $data = $productModel->getby([
                            'id' => $key
                    ]);
                    $data[0]['qty'] = $value;
                    array_push($carts, $data[0]);
                }
            }
            $json = json_encode($carts);
            echo $json;
        }

    }
 ?>