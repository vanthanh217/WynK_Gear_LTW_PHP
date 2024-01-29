<?php

use App\Models\Topic;

$list_topic = Topic::where('status', '=', 1)
    ->orderBy('sort_order', 'ASC')->get();
?>

<ul class="collection-list">
    <li class="item topic-list">
        Chủ đề
        <i class='bx bx-chevron-down dropdown'></i>
        <ul class="sub-list topic-sub">
            <?php foreach ($list_topic as $item) : ?>
                <li class="sub-item">
                    <a href="index.php?opt=post&cat=<?= $item->slug ?>">
                        <?= $item->name ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </li>
</ul>