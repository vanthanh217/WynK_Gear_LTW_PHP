<?php

use App\Models\Product;

// Thêm
if (isset($_REQUEST['THEM'])) {
    $product = new Product();
    $product->category_id = $_REQUEST["category_id"];
    $product->brand_id = $_REQUEST["brand_id"];
    $product->name = $_REQUEST["name"];
    $product->slug = str_slug($_REQUEST["name"]);
    $product->price = $_REQUEST["price"];
    $product->pricesale = $_REQUEST["pricesale"];

    //Upload File
    if (strlen($_FILES["image"]["name"]) > 0) {
        $target_dir = "../public/images/product/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extention = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extention, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $filename = date('YmdHis') . "." . $extention;
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $filename);
            $product->image = $filename;
        }
    }
    //End Upload File

    $product->qty = $_REQUEST["qty"];
    $product->detail = $_REQUEST["detail"];
    $product->description = $_REQUEST["description"];
    $product->created_at = date('Y-m-d H:i:s');
    $product->created_by = $_SESSION["user_id"] ?? 1;
    $product->status = $_REQUEST["status"];

    $product->save();
    set_flash("message", ["type" => "success", "msg" => "Thêm thành công"]);
    header("location:index.php?opt=product");
}

// Cập nhật
if (isset($_REQUEST['CAPNHAT'])) {
    $id = $_REQUEST["id"];
    $product = product::find($id);
    $product->category_id = $_REQUEST["category_id"];
    $product->brand_id = $_REQUEST["brand_id"];
    $product->name = $_REQUEST["name"];
    $product->slug = str_slug($_REQUEST["name"]);
    $product->price = $_REQUEST["price"];
    $product->pricesale = $_REQUEST["pricesale"];

    //Upload File
    if (strlen($_FILES["image"]["name"]) > 0) {
        $target_dir = "../public/images/product/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extention = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extention, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            //Xóa hình cũ
            if (file_exists("../public/images/product/" . $product->image)) {
                unlink("../public/images/product/" . $product->image);
            }
            $filename = date('YmdHis') . "." . $extention;
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $filename);
            $product->image = $filename;
        }
    }
    //End Upload File

    $product->qty = $_REQUEST["qty"];
    $product->detail = $_REQUEST["detail"];
    $product->description = $_REQUEST["description"];
    $product->updated_at = date('Y-m-d H:i:s');
    $product->updated_by = $_SESSION["user_id"] ?? 1;
    $product->status = $_REQUEST["status"];

    $product->save();
    set_flash("message", ["type" => "success", "msg" => "Cập nhật thành công"]);
    header("location:index.php?opt=product");
}
