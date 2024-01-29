<?php

use App\Models\Post;

$id = $_REQUEST["id"];
$post = Post::where('id', '=', $id)->first();
if ($post == null) {
    set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
    header("location:index.php?opt=post&cat=trash");
}

$post->status = 2;
$post->updated_at = date('Y-m-d H:i:s');
$post->updated_by = $_SESSION["user_id"] ?? 1;
$post->save();
set_flash("message", ["type" => "success", "msg" => "Khôi phục thành công"]);
header("location:index.php?opt=post&cat=trash");
