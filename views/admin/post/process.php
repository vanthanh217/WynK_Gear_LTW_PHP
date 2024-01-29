<?php

use App\Models\Post;

// Add
if (isset($_REQUEST['THEM'])) {
    $post = new Post();
    $post->topic_id = $_REQUEST['topic_id'];
    $post->title = $_REQUEST['title'];
    $post->slug = str_slug($_REQUEST['title']);
    $post->detail = $_REQUEST['detail'];

    //Upload File
    if (strlen($_FILES["image"]["name"]) > 0) {
        $target_dir = "../public/images/post/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extention = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extention, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $filename = date('YmdHis') . "." . $extention;
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $filename);
            $post->image = $filename;
        }
    }
    //End Upload File

    $post->type = $_REQUEST['type'];
    $post->description = $_REQUEST['description'];
    $post->created_at = date('Y-m-d H:i:s');
    $post->created_by = $_SESSION["user_id"] ?? 1;
    $post->status = $_REQUEST["status"];

    $post->save();
    set_flash("message", ["type" => "success", "msg" => "Thêm thành công"]);
    header("location:index.php?opt=post");
}

// Update
if (isset($_REQUEST['CAPNHAT'])) {
    $id = $_REQUEST["id"];
    $post = Post::find($id);
    $post->topic_id = $_REQUEST['topic_id'];
    $post->title = $_REQUEST['title'];
    $post->slug = str_slug($_REQUEST['title']);
    $post->detail = $_REQUEST['detail'];

    //Upload File
    if (strlen($_FILES["image"]["name"]) > 0) {
        $target_dir = "../public/images/post/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extention = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extention, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            //Xóa hình cũ
            if (file_exists("../public/images/post/" . $post->image)) {
                unlink("../public/images/post/" . $post->image);
            }
            $filename = date('YmdHis') . "." . $extention;
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $filename);
            $post->image = $filename;
        }
    }
    //End Upload File

    $post->type = $_REQUEST['type'];
    $post->description = $_REQUEST['description'];
    $post->updated_at = date('Y-m-d H:i:s');
    $post->updated_by = $_SESSION["user_id"] ?? 1;
    $post->status = $_REQUEST["status"];

    $post->save();
    set_flash("message", ["type" => "success", "msg" => "Thêm thành công"]);
    header("location:index.php?opt=post");
}
