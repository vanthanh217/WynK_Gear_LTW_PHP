<?php

use App\Models\Post;

$id = $_REQUEST["id"];
$page = Post::where('id', '=', $id)->first();
if ($page == null) {
    set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
    header("location:index.php?opt=page&cat=trash");
}

$page->status = 2;
$page->updated_at = date('Y-m-d H:i:s');
$page->updated_by = $_SESSION["user_id"] ?? 1;
$page->save();
set_flash("message", ["type" => "success", "msg" => "Khôi phục thành công"]);
header("location:index.php?opt=page&cat=trash");
