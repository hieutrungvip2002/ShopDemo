<?php require __DIR__ . "/../Layout/HomeHeader.php";
// var_dump($productlist);
$config = require 'config.php';
$baseURL = $config['baseURL'];

?>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php foreach ($productlist as $iteam) : ?>

                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->

                        <img class="card-img-top" src="<?= $baseURL . 'Assets/assets/Products/' . $iteam['Image'] ?>" alt="..." />

                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"><?= $iteam['Name'] ?></h5>
                                <!-- Product price-->
                                <?= $iteam['Price'] ?>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center mb-2"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                            <form method="post" action="<?= $baseURL . 'cart/add' ?>">
                                <input type="hidden" name="product_id" value="<?= $iteam['Id'] ?>">
                                <button type="submit" class="btn btn-primary btn-sm ">Add to Cart</button>
                            </form>
                            <div class="text-center"><a class="btn mt-auto btn-primary" href="#">Add to cart</a></div>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    </div>
</section>

<?php require __DIR__ . "/../Layout/homefooter.php"
?>