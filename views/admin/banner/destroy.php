<?php

use App\Models\Banner;

$id = $_REQUEST["id"];
$banner = Banner::find($id);
if ($banner == null) {
    set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
    header("location:index.php?opt=banner&cat=trash");
}

$banner->delete();
set_flash("message", ["type" => "success", "msg" => "Xóa thành công"]);
header("location:index.php?opt=banner&cat=trash");
