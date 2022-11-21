<?php
include('connect.php');
if (isset($_POST['huydonhang'])) {
    $id_order  = $_POST['id_order'];
    $update_order = "UPDATE `order` SET `Active` = 'Đã hủy' WHERE `order`.`Id` = $id_order";
    $connect->query($update_order);
}
if (isset($_POST['nhanduochang'])) {
    $id_order  = $_POST['id_order'];
    $update_order = "UPDATE `order` SET `Active` = 'Đã thành công' WHERE `order`.`Id` = $id_order";
    $connect->query($update_order);
}
if (isset($_POST['mualai'])) {
    $id_order  = $_POST['id_order'];
    $update_order = "UPDATE `order` SET `Active` = 'Đang xử lý' WHERE `order`.`Id` = $id_order";
    $connect->query($update_order);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php') ?>
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./css/myorder.css" />
</head>

<body>
    <header class="header">
        <?php
        session_start();
        include('header.php');

        $sql = "SELECT * FROM `order` WHERE `order`.`Id User` =" . $_SESSION['Id User'];
        $result = $connect->query($sql);
        $sql2 = "SELECT * FROM `order` WHERE `order`.`Id User` =" . $_SESSION['Id User'] . " and `order`.`Active` = 'Đang xử lý'";
        $result2 = $connect->query($sql2);
        $sql3 = "SELECT * FROM `order` WHERE `order`.`Id User` =" . $_SESSION['Id User'] . " and `order`.`Active` = 'Đang vận chuyển'";
        $result3 = $connect->query($sql3);
        $sql4 = "SELECT * FROM `order` WHERE `order`.`Id User` =" . $_SESSION['Id User'] . " and `order`.`Active` = 'Đã hủy'";
        $result4 = $connect->query($sql4);
        $sql5 = "SELECT * FROM `order` WHERE `order`.`Id User` =" . $_SESSION['Id User'] . " and `order`.`Active` = 'Đã thành công'";
        $result5 = $connect->query($sql5);
        ?>
    </header>

    <div class="container">
        <div class="title">Đơn hàng của tôi</div>
        <div class="controler">
            <ul>
                <li class="activate" type_control="1">Tất cả đơn hàng</li>
                <li type_control="2">Đang xử lý</li>
                <li type_control="3">Đang vận chuyển</li>
                <li type_control="4">Đã hủy</li>
                <li type_control="5">Đã thành công</li>
            </ul>
        </div>
        <div class="content">
            <!-- tất cả đơn hàng -->
            <div class="list_order activate" type_control="1">
                <?php
                if ($result->num_rows == 0) {
                ?>
                    <div class="none_order">
                        <img src="./images/empty-order.png" alt="">
                        <p>Chưa có đơn hàng</p>
                    </div>
                <?php
                } else {
                ?>

                    <?php
                    while ($item_order = mysqli_fetch_array($result)) {
                    ?>
                        <div class="item_order">

                            <div class="activate_order"><i class="fa-solid fa-truck"></i><?php echo $item_order['Active'] ?></div>

                            <?php
                            $sql1 = "SELECT * FROM `order details` INNER JOIN `products` on
                        `order details`.`Id Product` = `products`.`Id` WHERE `order details`.`Id Orders` =" . $item_order['Id'];
                            $result1 = $connect->query($sql1);
                            $total = 0;
                            while ($row = mysqli_fetch_array($result1)) {
                                $price_item = $row['Price'] * $row['Number'];

                                $total = $total + $price_item;
                            ?>
                                <div class="content_order">
                                    <img src="<?= "./" . $row['Image'] ?>" alt="">
                                    <div class="text"><?= $row['Name Product'] ?></div>
                                    <div class="number">x<?= $row['Number'] ?></div>
                                    <div class="price"><?= number_format($price_item, 0, '.', '.') ?>đ</div>
                                </div>
                            <?php
                            } ?>
                            <div class="footer_order">
                                <div class="total_money"><span>Tổng tiền: </span> <span class="money"><?= number_format($total, 0, '.', '.') ?>đ</span></div>
                                <div><a href="orderdetail.php?id=<?= $item_order['Id'] ?>">Xem chi tiết</a></div>
                            </div>
                        </div>
                <?php
                    }
                } ?>
            </div>
            <!-- đang xử lý -->
            <div class="list_order" type_control="2">
                <?php
                if ($result2->num_rows == 0) {
                ?>
                    <div class="none_order">
                        <img src="./images/empty-order.png" alt="">
                        <p>Chưa có đơn hàng</p>
                    </div>
                <?php
                } else {
                ?>
                    <?php
                    while ($item_order = mysqli_fetch_array($result2)) {
                    ?>
                        <div class="item_order">

                            <div class="activate_order"><i class="fa-solid fa-truck"></i><?php echo $item_order['Active'] ?></div>

                            <?php
                            $sql1 = "SELECT * FROM `order details` INNER JOIN `products` on
                             `order details`.`Id Product` = `products`.`Id` WHERE `order details`.`Id Orders` =" . $item_order['Id'];
                            $result1 = $connect->query($sql1);
                            $total = 0;
                            while ($row = mysqli_fetch_array($result1)) {
                                $price_item = $row['Price'] * $row['Number'];

                                $total = $total + $price_item;
                            ?>
                                <div class="content_order">
                                    <img src="<?= "./" . $row['Image'] ?>" alt="">
                                    <div class="text"><?= $row['Name Product'] ?></div>
                                    <div class="number">x<?= $row['Number'] ?></div>
                                    <div class="price"><?= number_format($price_item, 0, '.', '.') ?>đ</div>
                                </div>
                            <?php
                            } ?>
                            <div class="footer_order">
                                <div class="total_money"><span>Tổng tiền: </span> <span class="money"><?= number_format($total, 0, '.', '.') ?>đ</span></div>
                                <div>
                                    <form action="" method="POST">
                                        <input type="hidden" name="id_order" value="<?= $item_order['Id'] ?>">
                                        <input type="submit" name="huydonhang" value="Hủy đơn hàng">
                                    </form>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } ?>
            </div>
            <!-- đang vận chuyển -->
            <div class="list_order" type_control="3">
                <?php
                if ($result3->num_rows == 0) {
                ?>
                    <div class="none_order">
                        <img src="./images/empty-order.png" alt="">
                        <p>Chưa có đơn hàng</p>
                    </div>
                <?php
                } else {
                ?>
                    <?php

                    while ($item_order = mysqli_fetch_array($result3)) {
                    ?>
                        <div class="item_order">

                            <div class="activate_order"><i class="fa-solid fa-truck"></i><?php echo $item_order['Active'] ?></div>

                            <?php
                            $sql1 = "SELECT * FROM `order details` INNER JOIN `products` on
                             `order details`.`Id Product` = `products`.`Id` WHERE `order details`.`Id Orders` =" . $item_order['Id'];
                            $result1 = $connect->query($sql1);
                            $total = 0;
                            while ($row = mysqli_fetch_array($result1)) {
                                $price_item = $row['Price'] * $row['Number'];

                                $total = $total + $price_item;
                            ?>
                                <div class="content_order">
                                    <img src="<?= "./" . $row['Image'] ?>" alt="">
                                    <div class="text"><?= $row['Name Product'] ?></div>
                                    <div class="number">x<?= $row['Number'] ?></div>
                                    <div class="price"><?= number_format($price_item, 0, '.', '.') ?>đ</div>
                                </div>
                            <?php
                            } ?>
                            <div class="footer_order">
                                <div class="total_money"><span>Tổng tiền: </span> <span class="money"><?= number_format($total, 0, '.', '.') ?>đ</span></div>
                                <form action="" method="POST">
                                    <input type="hidden" name="id_order" value="<?= $item_order['Id'] ?>">
                                    <input type="submit" name="nhanduochang" value="Đã nhận được hàng">
                                </form>
                            </div>
                        </div>
                <?php
                    }
                } ?>
            </div>
            <!-- đã hủy -->
            <div class="list_order" type_control="4">
                <?php
                if ($result4->num_rows == 0) {
                ?>
                    <div class="none_order">
                        <img src="./images/empty-order.png" alt="">
                        <p>Chưa có đơn hàng</p>
                    </div>
                <?php
                } else {
                ?>
                    <?php

                    while ($item_order = mysqli_fetch_array($result4)) {
                    ?>
                        <div class="item_order">

                            <div class="activate_order"><i class="fa-solid fa-truck"></i><?php echo $item_order['Active'] ?></div>

                            <?php
                            $sql1 = "SELECT * FROM `order details` INNER JOIN `products` on
                             `order details`.`Id Product` = `products`.`Id` WHERE `order details`.`Id Orders` =" . $item_order['Id'];
                            $result1 = $connect->query($sql1);
                            $total = 0;
                            while ($row = mysqli_fetch_array($result1)) {
                                $price_item = $row['Price'] * $row['Number'];

                                $total = $total + $price_item;
                            ?>
                                <div class="content_order">
                                    <img src="<?= "./" . $row['Image'] ?>" alt="">
                                    <div class="text"><?= $row['Name Product'] ?></div>
                                    <div class="number">x<?= $row['Number'] ?></div>
                                    <div class="price"><?= number_format($price_item, 0, '.', '.') ?>đ</div>
                                </div>
                            <?php
                            } ?>
                            <div class="footer_order">
                                <div class="total_money"><span>Tổng tiền: </span> <span class="money"><?= number_format($total, 0, '.', '.') ?>đ</span></div>
                                <form action="" method="POST">
                                    <input type="hidden" name="id_order" value="<?= $item_order['Id'] ?>">
                                    <input type="submit" name="mualai" value="Mua lại sản phẩm">
                                </form>
                            </div>
                        </div>
                <?php
                    }
                } ?>
            </div>
            <!-- đã thành công -->
            <div class="list_order" type_control="5">
                <?php
                if ($result5->num_rows == 0) {
                ?>
                    <div class="none_order">
                        <img src="./images/empty-order.png" alt="">
                        <p>Chưa có đơn hàng</p>
                    </div>
                <?php
                } else {
                ?>
                    <?php
                    while ($item_order = mysqli_fetch_array($result5)) {
                    ?>
                        <div class="item_order">

                            <div class="activate_order"><i class="fa-solid fa-truck"></i><?php echo $item_order['Active'] ?></div>

                            <?php
                            $sql1 = "SELECT * FROM `order details` INNER JOIN `products` on
                             `order details`.`Id Product` = `products`.`Id` WHERE `order details`.`Id Orders` =" . $item_order['Id'];
                            $result1 = $connect->query($sql1);
                            $total = 0;
                            while ($row = mysqli_fetch_array($result1)) {
                                $price_item = $row['Price'] * $row['Number'];

                                $total = $total + $price_item;
                            ?>
                                <div class="content_order">
                                    <img src="<?= "./" . $row['Image'] ?>" alt="">
                                    <div class="text"><?= $row['Name Product'] ?></div>
                                    <div class="number">x<?= $row['Number'] ?></div>
                                    <div class="price"><?= number_format($price_item, 0, '.', '.') ?>đ</div>
                                </div>
                            <?php
                            } ?>
                            <div class="footer_order">
                                <div class="total_money"><span>Tổng tiền: </span> <span class="money"><?= number_format($total, 0, '.', '.') ?>đ</span></div>
                                <form action="" method="POST">
                                    <input type="hidden" name="id_order" value="<?= $item_order['Id'] ?>">
                                    <input type="submit" name="none" value="Xem chi tiết">
                                </form>
                            </div>
                        </div>
                <?php
                    }
                } ?>
            </div>
        </div>
    </div>

    <script src="./js/myorder2.js"></script>

</body>

</html>