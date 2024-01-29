<?php

use App\Models\Post;

$id = $_REQUEST["id"];
$post = Post::where('id', '=', $id)->first();
if ($post == null) {
    set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
    header("location:index.php?opt=post");
}

$post->status = 0;
$post->updated_at = date('Y-m-d H:i:s');
$post->updated_by = $_SESSION["user_id"] ?? 1;
if (file_exists("../public/images/post/" . $post->image)) {
    unlink("../public/images/post/" . $post->image);
}

$post->save();
set_flash("message", ["type" => "success", "msg" => "Xóa vào thùng rác thành công"]);
header("location:index.php?opt=post");
