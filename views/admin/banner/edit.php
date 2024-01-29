<?php

use App\Models\Banner;

$id = $_REQUEST["id"];
$banner = Banner::where('id', '=', $id)->first();
if ($banner == null) {
   set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
   header("location:index.php?opt=banner");
}
$banners = Banner::where('status', '!=', 0)
   ->orderBy('created_at', 'DESC')->get();

$str_sort_order = "";
$str_position = '';
foreach ($banners as $item) {
   if ($item->sort_order == $banner->sort_order) {
      $str_sort_order .= "<option selected value='" . $item->sort_order + 1 . "'>" . $item->name . "</option>";
   } else {
      $str_sort_order .= "<option value='" . $item->sort_order + 1 . "'>" . $item->name . "</option>";
   }
}
?>

<?php require_once "../views/admin/header.php" ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Cập nhật banner</h1>
      <div class="text-end">
         <a href="index.php?opt=banner" class="btn btn-sm btn-success">
            <i class="fa fa-arrow-left"></i> Về danh sách
         </a>
      </div>
   </section>
   <section class="content-body my-2">

      <form action="index.php?opt=banner&cat=process" method="post" enctype="multipart/form-data">
         <div class="row">
            <input name="id" value="<?= $banner->id; ?>" type="hidden">
            <div class="col-md-9">
               <div class="mb-3">
                  <label><strong>Tên banner (*)</strong></label>
                  <input type="text" name="name" value="<?= $banner->name; ?>" class="form-control" placeholder="Nhập tên banner" />
               </div>
               <div class="mb-3">
                  <label><strong>Liên kết</strong></label>
                  <input type="text" name="link" value="<?= $banner->link; ?>" class="form-control" placeholder="Nhập liên kết" />
               </div>
               <div class="mb-3">
                  <label><strong>Mô tả (*)</strong></label>
                  <textarea name="description" rows="5" class="form-control" placeholder="Nhập mô tả">
                  <?= $banner->description; ?>
                  </textarea>
               </div>
            </div>
            <div class="col-md-3">
               <div class="box-container mt-4 bg-white">
                  <div class="box-header py-1 px-2 border-bottom">
                     <strong>Đăng</strong>
                  </div>
                  <div class="box-body p-2 border-bottom">
                     <p>Chọn trạng thái đăng</p>
                     <select name="status" class="form-select">
                        <option value="1" <?= $banner->status == 1 ? 'selected' : '' ?>>Xuất bản</option>
                        <option value="2" <?= $banner->status == 2 ? 'selected' : '' ?>>Chưa xuất bản</option>
                     </select>
                  </div>
                  <div class="box-footer text-end px-2 py-3">
                     <button type="submit" class="btn btn-success btn-sm text-end" name="CAPNHAT">
                        <i class="fa fa-save" aria-hidden="true"></i> Đăng
                     </button>
                  </div>
               </div>
               <div class="box-container mt-4 bg-white">
                  <div class="box-header py-1 px-2 border-bottom">
                     <strong>Sắp xếp (*)</strong>
                  </div>
                  <div class="box-body p-2 border-bottom">
                     <select name="sort_order" class="form-select">
                        <option>Chọn vị trí</option>
                        <?= $str_sort_order ?>
                     </select>
                  </div>
               </div>
               <div class="box-container mt-4 bg-white">
                  <div class="box-header py-1 px-2 border-bottom">
                     <strong>Vị trí (*)</strong>
                  </div>
                  <div class="box-body p-2 border-bottom">
                     <select name="position" class="form-select">
                        <option value="slideshow" <?= $banner->position == 'slideshow' ? 'selected' : '' ?>>
                           Slide Show
                        </option>
                        <option value="abs" <?= $banner->position == 'abs' ? 'selected' : '' ?>>
                           Quảng cáo
                        </option>
                     </select>
                     <p class="pt-2">Vị trí hiển thị banner</p>
                  </div>
               </div>
               <div class="box-container mt-4 bg-white">
                  <div class="box-header py-1 px-2 border-bottom">
                     <strong>Hình (*)</strong>
                  </div>
                  <div class="box-body p-2 border-bottom">
                     <input type="file" name="image" class="form-control" />
                  </div>
               </div>
            </div>
         </div>
      </form>

   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php" ?>