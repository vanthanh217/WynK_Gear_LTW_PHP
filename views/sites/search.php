<?php
if (isset($_REQUEST['SEND'])) {
    $value = $_REQUEST['value'];
}
?>

<div class="header-search">
    <form action="" method="post" class="search-input">
        <input type="text" name="value" placeholder="Bạn cần tìm gì?" autocomplete="off" class="text-search">
        <button type="reset" class="btn--reset">
            <i class='bx bxs-x-circle'></i>
        </button>
        <button type="submit" name="SEND" class="btn-search">
            <i class='bx bx-search'></i>
        </button>
    </form>
</div>