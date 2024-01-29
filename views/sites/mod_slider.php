<?php

use App\Models\Banner;

$list_banner = Banner::where([['position', '=', 'slideshow'], ['status', '=', '1']])
    ->get();
?>

<div class="banner">
    <div class="banner-slider">
        <?php foreach ($list_banner as $slider) : ?>
            <div class="banner-img">
                <img src="public/images/banner/<?= $slider->image; ?>" alt="">
            </div>
        <?php endforeach; ?>
    </div>
</div>