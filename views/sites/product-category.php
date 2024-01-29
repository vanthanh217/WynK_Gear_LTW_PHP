<?php

use App\Models\Category;
use App\Models\Product;

$slug = $_REQUEST['cat'];
$row_cat = Category::where([['status', '=', 1], ['slug', '=', $slug]])->first();
$temp = $row_cat;

$list_catid = [];
array_push($list_catid, $row_cat->id);
$list_category1 = Category::where([['status', '=', 1], ['parent_id', '=', $row_cat->id]])
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

$total = Product::where('status', '=', 1)
    ->whereIn('category_id', $list_catid)
    ->count();
$limit = 12;
$current = Pagination::pageCurrent();
$offset = Pagination::pageOffset($current, $limit);
$option_value = 'created_at';
$option_type = 'DESC';
$option_text = 'Mới nhất';

if (isset($_REQUEST['sort'])) {
    if ($_REQUEST['sort'] == 'newest') {
        $option_value = 'created_at';
        $option_type = 'DESC';
    } elseif ($_REQUEST['sort'] == 'a-z') {
        $option_value = 'name';
        $option_type = 'ASC';
        $option_text = 'Tên từ A-Z';
    } elseif ($_REQUEST['sort'] == 'z-a') {
        $option_value = 'name';
        $option_type = 'DESC';
        $option_text = 'Tên từ Z-A';
    } elseif ($_REQUEST['sort'] == 'price-asc') {
        $option_value = 'pricesale';
        $option_type = 'ASC';
        $option_text = 'Giá tăng dần';
    } elseif ($_REQUEST['sort'] == 'price-desc') {
        $option_value = 'pricesale';
        $option_type = 'DESC';
        $option_text = 'Giá giảm dần';
    }
}

$list_product = Product::where('status', '=', 1)
    ->whereIn('category_id', $list_catid)
    ->orderBy($option_value, $option_type)
    ->skip($offset)
    ->limit($limit)
    ->get();

$title = $temp->name;
?>

<?php require_once 'views/sites/header.php' ?>

<main class="product-category">
    <div class="container">
        <section class="breadcrumbs-wrap">
            <ul class="breadcrumbs-list">
                <li>
                    <a href="index.php">Trang chủ</a>
                    <span>&nbsp;/&nbsp;</span>
                </li>
                <li>
                    <a href="#">
                        <?= $temp->name ?>
                    </a>
                </li>
            </ul>
        </section>

        <section class="row">
            <aside class="product-category__sidebar col-3">
                <div class="sidebar-wrap">
                    <h2 class="sidebar-title">
                        Danh mục
                    </h2>
                    <?php require_once('views/sites/mod_list_category.php') ?>
                    <?php require_once('views/sites/mod_list_brand.php') ?>
                </div>
                <?php require_once('views/sites/mod_list_product_new.php') ?>
            </aside>

            <div class="col-9">
                <div class="collection">
                    <div class="collection-sort">
                        <div class="collection-sort__wrap">
                            <div class="list-box">
                                <i class='bx bx-sort-down'></i>
                                <p class="list-box__text">
                                    Xếp theo:
                                    <span class="list-box__value">
                                        <?= $option_text ?>
                                    </span>
                                </p>
                                <i class="bx bx-chevron-down"></i>
                            </div>
                            <ul class="list-box__list">
                                <li class="list-box__item active">
                                    <a href="index.php?opt=product&cat=<?= $slug ?>&sort=newest">Mới nhất</a>
                                </li>
                                <li class="list-box__item">
                                    <a href="index.php?opt=product&cat=<?= $slug ?>&sort=a-z">Tên từ A-Z</a>
                                </li>
                                <li class="list-box__item">
                                    <a href="index.php?opt=product&cat=<?= $slug ?>&sort=z-a">Tên từ Z-A</a>
                                </li>
                                <li class="list-box__item">
                                    <a href="index.php?opt=product&cat=<?= $slug ?>&sort=price-asc">Giá tăng dần</a>
                                </li>
                                <li class="list-box__item">
                                    <a href="index.php?opt=product&cat=<?= $slug ?>&sort=price-desc">Giá giảm dần</a>
                                </li>
                            </ul>
                        </div>
                        <!-- <select name="order_by" id="order_by">
                            <option value="default">Mặc định</option>
                            <option value="desc_price">Theo giá: Giảm dần</option>
                            <option value="asc_price">Theo giá: Tăng dần</option>
                            <option value="new_product">Sản phẩm mới nhất</option>
                        </select> -->
                        <?php

                        ?>
                        <style>
                            #order_by {
                                padding: 8px;
                                width: 200px;
                                color: var(--text-color);
                                background-color: var(--card-bg);
                                box-shadow: var(--shadow);
                                border-radius: 8px;
                            }
                        </style>
                    </div>
                    <div class="collection-product">
                        <div class="row">
                            <?php foreach ($list_product as $product) : ?>
                                <div class="col-3">
                                    <?php require('views/sites/product_item.php') ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="pagination">
                            <?php
                            $url = (isset($_REQUEST['sort'])) ? 'index.php?opt=product&cat=' . $slug .
                                '&sort=' . $_REQUEST['sort'] : 'index.php?opt=product&cat=' . $slug;
                            ?>
                            <?= Pagination::pageLinks($total, $current, $limit, $url) ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<?php require_once 'views/sites/footer.php' ?>
<script>
    $(document).ready(() => {
        $('.list-box').click(() => {
            $('ul.list-box__list').toggle();
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