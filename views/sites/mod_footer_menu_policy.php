<?php

use App\Models\Menu;

$args = [
    ['parent_id', '=', 0],
    ['status', '=', 1],
    ['position', '=', 'footermenu'],
    ['name', 'like', 'Chính sách%']
];
$list_policy = Menu::where($args)
    ->get();
?>

<ul class="list-policy">
    <?php foreach ($list_policy as $item) : ?>
        <li>
            <a href="<?= $item->link ?>">
                <?= $item->name ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>