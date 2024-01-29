<?php

use App\Models\Topic;

$id = $_REQUEST["id"];
$topic = Topic::where('id', '=', $id)->first();
if ($topic == null) {
    set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
    header("location:index.php?opt=topic");
}

$topic->status = 0;
$topic->updated_at = date('Y-m-d H:i:s');
$topic->updated_by = $_SESSION["user_id"] ?? 1;
if (file_exists("../public/images/topic/" . $topic->image)) {
    unlink("../public/images/topic/" . $topic->image);
}

$topic->save();
set_flash("message", ["type" => "success", "msg" => "Xóa vào thùng rác thành công"]);
header("location:index.php?opt=topic");
