<?php require __DIR__ . "/../Layout/homeheader.php";
// var_dump($productlist);
$config = require 'config.php';
$baseURL = $config['baseURL'];

?>

<section>
    <div class="container text-center">
        <h2> 🛒 Giỏ Hàng Của Bạn</h2>
        <?php
        if (empty($cartIteam)) {
        ?>
            <div class="alert alert-info text-center">
                Chưa có sản phẩm trong giỏ hàng
            </div>
        <?php
        } else {
        ?>
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Tên sản phẩm </th>
                        <th>Giá</th>
                        <th>Số lương </th>
                        <th>Thành tiền</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $grandTotal = 0;
                    foreach ($cartIteam as $iteam) {
                        $total = $iteam['Price'] *  $iteam['quantity'];
                        $grandTotal += $total;
                    ?>
                        <tr>
                            <td><?= $iteam['Name'] ?></td>
                            <td><?= number_format($iteam['Price']) ?>USD</td>
                            <td><?= $iteam['quantity'] ?></td>
                            <td><?= number_format($total, 0) ?>USD</td>
                        </tr>
                    <?php
                    }

                    ?>
                <tfoot>
                    <tr class="table-secondary">
                        <th colspan="3" class="text-end">Tổng cộng:</th>
                        <th><?= number_format($grandTotal, 0) ?> USD</th>
                    </tr>
                </tfoot>
                </tbody>
            </table>
        <?php
        }
        ?>
    </div>
</section>
<?php include './App/Views/Layout/homeFooter.php'; ?>