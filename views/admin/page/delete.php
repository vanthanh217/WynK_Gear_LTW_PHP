<?php

use App\Models\Post;

$id = $_REQUEST["id"];
$page = Post::where('id', '=', $id)->first();
if ($page == null) {
    set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
    header("location:index.php?opt=page");
}

$page->status = 0;
$page->updated_at = date('Y-m-d H:i:s');
$page->updated_by = $_SESSION["user_id"] ?? 1;
if (file_exists("../public/images/post/" . $page->image)) {
    unlink("../public/images/post/" . $page->image);
}

$page->save();
set_flash("message", ["type" => "success", "msg" => "Xóa vào thùng rác thành công"]);
header("location:index.php?opt=page");
