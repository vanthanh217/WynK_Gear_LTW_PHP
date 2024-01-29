<?php

use App\Models\Banner;

// Thêm
if (isset($_REQUEST['THEM'])) {
    $banner = new Banner();
    $banner->name = $_REQUEST["name"];
    $banner->link = $_REQUEST["link"];
    $banner->position = $_REQUEST["position"];
    $banner->sort_order = $_REQUEST["sort_order"];

    //Upload File
    if (strlen($_FILES["image"]["name"]) > 0) {
        $target_dir = "../public/images/banner/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extention = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extention, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $filename = date('YmdHis') . "." . $extention;
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $filename);
            $banner->image = $filename;
        }
    }
    //End Upload File

    $banner->created_at = date('Y-m-d H:i:s');
    $banner->created_by = $_SESSION["user_id"] ?? 1;
    $banner->status = $_REQUEST["status"];

    $banner->save();
    set_flash("message", ["type" => "success", "msg" => "Thêm thành công"]);
    header("location:index.php?opt=banner");
}

// Cập nhật
if (isset($_REQUEST['CAPNHAT'])) {
    $id = $_REQUEST["id"];
    $banner = Banner::find($id);
    $banner->name = $_REQUEST["name"];
    $banner->link = $_REQUEST["link"];
    $banner->position = $_REQUEST["position"];
    $banner->sort_order = $_REQUEST["sort_order"];

    //Upload File
    if (strlen($_FILES["image"]["name"]) > 0) {
        $target_dir = "../public/images/banner/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extention = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extention, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            //Xóa hình cũ
            if (file_exists("../public/images/banner/" . $banner->image)) {
                unlink("../public/images/banner/" . $banner->image);
            }
            $filename = date('YmdHis') . "." . $extention;
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $filename);
            $banner->image = $filename;
        }
    }
    //End Upload File

    $banner->updated_at = date('Y-m-d H:i:s');
    $banner->updated_by = $_SESSION["user_id"] ?? 1;
    $banner->status = $_REQUEST["status"];

    $banner->save();
    set_flash("message", ["type" => "success", "msg" => "Cập nhật thành công"]);
    header("location:index.php?opt=banner");
}
