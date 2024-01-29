<?php

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

$id = $_REQUEST["id"];
$product = Product::where('id', '=', $id)->first();
if ($product == null) {
   set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
   header("location:index.php?opt=product");
}

$brands = Brand::where('status', '!=', 0)
   ->orderBy('created_at', 'DESC')->get();
$categories = Category::where('status', '!=', 0)
   ->orderBy('created_at', 'DESC')->get();
$str_option_brand = '';
$str_option_cat = '';
foreach ($brands as $item) {
   if ($product->brand_id == $item->id) {
      $str_option_brand .= "<option selected value='" . $item->id . "'>" . $item->name . "</option>";
   } else {
      $str_option_brand .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
   }
}
foreach ($categories as $item) {
   if ($product->category_id == $item->id) {
      $str_option_cat .= "<option selected value='" . $item->id . "'>" . $item->name . "</option>";
   } else {
      $str_option_cat .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
   }
}
?>

<?php require_once "../views/admin/header.php" ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Cập nhập sản phẩm</h1>
      <div class="mt-1 text-end">
         <a class="btn btn-sm btn-primary" href="index.php?opt=product">
            <i class="fa fa-arrow-left"></i> Về danh sách
         </a>
      </div>
   </section>
   <section class="content-body my-2">

      <form action="index.php?opt=product&cat=process" method="post" enctype="multipart/form-data">
         <div class="row">
            <div class="col-md-9">
               <input name="id" value="<?= $product->id; ?>" type="hidden">
               <div class="mb-3">
                  <label><strong>Tên sản phẩm (*)</strong></label>
                  <input type="text" placeholder="Nhập tên sản phẩm" name="name" value="<?= $product->name; ?>" class="form-control" />
               </div>
               <div class="mb-3">
                  <label><strong>Slug (*)</strong></label>
                  <input type="text" placeholder="Slug" name="slug" value="<?= $product->slug; ?>" class="form-control" />
               </div>
               <div class="mb-3">
                  <label><strong>Chi tiết (*)</strong></label>
                  <textarea name="detail" placeholder="Nhập chi tiết sản phẩm" rows="7" class="form-control"><?= $product->detail; ?></textarea>
               </div>
               <div class="mb-3">
                  <label><strong>Mô tả (*)</strong></label>
                  <textarea name="description" rows="3" class="form-control" placeholder="Nhập mô tả"><?= $product->description; ?></textarea>
               </div>
            </div>
            <div class="col-md-3">
               <div class="box-container mt-4 bg-white">
                  <div class="box-header py-1 px-2 border-bottom">
                     <strong>Cập nhật</strong>
                  </div>
                  <div class="box-body p-2 border-bottom">
                     <select name="status" class="form-select">
                        <option value="1" <?= $product->status == 1 ? 'selected' : '' ?>>Xuất bản</option>
                        <option value="2" <?= $product->status == 2 ? 'selected' : '' ?>>Chưa xuất bản</option>
                     </select>
                  </div>
                  <div class="box-footer text-end px-2 py-2">
                     <button type="submit" class="btn btn-success btn-sm text-end" name="CAPNHAT">
                        <i class="fa fa-save" aria-hidden="true"></i> Cập nhật
                     </button>
                  </div>
               </div>
               <div class="box-container mt-2 bg-white">
                  <div class="box-header py-1 px-2 border-bottom">
                     <strong>Danh mục(*)</strong>
                  </div>
                  <div class="box-body p-2 border-bottom">
                     <select name="category_id" class="form-select">
                        <option value="0">Chọn danh mục</option>
                        <?= $str_option_cat; ?>
                     </select>
                  </div>
               </div>
               <div class="box-container mt-2 bg-white">
                  <div class="box-header py-1 px-2 border-bottom">
                     <strong>Thương hiệu(*)</strong>
                  </div>
                  <div class="box-body p-2 border-bottom">
                     <select name="brand_id" class="form-select">
                        <option value="0">Chọn thương hiệu</option>
                        <?= $str_option_brand; ?>
                     </select>
                  </div>
               </div>
               <div class="box-container mt-2 bg-white">
                  <div class="box-header py-1 px-2 border-bottom">
                     <strong>Giá và số lượng</strong>
                  </div>
                  <div class="box-body p-2 border-bottom">
                     <div class="mb-3">
                        <label><strong>Giá bán (*)</strong></label>
                        <input type="number" value="<?= $product->price; ?>" min="10000" name="price" class="form-control" />
                     </div>
                     <div class="mb-3">
                        <label><strong>Giá khuyến mãi (*)</strong></label>
                        <input type="number" value="<?= $product->pricesale; ?>" min="10000" name="pricesale" class="form-control" />
                     </div>
                     <div class="mb-3">
                        <label><strong>Số lượng (*)</strong></label>
                        <input type="number" value="<?= $product->qty; ?>" min="1" name="qty" class="form-control" />
                     </div>
                  </div>
               </div>
               <div class="box-container mt-2 bg-white">
                  <div class="box-header py-1 px-2 border-bottom">
                     <strong>Hình đại diện(*)</strong>
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