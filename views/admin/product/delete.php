<?php

use App\Models\Product;

$id = $_REQUEST["id"];
$product = Product::where('id', '=', $id)->first();
if ($product == null) {
    set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
    header("location:index.php?opt=product");
}

$product->status = 0;
$product->updated_at = date('Y-m-d H:i:s');
$product->updated_by = $_SESSION["user_id"] ?? 1;
if (file_exists("../public/images/product/" . $product->image)) {
    unlink("../public/images/product/" . $product->image);
}

$product->save();
set_flash("message", ["type" => "success", "msg" => "Xóa vào thùng rác thành công"]);
header("location:index.php?opt=product");
