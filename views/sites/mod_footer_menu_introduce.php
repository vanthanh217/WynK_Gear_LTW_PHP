<?php

use App\Models\Menu;

$args = [
    ['parent_id', '=', 0],
    ['status', '=', 1],
    ['position', '=', 'footermenu'],
    ['name', 'not like', 'Chính sách%']
];
$list_introduce = Menu::where($args)
    ->get();
?>

<ul class="list-introduce">
    <?php foreach ($list_introduce as $item) : ?>
        <li>
            <a href="<?= $item->link ?>">
                <?= $item->name ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>