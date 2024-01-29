<?php

use App\Models\Post;

// Add
if (isset($_REQUEST['THEM'])) {
    $page = new Post();
    $page->title = $_REQUEST['title'];
    $page->slug = str_slug($_REQUEST['title']);
    $page->detail = $_REQUEST['detail'];

    //Upload File
    if (strlen($_FILES["image"]["name"]) > 0) {
        $target_dir = "../public/images/post/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extention = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extention, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $filename = date('YmdHis') . "." . $extention;
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $filename);
            $page->image = $filename;
        }
    }
    //End Upload File

    $page->type = $_REQUEST['type'];
    $page->description = $_REQUEST['description'];
    $page->created_at = date('Y-m-d H:i:s');
    $page->created_by = $_SESSION["user_id"] ?? 1;
    $page->status = $_REQUEST["status"];

    $page->save();
    set_flash("message", ["type" => "success", "msg" => "Thêm thành công"]);
    header("location:index.php?opt=page");
}

// Update
if (isset($_REQUEST['CAPNHAT'])) {
    $id = $_REQUEST["id"];
    $page = Post::find($id);
    $page->title = $_REQUEST['title'];
    $page->slug = str_slug($_REQUEST['title']);
    $page->detail = $_REQUEST['detail'];

    //Upload File
    if (strlen($_FILES["image"]["name"]) > 0) {
        $target_dir = "../public/images/post/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extention = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extention, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            //Xóa hình cũ
            if (file_exists("../public/images/post/" . $page->image)) {
                unlink("../public/images/post/" . $page->image);
            }
            $filename = date('YmdHis') . "." . $extention;
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $filename);
            $page->image = $filename;
        }
    }
    //End Upload File

    $page->type = $_REQUEST['type'];
    $page->description = $_REQUEST['description'];
    $page->updated_at = date('Y-m-d H:i:s');
    $page->updated_by = $_SESSION["user_id"] ?? 1;
    $page->status = $_REQUEST["status"];

    $page->save();
    set_flash("message", ["type" => "success", "msg" => "Cập nhật thành công"]);
    header("location:index.php?opt=page");
}
