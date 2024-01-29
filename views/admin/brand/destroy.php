<?php

use App\Models\Brand;

$id = $_REQUEST["id"];
$brand = Brand::find($id);
if ($brand == null) {
    set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
    header("location:index.php?opt=brand&cat=trash");
}

$brand->delete();
set_flash("message", ["type" => "success", "msg" => "Xóa thành công"]);
header("location:index.php?opt=brand&cat=trash");
