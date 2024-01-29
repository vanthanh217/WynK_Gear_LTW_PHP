<?php

use App\Models\Category;

$list_category = Category::where([['parent_id', '=', 0], ['status', '=', 1]])
    ->orderBy('sort_order', 'ASC')->get();
?>

<ul class="menu-list">
    <?php foreach ($list_category as $row_cat) : ?>
        <li class="menu-list__item">
            <a href="index.php?opt=product&cat=<?= $row_cat->slug ?>" class="menu-list__link">
                <?= $row_cat->name ?>
            </a>
            <?php require 'views/sites/mod_mainmenu_category_item.php' ?>
        </li>
    <?php endforeach; ?>
</ul>