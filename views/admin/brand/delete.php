<?php

use App\Models\Brand;

$id = $_REQUEST["id"];
$brand = Brand::where('id', '=', $id)->first();
if ($brand == null) {
    set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
    header("location:index.php?opt=brand");
}

$brand->status = 0;
$brand->updated_at = date('Y-m-d H:i:s');
$brand->updated_by = $_SESSION["user_id"] ?? 1;
if (file_exists("../public/images/brand/" . $brand->image)) {
    unlink("../public/images/brand/" . $brand->image);
}

$brand->save();
set_flash("message", ["type" => "success", "msg" => "Xóa vào thùng rác thành công"]);
header("location:index.php?opt=brand");
