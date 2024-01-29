<?php

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

$slug = $_REQUEST['slug'];
$pro = Product::where([['status', '=', 1], ['slug', '=', $slug]])
    ->first();
$title = $pro->name;
$cat_id = $pro->category_id;
$list_catid = [];
array_push($list_catid, $cat_id);
$list_category1 = Category::where([['status', '=', 1], ['parent_id', '=', $cat_id]])
    ->get();
if (count($list_category1) > 0) {
    foreach ($list_category1 as $row_cat1) {
        array_push($list_catid, $row_cat1->id);
        $list_category2 = Category::where([
            ['status', '=', 1],
            ['parent_id', '=', $row_cat1->id]
        ])->get();
        if (count($list_category2) > 0) {
            foreach ($list_category2 as $row_cat2) {
                array_push($list_catid, $row_cat2->id);
            }
        }
    }
}

$list_other = Product::where([['status', '=', 1], ['id', '!=', $pro->id]])
    ->whereIn('category_id', $list_catid)
    ->orderBy('created_at', 'DESC')
    ->limit(4)->get();

$title = $pro->name;
?>

<?php require_once 'views/sites/header.php' ?>

<main class="product_detail-page">
    <div class="container">
        <section class="breadcrumbs-wrap">
            <ul class="breadcrumbs-list">
                <li>
                    <a href="index.php">Trang chủ</a>
                    <span>&nbsp;/&nbsp;</span>
                </li>
                <li>
                    <a href="#">
                        <?= $pro->name; ?>
                    </a>
                </li>
            </ul>
        </section>
        <section class="product-detail__wrap">
            <div class="pd-box">
                <div class="pd-box-left">
                    <div class="main-image">
                        <span class="image-wrap">
                            <img src="public/images/product/<?= $pro->image; ?>" alt="<?= $pro->image; ?>">
                        </span>
                    </div>
                    <div class="image-gallery">
                        <div class="gallery-wrapper">
                            <div class="image-gallery-item active">
                                <span class="image-wrap">
                                    <img src="public/images/product/<?= $pro->image; ?>" alt="<?= $pro->image; ?>" onclick="changeImage(src)">
                                </span>
                            </div>
                            <div class="image-gallery-item">
                                <span class="image-wrap">
                                    <img src="public/images/product/<?= $pro->image; ?>" alt="<?= $pro->image; ?>" onclick="changeImage(src)">
                                </span>
                            </div>
                            <div class="image-gallery-item">
                                <span class="image-wrap">
                                    <img src="public/images/product/<?= $pro->image; ?>" alt="<?= $pro->image; ?>" onclick="changeImage(src)">
                                </span>
                            </div>
                            <div class="image-gallery-item">
                                <span class="image-wrap">
                                    <img src="public/images/product/<?= $pro->image; ?>" alt="<?= $pro->image; ?>" onclick="changeImage(src)">
                                </span>
                            </div>
                            <div class="image-gallery-item">
                                <span class="image-wrap">
                                    <img src="public/images/product/<?= $pro->image; ?>" alt="<?= $pro->image; ?>" onclick="changeImage(src)">
                                </span>
                            </div>
                            <div class="image-gallery-item">
                                <span class="image-wrap">
                                    <img src="public/images/product/<?= $pro->image; ?>" alt="<?= $pro->image; ?>" onclick="changeImage(src)">
                                </span>
                            </div>
                            <div class="image-gallery-item">
                                <span class="image-wrap">
                                    <img src="public/images/product/<?= $pro->image; ?>" alt="<?= $pro->image; ?>" onclick="changeImage(src)">
                                </span>
                            </div>
                            <div class="image-gallery-item">
                                <span class="image-wrap">
                                    <img src="public/images/product/<?= $pro->image; ?>" alt="<?= $pro->image; ?>" onclick="changeImage(src)">
                                </span>
                            </div>
                        </div>
                    </div>
                    <script>
                        changeImage = (src) => {
                            document.querySelector('.main-image img').src = src;
                        }
                    </script>
                </div>
                <div class="pd-box-right">
                    <div class="info-wrapper">
                        <div class="info-top">
                            <h3 class="product-name">
                                <?= $pro->name; ?>
                            </h3>
                            <div class="product-sku">
                                <span class="brand">
                                    Thương hiệu:
                                    <a href="">
                                        <?php
                                        $brand = Brand::find($pro->brand_id);
                                        echo $brand->name;
                                        ?>
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="info-bottom">
                            <div class="product-price">
                                <?php if ($pro->pricesale < $pro->price) : ?>
                                    <span class="price">
                                        <?= number_format($pro->pricesale) . 'đ' ?>
                                    </span>
                                    <del>
                                        <?= number_format($pro->price) . 'đ' ?>
                                    </del>
                                <?php else : ?>
                                    <span class="price">
                                        <?= number_format($pro->price) . 'đ' ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="amount">
                                <button class="btn-qty" id="sub">
                                    -
                                </button>
                                <input type="text" value="1" name="qty" id="qty" class="qty-value">
                                <button class="btn-qty" id="add">
                                    +
                                </button>
                            </div>
                            <div class="product-action">
                                <a href="" class="action-buy btn--secondary">
                                    Mua
                                </a>
                                <button class="action-add-cart-page btn--outline" onclick="addCart(<?= $pro->id; ?>)">
                                    Thêm vào giỏ
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pd-desc">
                <h3 class="pd-desc__title">
                    Mô tả sản phẩm
                </h3>
                <div class="pd-desc__text">
                    <p>
                        <?= $pro->detail; ?>
                    </p>
                </div>
            </div>
            <?php if (count($list_other) > 0) : ?>
                <div class="product-related">
                    <div class="product-related__top">
                        <h2 class="pr-title">
                            <a href="#">Sản phẩm tương tự</a>
                        </h2>
                    </div>
                    <div class="product-related__bottom">
                        <div class="pr-slider">
                            <div class="row">
                                <?php foreach ($list_other as $product) : ?>
                                    <div class="col-3">
                                        <?php require('views/sites/product_item.php') ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </section>
    </div>
</main>

<?php require_once 'views/sites/footer.php' ?>

<script>
    const addCart = (id) => {
        const qty = $('#qty').val()
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