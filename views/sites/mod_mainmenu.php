<?php

use App\Models\Menu;

$list_menu_mainmenu = Menu::where([['parent_id', '=', 0], ['status', '=', '1'], ['position', '=', 'mainmenu']])
    ->whereIn('type', ['custom', 'page', 'post'])
    ->orderBy('sort_order', 'ASC')->get();
?>

<div class="header-menu">
    <div class="menu-left">
        <p class="title">
            <i class='bx bx-menu-alt-left'></i>
            Danh mục
        </p>
        <?php require_once 'views/sites/mod_mainmenu_category.php' ?>
    </div>
    <ul class="menu-right">
        <?php foreach ($list_menu_mainmenu as $item_menu_main_menu) : ?>
            <li class="menu-item">
                <a href="<?= $item_menu_main_menu->link ?>">
                    <?= $item_menu_main_menu->name ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>