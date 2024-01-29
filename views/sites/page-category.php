<?php

use App\Models\Post;

$slug = $_REQUEST['cat'];
$page = Post::where([['slug', '=', $slug], ['type', '=', 'page'], ['status', '=', 1]])
    ->first();
$list_policy = Post::where([['type', '=', 'page'], ['status', '=', 1], ['title', 'like', 'Chính sách%']])->get();

$title = $page->title;
?>

<?php require_once 'views/sites/header.php' ?>

<main class="post-page">
    <div class="container">
        <section class="breadcrumbs-wrap">
            <ul class="breadcrumbs-list">
                <li>
                    <a href="index.php">Trang chủ</a>
                    <span>&nbsp;/&nbsp;</span>
                </li>
                <li>
                    <a href="#">
                        <?= $page->title ?>
                    </a>
                </li>
            </ul>
        </section>
        <section class="post-page__wrap">
            <div class="row">
                <div class="col-3">
                    <div class="order-sidebar">
                        <ul class="order-sidebar__list">
                            <h3 class="order-sidebar__title">
                                Danh mục trang
                            </h3>
                            <?php foreach ($list_policy as $item) : ?>
                                <li class="order-sidebar__item">
                                    <a href="index.php?opt=page&cat=<?= $item->slug ?>">
                                        <?= $item->title ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-9">
                    <div class="order-detail">
                        <h3 class="order-detail__title">
                            <?= $page->title; ?>
                        </h3>
                        <p class="order-detail__desc">
                            <?= $page->detail; ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<?php require_once 'views/sites/footer.php' ?>