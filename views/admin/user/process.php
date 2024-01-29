<?php

use App\Models\User;

// Add
if (isset($_REQUEST['THEM'])) {
    $user = new User();
    $user->name = $_REQUEST['name'];
    $user->email = $_REQUEST['email'];
    $user->phone = $_REQUEST['phone'];
    $user->username = $_REQUEST['username'];
    $user->password = sha1($_REQUEST['password']);
    $user->address = $_REQUEST['address'];

    //Upload File
    if (strlen($_FILES["image"]["name"]) > 0) {
        $target_dir = "../public/images/user/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extention = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extention, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $filename = date('YmdHis') . "." . $extention;
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $filename);
            $user->image = $filename;
        }
    }
    //End Upload File

    $user->roles = $_REQUEST['roles'];
    $user->created_at = date('Y-m-d H:i:s');
    $user->created_by = $_SESSION["user_id"] ?? 1;
    $user->status = $_REQUEST["status"];

    echo '<pre>';
    print_r($user);
    echo '</pre>';
    $user->save();
    set_flash("message", ["type" => "success", "msg" => "Thêm thành công"]);
    header("location:index.php?opt=user");
}

// Update
if (isset($_REQUEST['CAPNHAT'])) {
    $id = $_REQUEST["id"];
    $user = User::find($id);
    $user->name = $_REQUEST['name'];
    $user->email = $_REQUEST['email'];
    $user->phone = $_REQUEST['phone'];
    $user->username = $_REQUEST['username'];
    $user->password = sha1($_REQUEST['password']);
    $user->address = $_REQUEST['address'];

    //Upload File
    if (strlen($_FILES["image"]["name"]) > 0) {
        $target_dir = "../public/images/user/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extention = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extention, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            //Xóa hình cũ
            if (file_exists("../public/images/user/" . $user->image)) {
                unlink("../public/images/user/" . $user->image);
            }
            $filename = date('YmdHis') . "." . $extention;
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $filename);
            $user->image = $filename;
        }
    }
    //End Upload File

    $user->roles = $_REQUEST['roles'];
    $user->updated_at = date('Y-m-d H:i:s');
    $user->updated_by = $_SESSION["user_id"] ?? 1;
    $user->status = $_REQUEST["status"];

    $user->save();
    set_flash("message", ["type" => "success", "msg" => "Cập nhật thành công"]);
    header("location:index.php?opt=user");
}
