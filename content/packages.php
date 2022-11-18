<?php 
    include('connect.php');
    $sql = "Select * from `tour` join `image tour` where `tour`.`Id` = `image tour`.`Id Tour`";
    $kq = $connect->query($sql);
    $result = mysqli_fetch_array($kq);
?>


<h1 class="heading">popular packages</h1>

<div class="box-container">

    <div class="box">
        <div class="image">
            <img src="<?php echo "." . $result['Image']?>" alt="">
        </div>
        <div class="content">
            <h3><?php echo $result['Name Tour'] ?></h3>
            <p><?php echo $result['Short Description']?></p>
            <div class="price"><?php echo $result['Time']?></div>
            <a href="#" class="btn">explore now</a>
        </div>
    </div>

    <div class="box">
        <div class="image">
            <img src="images/img-2.jpg" alt="">
        </div>
        <div class="content">
            <h3>featured tour package</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam, eos.</p>
            <div class="price">$250 - $450</div>
            <a href="#" class="btn">explore now</a>
        </div>
    </div>

    <div class="box">
        <div class="image">
            <img src="images/img-3.jpg" alt="">
        </div>
        <div class="content">
            <h3>featured tour package</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam, eos.</p>
            <div class="price">$250 - $450</div>
            <a href="#" class="btn">explore now</a>
        </div>
    </div>

    <div class="box">
        <div class="image">
            <img src="images/img-4.jpg" alt="">
        </div>
        <div class="content">
            <h3>featured tour package</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam, eos.</p>
            <div class="price">$250 - $450</div>
            <a href="#" class="btn">explore now</a>
        </div>
    </div>

    <div class="box">
        <div class="image">
            <img src="images/img-5.jpg" alt="">
        </div>
        <div class="content">
            <h3>featured tour package</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam, eos.</p>
            <div class="price">$250 - $450</div>
            <a href="#" class="btn">explore now</a>
        </div>
    </div>

    <div class="box">
        <div class="image">
            <img src="images/img-6.jpg" alt="">
        </div>
        <div class="content">
            <h3>featured tour package</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam, eos.</p>
            <div class="price">$250 - $450</div>
            <a href="#" class="btn">explore now</a>
        </div>
    </div>

</div>