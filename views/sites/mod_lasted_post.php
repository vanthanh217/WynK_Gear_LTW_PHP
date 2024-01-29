<?php

use App\Models\Post;

$list_lasted_post = Post::where([['status', '=', 1], ['type', '=', 'post']])
    ->orderBy('created_at', 'DESC')
    ->limit(6)->get();
?>

<ul class="lasted-posts__list">
    <?php foreach ($list_lasted_post as $item) : ?>
        <li class="lasted-posts__item">
            <span class="post-thumb">
                <a href="index.php?opt=post&slug=<?= $item->slug ?>" title="<?= $item->title ?>">
                    <img src="public/images/post/<?= $item->image ?>" alt="<?= $item->image ?>">
                </a>
            </span>
            <h4 class="post-title">
                <a href="index.php?opt=post&slug=<?= $item->slug ?>">
                    <?= word_limit($item->detail, 15) ?>
                </a>
            </h4>
        </li>
    <?php endforeach; ?>
</ul>