<?php

use App\Models\User;

// Thêm
if (isset($_REQUEST['THEM'])) {
    $customer = new User();
    $customer->name = $_REQUEST["name"];
    $customer->username = $_REQUEST["username"];
    $customer->password = sha1($_REQUEST["password"]);
    $customer->email = $_REQUEST["email"];
    $customer->phone = $_REQUEST["phone"];
    $customer->address = $_REQUEST["address"];

    //Upload File
    if (strlen($_FILES["image"]["name"]) > 0) {
        $target_dir = "../public/images/user/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extention = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extention, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $filename = date('YmdHis') . "." . $extention;
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $filename);
            $customer->image = $filename;
        }
    }
    //End Upload File

    $customer->roles = $_REQUEST["roles"];
    $customer->created_at = date('Y-m-d H:i:s');
    $customer->created_by = $_SESSION["user_id"] ?? 1;
    $customer->status = $_REQUEST["status"];

    $customer->save();
    set_flash("message", ["type" => "success", "msg" => "Thêm thành công"]);
    header("location:index.php?opt=customer");
}

// Cập nhật
if (isset($_REQUEST['CAPNHAT'])) {
    $id = $_REQUEST["id"];
    $customer = User::find($id);
    $customer->name = $_REQUEST["name"];
    $customer->username = $_REQUEST["username"];
    $customer->password = sha1($_REQUEST["password"]);
    $customer->email = $_REQUEST["email"];
    $customer->phone = $_REQUEST["phone"];
    $customer->address = $_REQUEST["address"];

    //Upload File
    if (strlen($_FILES["image"]["name"]) > 0) {
        $target_dir = "../public/images/user/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extention = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extention, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            //Xóa hình cũ
            if (file_exists("../public/images/user/" . $customer->image)) {
                unlink("../public/images/user/" . $customer->image);
            }
            $filename = date('YmdHis') . "." . $extention;
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $filename);
            $customer->image = $filename;
        }
    }
    //End Upload File

    $customer->roles = $_REQUEST["roles"];
    $customer->updated_at = date('Y-m-d H:i:s');
    $customer->updated_by = $_SESSION["user_id"] ?? 1;
    $customer->status = $_REQUEST["status"];

    $customer->save();
    set_flash("message", ["type" => "success", "msg" => "Cập nhật thành công"]);
    header("location:index.php?opt=customer");
}
