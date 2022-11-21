<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php') ?>
    <link rel="stylesheet" href="./css/category.css">
    <title>D A B O T I N G</title>
</head>



<body>

<header class="header">
    <?php include('header.php') ?>
</header>
    <div class="container">


        <!-- BODY -->

        <div class="body">

            <div class="fiter">
                <div class="fiter__head">
                    <a href="./index.html"><span>HOME</span></a>
                    <span>/</span>
                    <span style="color: black;">MEN</span>
                </div>
                <div class="fiter__body">
                    <span>FILTER BY PRICE</span>
                    <div class="fiter__body--btn">
                        <div><button class="active" price-btn="all"></button> <span>ALL</span></div>
                        <div><button price-btn="0"></button> <span>0-100$</span></div>
                        <div><button price-btn="1"></button> <span>100-105$</span></div>
                        <div><button price-btn="2"></button> <span>150-200$</span></div>
                    </div>
                </div>

            </div>

            <div class="table">
                <table CellSpacing="35px">
                    <tr class="price" price-btn="0">
                        <td>
                            <img class="table__img" src="./images/products/1.png" alt="">
                            <p>Promo Exclusion</p>
                            <p class="red">60$</p>
                            <button>Add Cart</button>
                        </td>
                        <td>
                            <img class="table__img" src="./images/products/2.png" alt="">
                            <p>New Air Max OG</p>
                            <p class="red">69$</p>
                            <button>Add Cart</button>
                        </td>
                        <td>
                            <img class="table__img" src="./images/products/3.png" alt="">
                            <p>Jordan LS</p>
                            <p class="red">80$</p>
                            <button>Add Cart</button>
                        </td>
                        <td>
                            <img class="table__img" src="./images/products/4.png" alt="">
                            <p>Nike Metcon 7 AMP</p>
                            <p class="red">95$</p>
                            <button>Add Cart</button>
                        </td>
                    </tr>
                    <tr class="price" price-btn="1">
                        <td>
                            <img class="table__img" src="./images/products/5.png" alt="">
                            <p>Nike Air Max Pre-Day</p>
                            <p class="red">111$</p>
                            <button>Add Cart</button>
                        </td>
                        <td>
                            <img class="table__img" src="./images/products/6.png" alt="">
                            <p>Nike SB Zoom</p>
                            <p class="red">123$</p>
                            <button>Add Cart</button>
                        </td>
                        <td>
                            <img class="table__img" src="./images/products/7.png" alt="">
                            <p>PG 6 EP</p>
                            <p class="red">135$</p>
                            <button>Add Cart</button>
                        </td>
                        <td>
                            <img class="table__img" src="./images/products/8.png" alt="">
                            <p>Nike ZoomX Streakfly</p>
                            <p class="red">149$</p>
                            <button>Add Cart</button>
                        </td>
                    </tr>
                    <tr class="price" price-btn="2">
                        <td>
                            <img class="table__img" src="./images/products/9.png" alt="">
                            <p>Nike Air Zoom Infinity</p>
                            <p class="red">150$</p>
                            <button>Add Cart</button>
                        </td>
                        <td>
                            <img class="table__img" src="./images/products/10.png" alt="">
                            <p>Kyrie Infinity</p>
                            <p class="red">169$</p>
                            <button>Add Cart</button>
                        </td>
                        <td>
                            <img class="table__img" src="./images/products/11.png" alt="">
                            <p>Nike ACG Lowcate</p>
                            <p class="red">180$</p>
                            <button>Add Cart</button>
                        </td>
                        <td>
                            <img class="table__img" src="./images/products/12.png" alt="">
                            <p>Jordan Max Aura 3</p>
                            <p class="red">199$</p>
                            <button>Add Cart</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- FOOTER -->
        <script src="./app/shop.js"></script>
        <script src="./app/main.js"></script>
</body>

</html>