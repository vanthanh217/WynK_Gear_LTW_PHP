<?php

use App\Models\Menu;

$id = $_REQUEST["id"];
$menu = Menu::find($id);
if ($menu == null) {
   set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
   header("location:index.php?opt=menu");
}

$menus = Menu::where('status', '!=', 0)
   ->orderBy('created_at', 'ASC')->get();

$str_parent_id = "";
$str_sort_order = "";
foreach ($menus as $item) {
   if ($item->id == $menu->parent_id) {
      $str_parent_id .= "<option selected value='" . $item->id . "'>" . $item->name . "</option>";
   } else {
      $str_parent_id .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
   }
   if ($item->sort_order == $menu->sort_order - 1) {
      $str_sort_order .= "<option selected value='" . $item->sort_order + 1 . "'>Sau: " . $item->name . "</option>";
   } else {
      $str_sort_order .= "<option value='" . $item->sort_order + 1 . "'>Sau: " . $item->name . "</option>";
   }
}
?>

<?php require_once "../views/admin/header.php" ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Cập nhật menu</h1>
      <div class="text-end">
         <a href="index.php?opt=menu" class="btn btn-sm btn-success">
            <i class="fa fa-arrow-left"></i> Về danh sách
         </a>
      </div>
   </section>
   <section class="content-body my-2">
      <form action="index.php?opt=menu&cat=process" method="post" enctype="multipart/form-data">
         <div class="row">
            <input name="id" value="<?= $menu->id ?>" type="hidden">
            <div class="col-md-9">
               <div class="mb-3">
                  <label for="name"><strong>Tên menu</strong></label>
                  <input value="<?= $menu->name; ?>" type="text" name="name" id="name" class="form-control" />
               </div>
               <div class="mb-3">
                  <label for="link"><strong>Liên kết</strong></label>
                  <input value="<?= $menu->link; ?>" type="text" name="link" id="link" class="form-control" />
               </div>
               <div class="mb-3">
                  <label for="position"><strong>Vị trí</strong></label>
                  <select name="position" id="position" class="form-select">
                     <option value="mainmenu" <?= $menu->position == 'mainmenu' ? 'selected' : '' ?>>Main Menu</option>
                     <option value="sidebar-menu" <?= $menu->position == 'sidebar-menu' ? 'selected' : '' ?>>Sidebar Menu</option>
                     <option value="footermenu" <?= $menu->position == 'footermenu' ? 'selected' : '' ?>>Footer Menu</option>
                  </select>
               </div>
               <div class="mb-3">
                  <div class="row">
                     <div class="col-md-4">
                        <label for="table_id">
                           <strong>Mã trong bảng</strong>
                        </label>
                        <input type="text" name="table_id" value="<?= $menu->table_id; ?>" id="table_id" class="form-control">
                     </div>
                     <div class="col-md-4">
                        <label for="type">
                           <strong>Loại</strong>
                        </label>
                        <input type="text" name="type" value="<?= $menu->type; ?>" id="type" class="form-control">
                     </div>
                     <div class="col-md-4">
                        <label for="table_id">
                           <strong>Danh mục cha</strong>
                        </label>
                        <select name="parent_id" class="form-select">
                           <option value="0">Danh mục chính</option>
                           <?= $str_parent_id ?>
                        </select>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="box-container mt-4 bg-white">
                  <div class="box-header py-1 px-2 border-bottom">
                     <strong>Cập nhật</strong>
                  </div>
                  <div class="box-body p-2 border-bottom">
                     <p>Chọn trạng thái cập nhật</p>
                     <select name="status" class="form-select">
                        <option value="1" <?= $menu->status == 1 ? 'selected' : '' ?>>Xuất bản</option>
                        <option value="2" <?= $menu->status == 2 ? 'selected' : '' ?>>Chưa xuất bản</option>
                     </select>
                  </div>
                  <div class="box-footer text-end px-2 py-3">
                     <button type="submit" class="btn btn-success btn-sm text-end" name="CAPNHAT">
                        <i class="fa fa-save" aria-hidden="true"></i> Cập nhật
                     </button>
                  </div>
               </div>
               <div class="box-container mt-2 bg-white">
                  <div class="box-header py-1 px-2 border-bottom">
                     <strong>Thứ tự</strong>
                  </div>
                  <div class="box-body p-2 border-bottom">
                     <select name="sort_order" class="form-select">
                        <option value="0">Chọn vị trí</option>
                        <?= $str_sort_order ?>
                     </select>
                  </div>
               </div>
            </div>
         </div>
      </form>
   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php" ?>