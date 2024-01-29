<?php

use App\Models\Post;
use App\Models\Topic;

$slug = $_REQUEST['slug'];
$post = Post::where([['status', '=', 1], ['slug', '=', $slug], ['type', '=', 'post']])->first();
$list_other = Post::where([
    ['status', '=', 1],
    ['type', '=', 'post'],
    ['topic_id', '=', $post->topic_id],
    ['id', '!=', $post->id]
])->limit(6)->get();

$title = $post->title;
?>

<?php require_once 'views/sites/header.php' ?>

<main class="post_detail-page">
    <div class="container">
        <section class="breadcrumbs-wrap">
            <ul class="breadcrumbs-list">
                <li>
                    <a href="index.php">Trang chủ</a>
                    <span>&nbsp;/&nbsp;</span>
                </li>
                <li>
                    <a href="#">
                        <?= $post->title ?>
                    </a>
                </li>
            </ul>
        </section>
        <section class="post-detail__wrap">
            <div class="post-detail__info">
                <h1 class="post-detail__title">
                    <?= $post->title ?>
                </h1>
                <div class="post-detail__content">
                    <p>
                        <?= $post->detail ?>
                    </p>
                    <p>
                        <img src="public/images/post/<?= $post->image ?>" alt="<?= $post->image ?>" class="post-detail__thumb">
                    </p>
                </div>
            </div>
            <div class="related-articles">
                <h3 class="ra-heading">
                    Bài viết liên quan
                </h3>
                <div class="ra-list">
                    <div class="row">
                        <?php foreach ($list_other as $item) : ?>
                            <div class="col-4">
                                <article class="post-item">
                                    <figure class="post-gallery">
                                        <a href="index.php?opt=post&slug=<?= $item->slug ?>" title="<?= $item->title ?>">
                                            <img src="public/images/post/<?= $item->image ?>" alt="<?= $item->image ?>">
                                        </a>
                                    </figure>
                                    <div class="post-content">
                                        <h3 class="post-title">
                                            <a href="index.php?opt=post&slug=<?= $item->slug ?>">
                                                <?= $item->title ?>
                                            </a>
                                        </h3>
                                    </div>
                                </article>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<?php require_once 'views/sites/footer.php' ?>