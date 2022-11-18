<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php') ?>
</head>

<body>

    <!-- header section starts  -->
    <?php include('./content/session.php')?>
    <header class="header">
        <?php include('header.php') ?>
    </header>


    <!-- search form  -->

    <div class="search-form">
        <?php include('content/search_form.php') ?>
    </div>

    <!-- home section starts  -->

    <section class="home" id="home">
        <?php include('content/home.php') ?>
    </section>

    <!-- category section starts  -->

    <section class="category">
        <?php include('content/category.php') ?>
    </section>

    <!-- about section starts  -->

    <section class="about" id="about">
        <?php include('content/about.php') ?>
    </section>

    <!-- shop section starts  -->

    <section class="shop" id="shop">
        <?php include('content/shop.php') ?>
    </section>

    <!-- packages section starts  -->

    <section class="packages" id="packages">
        <?php include('content/packages.php') ?>
    </section>

    <!-- reviews section starts  -->

    <section class="reviews" id="reviews">
        <?php include('content/reviews.php') ?>
    </section>

    <!-- services section starts  -->

    <section class="services">
        <?php include('content/services.php') ?>
    </section>

    <!-- blogs section starts  -->

    <section class="blogs" id="blogs">
        <?php include('content/blogs.php') ?>
    </section>

    <!-- newsletter section  -->

    <?php include('content/newsletter.php') ?>

    <!-- footer section starts  -->

    <!-- <section class="footer">
        
    </section> -->

    <!-- Scripts -->
    <?php include('scripts.php') ?>

</body>

</html>