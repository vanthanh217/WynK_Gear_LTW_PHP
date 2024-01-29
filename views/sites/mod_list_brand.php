<?php

use App\Models\Brand;

$list_brand = Brand::where('status', '=', 1)
    ->orderBy('sort_order', 'ASC')->get();
?>

<ul class="collection-list">
    <li class="item brand-list">
        Thương hiệu
        <i class='bx bx-chevron-down dropdown'></i>
        <ul class="sub-list brand-sub">
            <?php foreach ($list_brand as $item) : ?>
                <li class="sub-item">
                    <a href="index.php?opt=brand&cat=<?= $item->slug ?>">
                        <?= $item->name ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </li>
</ul>