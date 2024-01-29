<?php

use App\Models\Post;
use App\Models\Topic;

$slug = $_REQUEST['cat'];
$topic = Topic::where([['status', '=', 1], ['slug', '=', $slug]])->first();

$total = Post::where([['status', '=', 1], ['type', '=', 'post'], ['topic_id', '=', $topic->id]])
    ->count();
$limit = 3;
$current = Pagination::pageCurrent();
$offset = Pagination::pageOffset($current, $limit);

$list_post_topic = Post::where([['status', '=', 1], ['type', '=', 'post'], ['topic_id', '=', $topic->id]])
    ->orderBy('created_at', 'DESC')
    ->skip($offset)
    ->limit($limit)
    ->get();

$title = $topic->name;
?>

<?php require_once 'views/sites/header.php' ?>

<main class="post_topic-page">
    <div class="container">
        <section class="breadcrumbs-wrap">
            <ul class="breadcrumbs-list">
                <li>
                    <a href="index.php">Trang chủ</a>
                    <span>&nbsp;/&nbsp;</span>
                </li>
                <li>
                    <a href="#">
                        <?= $topic->name ?>
                    </a>
                </li>
            </ul>
        </section>

        <section class="post-topic__wrap">
            <div class="row">
                <div class="col-3">
                    <div class="post-topic">
                        <?php require_once('views/sites/mod_list_topic.php') ?>
                        <style>
                            .post-topic {
                                background-color: var(--card-bg);
                                box-shadow: var(--shadow);
                                border-radius: 10px;
                                margin-bottom: 12px;
                            }

                            .post-topic .collection-list {
                                padding: 16px;
                            }

                            .topic-list {
                                font-size: 1.8rem;
                                line-height: 120%;
                                font-weight: 500;
                                position: relative;
                                cursor: pointer;
                                transition: all 0.4s ease;
                            }

                            .topic-list .bx {
                                position: absolute;
                                right: 0;
                                transition: all 0.5s;
                            }

                            .topic-list .sub-list {
                                display: none;
                                margin-top: 10px;
                                padding: 0 24px;
                            }

                            .topic-list .sub-list a {
                                display: block;
                                padding: 4px 8px;
                                color: var(--text-color);
                                font-size: 1.6rem;
                                font-weight: 400;
                            }

                            .topic-list .sub-list a:hover {
                                color: var(--primary-color);
                            }
                        </style>
                    </div>
                    <div class="lasted-posts">
                        <h3 class="lasted-posts__title">
                            Bài viết mới nhất
                        </h3>
                        <?php require_once('views/sites/mod_lasted_post.php') ?>
                    </div>
                </div>
                <div class="col-9">
                    <div class="blog-posts">
                        <div class="list-article-content">
                            <?php foreach ($list_post_topic as $item) : ?>
                                <div class="post-item row">
                                    <div class="post-featured col-3">
                                        <a href="index.php?opt=post&slug=<?= $item->slug ?>" title="<?= $item->title ?>">
                                            <img src="public/images/post/<?= $item->image ?>" alt="<?= $item->image ?>">
                                        </a>
                                    </div>
                                    <div class="post-content col-9">
                                        <h3 class="post-title">
                                            <a href="index.php?opt=post&slug=<?= $item->slug ?>">
                                                <?= $item->title ?>
                                            </a>
                                        </h3>
                                        <div class="post-info">
                                            <span class="post-info__date">
                                                <i class='bx bx-time'></i>
                                                <?php
                                                $date = $item->created_at;
                                                echo date_format($date, "d/m/Y");
                                                ?>
                                            </span>
                                        </div>
                                        <div class="post-desc">
                                            <p>
                                                <?= word_limit($item->detail, 50) ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="pagination">
                            <?= Pagination::pageLinks($total, $current, $limit, 'index.php?opt=post&cat=' . $slug) ?>
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
        $("main.post_topic-page .topic-list").click(() => {
            $(".topic-sub").slideToggle();
            $(".topic-list .dropdown").toggleClass("rotate");
        });
    });
</script>