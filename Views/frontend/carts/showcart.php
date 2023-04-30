<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Public/bootstrap-5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="Public/fontawesome-free-6.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="Public/style/carts-showcart.css">
    <title>Your Carts</title>
</head>
<body>
    <div class="body-page">
        <div class="d-flex flex-column">
<!-- Header--------------------------------------------------------- -->
        <div class="d-flex flex-column header">
                <div class="d-flex flex-row jordan">
                    <div class="icon-jordan">
                    <img src="Assets/Home/ImageHome/jordanicon.png" alt="">
                    </div>
                    <div class="space"></div>
                    <div class="sign">
                        <span id="findAStore">Find a store</span>
                        |
                        <span id="help">Help</span>
                        |
                        <span id="joinUs">Join Us</span>
                        |
                        <span id = "signIn">Sign In</span>
                    </div>
                </div>

                <div class="d-flex flex-row menu">
                    <div class="icon-nike">
                        <img src="Assets/Home/ImageHome/nikeicon.png" alt="">
                    </div>

                    <div class="menu-option">

                        <span class="select" id="">Home</span>
                        <span class="select" id="gender=men">Men</span>
                        <span class="select" id="gender=women">Women</span>
                        <span class="select" id="gender=children">Children</span>
                    </div>

                    <div class="menu-cart-heart">
                        <div class="icon-heart" id="btnHeart">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <div class="icon-cart" id="btnCart">
                            <i class="fa-solid fa-cart-flatbed-suitcase"></i>
                        </div>
                        <div class="number-cart">
                            <span>Your cart:</span>
                            <span id = "numCart">
                                <?php 
                                    if(empty($_SESSION['cart'])){
                                        echo "0";
                                    }
                                    else{
                                        echo count($_SESSION['cart']);
                                    }
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-row carts">yourcart
                <div class="d-flex flex-column">Bag+Favourites
                    <div class="bag"></div>
                    <div class="favourite"></div>
                </div>
                <div class="">Summary</div>
            </div>
            <div class="footer">footer-site</div>
        </div>
    </div>

    <!-- Script----------- -->
<footer>
    <script src="Public/javascript/carts-showcart.js"></script>
    <script src="Public/bootstrap-5.2.2/dist/js/bootstrap.min.js"></script>
</footer>
</body>
</html>