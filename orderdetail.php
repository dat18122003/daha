<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php') ?>
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./css/orderdetail.css" />
</head>

<body>
    <header class="header">
        <?php
        session_start();
        include('header.php');
        include('connect.php');
        $id_order = $_GET['id'];
        $sql = "SELECT * FROM `order` INNER JOIN `order details` INNER JOIN `products` on `order`.`Id` 
        = `order details`.`Id Orders` and `products`.`Id` = `order details`.`Id Product` WHERE `order`.`Id` = $id_order and `order`.`Id User` =" . $_SESSION['Id User'];
        $result = $connect->query($sql);


        $sql1 = "SELECT DATE_FORMAT(`order`.`Time`, '%h:%i %d/%m/%Y ') as time_order, `order`.`Active` FROM `Order` WHERE `order`.`Id` = $id_order";
        $result1 = $connect->query($sql1);
        $status = mysqli_fetch_array($result1);
        $active = $status['Active'];
        $time = $status['time_order'];
        ?>
    </header>

    <div class="container">
        <div class="title">Chi tiết đơn hàng: <b style="color: red;"><?= $active ?></b> </div>
        <div class="time"> Ngày đặt hàng: <p><?= $time ?></p>
        </div>
        <div class="content">
            <table>
                <thead>
                    <tr>
                        <td>Sản phẩm</td>
                        <td>Đơn giá</td>
                        <td class="end">Số lượng</td>
                        <td class="end">Thành tiền</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    while ($row = mysqli_fetch_array($result)) {
                        $price = $row['Price'] * $row['Number'];
                        $total = $total + $price;
                    ?>
                        <tr>
                            <td>
                                <div class="product">
                                    <img src="<?= "./" . $row['Image']; ?>" alt="">
                                    <p><?= $row['Name Product'] ?></p>
                                </div>
                            </td>

                            <td>
                                <div class="price"><?= number_format($row['Price'], 0, '.', '.') ?>đ</div>
                            </td>
                            <td class="end">
                                <div class="number"><?= $row['Number'] ?></div>
                            </td>
                            <td class="end">
                                <div><?= number_format($price, 0, '.', '.') ?>đ</div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <div class="end end1">
                                <p>Tạm tính</p>
                                <p>Phí vận chuyển</p>
                                <p>Tổng tiền</p>
                            </div>
                        </td>
                        <td class="end">
                            <div>
                                <p><?= number_format($total, 0, '.', '.') ?>đ</p>
                                <p>0</p>
                                <p class="price1"><?= number_format($total, 0, '.', '.') ?>đ</p>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="back">
                <a href="myorder.php"> <i class="fa-solid fa-backward"></i>Quay lại đơn hàng của tôi</a>
            </div>
        </div>


    </div>

    <script src="./js/myorder2.js"></script>

</body>

</html>