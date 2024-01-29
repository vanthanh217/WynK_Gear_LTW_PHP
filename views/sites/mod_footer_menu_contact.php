<?php

use App\Models\User;

$admin = User::where([['status', '=', 1], ['roles', '=', '0']])->first();
?>

<ul class="contact-info">
    <li>
        <i class='bx bxl-gmail'></i>
        <a href="index.php?opt=contact">
            <?= $admin->email ?>
        </a>
    </li>
    <li>
        <i class='bx bxs-phone'></i>
        <a href="index.php?opt=contact">
            <?= $admin->phone ?>
        </a>
    </li>
</ul>