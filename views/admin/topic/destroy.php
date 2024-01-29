<?php

use App\Models\Topic;

$id = $_REQUEST["id"];
$topic = Topic::find($id);
if ($topic == null) {
    set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
    header("location:index.php?opt=topic&cat=trash");
}

$topic->delete();
set_flash("message", ["type" => "success", "msg" => "Xóa thành công"]);
header("location:index.php?opt=topic&cat=trash");
