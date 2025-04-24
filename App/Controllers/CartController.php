<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class CartController
{
    public function add()
    {
        if (
            $_SERVER['REQUEST_METHOD'] === 'POST'
            && isset($_POST['product_id'])
        ) {
            $productId = $_POST['product_id'];

            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }

            if (isset($_SESSION['cart'][$productId])) {
                $_SESSION['cart'][$productId]['quantity'] += 1;
            } else {
                $_SESSION['cart'][$productId] = [
                    'product_id' => $productId,
                    'quantity' => 1
                ];
            }
            $config = require 'config.php';

            $baseURL = $config['baseURL'];


            header('Location:' . $baseURL . '/home/index');
            exit;
        }
    }

    public function index()
    {
        require_once './App/Model/ProductModel.php';
        $productModel = new ProductModel;
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $cartIteam = [];
        if (isset($_SESSION['cart'])); {
            foreach ($_SESSION['cart'] as $iteam) {
                $product = $productModel->getProductById($iteam['product_id']);
                $product['quantity'] = $iteam['quantity'];
                $cartIteam[] = $product;
            }
        }

        // var_dump($cartIteam);

        include './App/Views/Cart/index.php';
    }
}
