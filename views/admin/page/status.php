<?php

use App\Models\Post;

$id = $_REQUEST["id"];
$page = Post::where('id', '=', $id)->first();
if ($page == null) {
    set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
    header("location:index.php?opt=page");
}

$page->status = $page->status == 1 ? 2 : 1;
$page->updated_at = date('Y-m-d H:i:s');
$page->updated_by = $_SESSION["user_id"] ?? 1;
$page->save();
set_flash("message", ["type" => "success", "msg" => "Thay đổi trạng thái thành công"]);
header("location:index.php?opt=page");
