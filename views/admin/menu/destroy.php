<?php

use App\Models\Menu;

$id = $_REQUEST["id"];
$menu = Menu::find($id);
if ($menu == null) {
    set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
    header("location:index.php?opt=menu&cat=trash");
}

$menu->delete();
set_flash("message", ["type" => "success", "msg" => "Xóa thành công"]);
header("location:index.php?opt=menu&cat=trash");
