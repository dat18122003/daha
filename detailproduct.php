<?php include('connect.php');
include('./content/function.php');
session_start();
?>

<?php
// Lấy thông tin sản phẩm
$id = $_GET['id'];
$sqlcheckuser = "SELECT * FROM `products` WHERE Id = $id";
$ketqua = $connect->query($sqlcheckuser);
$result = mysqli_fetch_array($ketqua);
$NameProduct = $result["Name Product"];
$DesProduct = $result["Describes"];
$PriceProduct = $result["Price"];
// Lấy thông tin comment
$sqlcheckuser1 = "SELECT * FROM `comment`  JOIN `account` WHERE `comment`.`Id User` = `account`.`id` and `comment`.`Id Product`=$id and `comment`.`Reply`=0";
$ketqua1 = $connect->query($sqlcheckuser1);
?>

<?php
// Tiến hành comment
if (isset($_POST['tienhanhcomment'])) {
    $content_val = $_POST['content_val'];
    $star = $_POST['star'];
    if (empty($content_val) || $star == 0) {
        if (empty($content_val)) {
            echo '<script>alert("Nội dung không được để trống")</script>';
        } else if ($star == 0) {
            echo '<script>alert("Vui lòng nhập số sao")</script>';
        }
    } else {
        $sql = "INSERT INTO `comment` (`Id Product`, `Id User` , `Content`, `Star`, `Time`) 
        VALUES ('$id', '" . $_SESSION['Id User'] . "', '$content_val', '$star' , current_timestamp());";
        $connect->query($sql);
        header("Refresh: 0; url=detailproduct.php?id=$id");
        $content_val = "";
        $star = 0;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php') ?>

    <link rel="stylesheet" href="css/detail.css">
</head>

<body>

    <header class="header">
        <?php include('header.php') ?>
    </header>
    <div class="menu">
        <button class="menu_control activate" type_ctr="detail">Detail Product</button>
        <button class="menu_control " type_ctr="review">Review Product </button>
    </div>
    <!-- header section starts  -->
    <div class="content">
        <div class="product-img">
            <img src="<?php echo "./" . $result['Image'] ?>" alt="">
        </div>

        <div class="item_control product-detail activate" type_ctr="detail">
            <h1><?php echo $NameProduct ?></h1>
            <div class="vote">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </div>
            <div class="price"><?php echo $PriceProduct ?>$</div>
            <div class="des">
                <p>
                    <?php echo $DesProduct ?>
                </p>
            </div>
            <div class="product-detail_btn">
                <div class="control">
                    <button class="product-detail_btn-sub">-</button>
                    <input class="product-detail_btn-input" type="text" value="1">
                    <button class="product-detail_btn-add">+</button>
                </div>
                <div>
                    <form action="addcart.php">
                        <button>Add to cart</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="item_control product-review " type_ctr="review">
            <p class="title">Đánh giá sản phẩm</p>

            <div class="list_comment">

            </div>

        </div>
    </div>

    <div class="comment_sl">
        <div class="number_comment">
            65 comments
        </div>
        <div class="sort_comment">
            <i class="fa-solid fa-sort"></i>
            <p>Sort by</p>
        </div>
    </div>

    <form action="" method="POST" class="form_comment">
        <div class="avatas">
            Đ
        </div>
        <div class="form_comment-input">
            <input type="text" class="form_comment-input-text" name="content_val" placeholder="Nhập nhận xét của bạn..">
            <input class="value" name="star" type="hidden" value="0">
            <div class="form_comment-input-btn">
                <div class="star_comment">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <div><button>Cancel</button></div>
                <div><input type="submit" value="Confirm" name="tienhanhcomment"></div>
            </div>
        </div>
    </form>

    <!-- list comment -->
    <div class="list_review">
        <?php
        while ($comment = mysqli_fetch_array($ketqua1)) {
        ?>
            <div class="review">
                <div class="info">
                    <div class="avatas"><?php echo  substr(convert_name($comment['Last Name']), 0, 1) ?></div>
                    <div class="person">
                        <span class="name_person"><?php echo $comment['First Name'] . ' ' . $comment['Last Name'] ?> <span class="new_time"><?php echo $comment['Time'] ?></span></span>
                        <div class="star">
                            <?php
                            for ($i = 0; $i < $comment['Star']; $i++) {
                                echo '<i class="fa-regular fa-star"></i>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="content_review">
                    <span><?php echo $comment['Content'] ?></span>
                </div>
                <div class="interac">
                    <i class="fa-regular fa-thumbs-up"></i>
                    <i class="fa-regular fa-thumbs-down dislike"></i>
                    Phản hồi
                    <i class="fa-solid fa-reply"></i>
                </div>

                <form action="" method="POST" class="form_comment_reply">
                    <div class="avatas">
                        Đ
                    </div>
                    <div class="form_comment-input">
                        <input type="text" class="form_comment-input-text" name="content_val" placeholder="Nhập nhận xét của bạn..">
                        <input class="value" name="star" type="hidden" value="0">
                        <div class="form_comment-input-btn-reply">
                            <div class="star_comment">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <div><button>Cancel</button></div>
                            <div><input type="submit" value="Confirm" name="tienhanhcomment"></div>
                        </div>
                    </div>
                </form>

                <!-- Reply -->
                <?php $sql_reply = "SELECT * FROM `comment`  JOIN `account` WHERE `comment`.`Id User` = `account`.`id` 
                    and `comment`.`Id Product`=$id and `comment`.`Reply`=" . $comment['Id'];
                $ketquareply = $connect->query($sql_reply);
                while ($row_reply = mysqli_fetch_array($ketquareply)) {
                ?>
                    <div class="reply">
                        <div class="info">
                            <div class="avatas"><?php echo  substr(convert_name($row_reply['Last Name']), 0, 1) ?></div>
                            <div class="person">
                                <span class="name_person"><?php echo $row_reply['First Name'] . ' ' . $row_reply['Last Name'] ?> <span class="new_time"><?php echo $comment['Time'] ?></span></span>
                                <div class="star">
                                    <?php
                                    for ($i = 0; $i < $row_reply['Star']; $i++) {
                                        echo '<i class="fa-regular fa-star"></i>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="content_review">
                            <span><?php echo $row_reply['Content'] ?></span>
                        </div>
                    </div>
                <?php }
                ?>
            </div>
        <?php
        }
        ?>

    </div>

    <!-- footer section starts  -->

    <!-- Scripts -->
    <?php include('scripts.php') ?>
    <script src="./js/details.js"></script>

</body>

</html>