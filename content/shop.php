<h1 class="heading">featured products</h1>

<div class="swiper product-slider">

    <div class="swiper-wrapper">

    <?php
        $conn = mysqli_connect("localhost:3307", "root", "", "dahatravel");
        $sql = "select * from `products`";
        $kq = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($kq)) {
            ?>
            <div class="swiper-slide slide">
                <div class="image">
                    <img src=" <?php echo $row["Image"] ?> " alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-shopping-cart"></a>
                        <a href=" <?php echo "detailproduct.php?id=" . $row['Id']?>" class="fas fa-eye"></a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3> <?php echo $row["Name Product"] ?></h3>
                    <div class="price"> $5.00 - $25.00 </div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>
        <?php
        } ?>

    ?>  

    </div>

    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>

</div>