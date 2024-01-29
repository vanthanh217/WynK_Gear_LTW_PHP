<?php

use App\Models\Post;

$id = $_REQUEST["id"];
$page = Post::find($id);
if ($page == null) {
    set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
    header("location:index.php?opt=page&cat=trash");
}

$page->delete();
set_flash("message", ["type" => "success", "msg" => "Xóa thành công"]);
header("location:index.php?opt=page&cat=trash");
