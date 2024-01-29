<?php

use App\Models\Brand;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Topic;

if (isset($_REQUEST['ADDCATEGORY'])) {
    if (isset($_REQUEST['categoryid'])) {
        $list_id = $_REQUEST['categoryid'];
        foreach ($list_id as $id) {
            $category = Category::find($id);
            $menu = new Menu();
            $menu->name = $category->name;
            $menu->link = 'index.php?opt=product&cat=' . $category->slug;
            $menu->type = 'category';
            $menu->parent_id = $category->parent_id;
            $menu->table_id = $id;
            $menu->sort_order = 1;
            $menu->position = $_REQUEST['position'];
            $menu->status = 2;
            $menu->created_at = date('Y-m-d H:i:s');
            $menu->created_by = $_SESSION["user_id"] ?? 1;

            $menu->save();
            set_flash("message", ["type" => "success", "msg" => "Thêm thành công"]);
            header("location:index.php?opt=menu");
        }
    } else {
        set_flash('message', ['type' => 'danger', 'msg' => 'Chưa chọn danh mục']);
        header("location:index.php?opt=menu");
    }
}
if (isset($_REQUEST['ADDBRAND'])) {
    if (isset($_REQUEST['brandid'])) {
        $list_id = $_REQUEST['brandid'];
        foreach ($list_id as $id) {
            $brand = Brand::find($id);
            $menu = new Menu();
            $menu->name = $brand->name;
            $menu->link = 'index.php?opt=product&cat=' . $brand->slug;
            $menu->type = 'brand';
            $menu->parent_id = 0;
            $menu->table_id = $id;
            $menu->sort_order = 1;
            $menu->position = $_REQUEST['position'];
            $menu->status = 2;
            $menu->created_at = date('Y-m-d H:i:s');
            $menu->created_by = $_SESSION["user_id"] ?? 1;

            $menu->save();
            set_flash("message", ["type" => "success", "msg" => "Thêm thành công"]);
            header("location:index.php?opt=menu");
        }
    } else {
        set_flash('message', ['type' => 'danger', 'msg' => 'Chưa chọn thương hiệu']);
        header("location:index.php?opt=menu");
    }
}
if (isset($_REQUEST['ADDTOPIC'])) {
    if (isset($_REQUEST['topicid'])) {
        $list_id = $_REQUEST['topicid'];
        foreach ($list_id as $id) {
            $topic = Topic::find($id);
            $menu = new Menu();
            $menu->name = $topic->name;
            $menu->link = 'index.php?opt=post&cat=' . $topic->slug;
            $menu->type = 'topic';
            $menu->table_id = $id;
            $menu->parent_id = 0;
            $menu->sort_order = 1;
            $menu->position = $_REQUEST['position'];
            $menu->status = 2;
            $menu->created_at = date('Y-m-d H:i:s');
            $menu->created_by = $_SESSION["user_id"] ?? 1;

            $menu->save();
            set_flash("message", ["type" => "success", "msg" => "Thêm thành công"]);
            header("location:index.php?opt=menu");
        }
    } else {
        set_flash('message', ['type' => 'danger', 'msg' => 'Chưa chọn chủ đề']);
        header("location:index.php?opt=menu");
    }
}
if (isset($_REQUEST['ADDPAGE'])) {
    if (isset($_REQUEST['pageid'])) {
        $list_id = $_REQUEST['pageid'];
        foreach ($list_id as $id) {
            $page = Post::find($id);
            $menu = new Menu();
            $menu->name = $page->title;
            $menu->link = 'index.php?opt=page&cat=' . $page->slug;
            $menu->type = 'page';
            $menu->table_id = $id;
            $menu->parent_id = 0;
            $menu->sort_order = 1;
            $menu->position = $_REQUEST['position'];
            $menu->status = 2;
            $menu->created_at = date('Y-m-d H:i:s');
            $menu->created_by = $_SESSION["user_id"] ?? 1;

            $menu->save();
            set_flash("message", ["type" => "success", "msg" => "Thêm thành công"]);
            header("location:index.php?opt=menu");
        }
    } else {
        set_flash('message', ['type' => 'danger', 'msg' => 'Chưa chọn trang đơn']);
        header("location:index.php?opt=menu");
    }
}
if (isset($_REQUEST['ADDCUSTOM'])) {
    $menu = new Menu();
    $menu->name = $_REQUEST['name'];
    $menu->link = $_REQUEST['link'];
    $menu->type = 'custom';
    $menu->parent_id = 0;
    $menu->sort_order = 1;
    $menu->position = $_REQUEST['position'];
    $menu->status = 2;
    $menu->created_at = date('Y-m-d H:i:s');
    $menu->created_by = $_SESSION["user_id"] ?? 1;

    $menu->save();
    set_flash("message", ["type" => "success", "msg" => "Thêm thành công"]);
    header("location:index.php?opt=menu");
}

if (isset($_REQUEST['CAPNHAT'])) {
    $id = $_REQUEST['id'];
    $menu = Menu::find($id);
    $menu->name = $_REQUEST["name"];
    $menu->link = $_REQUEST["link"];
    $menu->position = $_REQUEST["position"];
    $menu->table_id = $_REQUEST["table_id"];
    $menu->type = $_REQUEST["type"];
    $menu->parent_id = $_REQUEST["parent_id"];
    $menu->sort_order = $_REQUEST["sort_order"];
    $menu->parent_id = $_REQUEST['parent_id'];
    $menu->updated_at = date('Y-m-d H:i:s');
    $menu->updated_by = $_SESSION["user_id"] ?? 1;
    $menu->status = $_REQUEST["status"];

    $menu->save();
    set_flash("message", ["type" => "success", "msg" => "Cập nhật thành công"]);
    header("location:index.php?opt=menu");
}
