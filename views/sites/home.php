<?php

use App\Models\Category;

$list_category = Category::where([['status', '=', 1], ['parent_id', '=', 0]])
    ->orderBy('sort_order', 'ASC')->get();
?>

<?php require_once 'views/sites/header.php' ?>
<main class="home-page__wrap">
    <div class="container">
        <?php require_once 'views/sites/mod_slider.php' ?>
        <section class="sale-product">
            <div class="sale-product__header">
                <h2 class="title">Sản phẩm mới</h2>
                <div class="countdown">
                    <div class="countdown__content">
                        <p class="display-number" id="days">365</p>
                        <p class="display-text">Days</p>
                    </div>
                    <div class="countdown__content">
                        <p class="display-number" id="hours">24</p>
                        <p class="display-text">Hours</p>
                    </div>
                    <div class="countdown__content">
                        <p class="display-number" id="mins">59</p>
                        <p class="display-text">Mins</p>
                    </div>
                    <div class="countdown__content">
                        <p class="display-number" id="secs">30</p>
                        <p class="display-text">Secs</p>
                    </div>
                </div>
            </div>
            <!-- <div class="sale-product__btn">
                <i class='bx bxs-chevron-left'></i>
                <i class='bx bxs-chevron-right'></i>
            </div> -->
            <?php require_once('views/sites/new_product_home.php') ?>
        </section>
        <section class="home-products">
            <?php foreach ($list_category as $row_cat) : ?>
                <?php require 'views/sites/product_category_home.php' ?>
            <?php endforeach; ?>
        </section>
        <?php require_once 'views/sites/mod_lastpost.php' ?>
    </div>
</main>
<?php require_once 'views/sites/footer.php' ?>
<script>
    $(document).ready(() => {
        $('.list-products').slick({
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            prevArrow: `<button type="button" class="slick-prev pull-left"><i class="bx bxs-chevron-left"></i></button>`,
            nextArrow: `<button type="button" class="slick-next pull-right"><i class="bx bxs-chevron-right"></i></button>`,
            responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        })
    })
    const addCart = (id) => {
        const qty = 1
        $.ajax({
            url: 'index.php?opt=cart&addcart=true',
            type: 'GET',
            data: {
                id: id,
                qty: qty
            },
            success: (result) => {
                $('#cart-qty').html(result)
            }
        })
    }
</script>