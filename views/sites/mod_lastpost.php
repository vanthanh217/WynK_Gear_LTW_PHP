<?php

use App\Models\Post;
use App\Models\Topic;

$main_lastpost = Post::where([
    ['status', '=', 1],
    ['type', '=', 'post']
])->first();
$list_laspost = Post::where([
    ['status', '=', 1],
    ['type', '=', 'post'],
    ['id', '!=', $main_lastpost->id]
])->get();
$topic = Topic::where('status', '=', 1)->first();
?>

<section class="footer-news">
    <div class="wrapper">
        <h1 class="article-title">
            <a href="index.php?opt=post">
                Tin công nghệ
            </a>
        </h1>
        <div class="article-box">
            <div class="article-left">
                <div class="article-item">
                    <a href="index.php?opt=post&slug=<?= $main_lastpost->slug ?>" class="article-item__image">
                        <img src="public/images/post/<?= $main_lastpost->image ?>" alt="<?= $main_lastpost->image ?>">
                    </a>
                    <div class="article-item__content">
                        <a href="index.php?opt=post&slug=<?= $main_lastpost->slug ?>" class="article-item__title">
                            <?= $main_lastpost->title ?>
                        </a>
                        <p class="article-item__desc">
                            <?= word_limit($main_lastpost->detail, 15) ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="article-right">
                <?php foreach ($list_laspost as $item_lastpost) : ?>
                    <div class="article-item">
                        <a href="index.php?opt=post&slug=<?= $item_lastpost->slug ?>" class="article-item__image">
                            <img src="public/images/post/<?= $item_lastpost->image ?>" alt="<?= $item_lastpost->image ?>">
                        </a>
                        <div class="article-item__content">
                            <a href="index.php?opt=post&slug=<?= $item_lastpost->slug ?>" class="article-item__title">
                                <?= $item_lastpost->title ?>
                            </a>
                            <p class="article-item__desc">
                                <?= word_limit($item_lastpost->detail, 30) ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>