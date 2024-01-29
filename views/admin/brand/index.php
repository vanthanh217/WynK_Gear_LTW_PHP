<?php

use App\Models\Brand;

$brands = Brand::where('status', '!=', 0)
   ->orderBy('created_at', 'DESC')->get();

$str_sort_order = "";
foreach ($brands as $item) {
   $str_sort_order .= "<option value='" . $item->sort_order + 1 . "'>" . $item->name . "</option>";
}

$garbage = Brand::where('status', '=', 0)->count();
$public = Brand::where('status', '!=', 0)->count();
$all = $garbage + $public;
?>

<?php require_once "../views/admin/header.php" ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Thương hiệu</h1>
      <hr style="border: none;">
   </section>
   <section class="content-body my-2">

      <div class="row">
         <div class="col-md-4">
            <form action="index.php?opt=brand&cat=process" method="post" enctype="multipart/form-data">
               <div class="mb-3">
                  <label>
                     <strong>Tên thương hiệu (*)</strong>
                  </label>
                  <input type="text" name="name" id="name" placeholder="Nhập tên danh mục" class="form-control" required>
               </div>
               <div class="mb-3">
                  <label><strong>Mô tả</strong></label>
                  <textarea name="description" rows="4" class="form-control" placeholder="Mô tả"></textarea>
               </div>
               <div class="mb-3">
                  <label><strong>Sắp xếp</strong></label>
                  <select name="sort_order" class="form-select">
                     <option value="0">Chọn vị trí</option>
                     <?= $str_sort_order ?>
                  </select>
               </div>
               <div class="mb-3">
                  <label><strong>Hình đại diện</strong></label>
                  <input type="file" name="image" class="form-control">
               </div>
               <div class="mb-3">
                  <label><strong>Trạng thái</strong></label>
                  <select name="status" class="form-select">
                     <option value="1">Xuất bản</option>
                     <option value="2">Chưa xuất bản</option>
                  </select>
               </div>
               <div class="mb-3 text-end">
                  <button type="submit" class="btn btn-success" name="THEM">
                     <i class="fa fa-save"></i> Lưu[Thêm]
                  </button>
               </div>
            </form>
         </div>
         <div class="col-md-8">
            <div class="row mt-3 align-items-center">
               <div class="col-12">
                  <ul class="manager">
                     <li>
                        <a href="#">
                           Tất cả ( <?= ($all > 0) ? $all : '0' ?> )
                        </a>
                     </li>
                     <li>
                        <a href="#">
                           Xuất bản ( <?= ($public > 0) ? $public : '0' ?> )
                        </a>
                     </li>
                     <li>
                        <a href="index.php?opt=brand&cat=trash">
                           Rác ( <?= ($garbage > 0) ? $garbage : '0' ?> )
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="row my-2 align-items-center">
               <div class="col-md-6">
                  <select name="" class="d-inline me-1">
                     <option value="">Hành động</option>
                     <option value="">Bỏ vào thùng rác</option>
                  </select>
                  <button class="btnapply">Áp dụng</button>
               </div>
               <div class="col-md-6 text-end">
                  <input type="text" class="search d-inline" />
                  <button class="btnsearch d-inline">Tìm kiếm</button>
               </div>
            </div>
            <?php require_once '../views/admin/message.php'; ?>
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th class="text-center" style="width:30px;">
                        <input type="checkbox" id="checkboxAll" />
                     </th>
                     <th class="text-center" style="width:90px;">Hình ảnh</th>
                     <th>Tên thương hiệu</th>
                     <th>Tên slug</th>
                     <th class="text-center" style="width:30px;">ID</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($brands as $brand) : ?>
                     <tr class="datarow">
                        <td class="text-center">
                           <input type="checkbox" />
                        </td>
                        <td>
                           <img class="img-fluid" src="../public/images/brand/<?= $brand->image; ?>" alt="<?= $brand->image; ?>">
                        </td>
                        <td>
                           <div class="name">
                              <a href="index.php?opt=brand&cat=edit&id=<?= $brand->id; ?>">
                                 <?= $brand->name; ?>
                              </a>
                           </div>
                           <div class="function_style">
                              <?php if ($brand->status == 1) : ?>
                                 <a href="index.php?opt=brand&cat=status&id=<?= $brand->id; ?>" class="px-1 text-success">
                                    <i class="fa fa-toggle-on"></i>
                                 </a>
                              <?php else : ?>
                                 <a href="index.php?opt=brand&cat=status&id=<?= $brand->id; ?>" class="px-1 text-danger">
                                    <i class="fa fa-toggle-off"></i>
                                 </a>
                              <?php endif; ?>
                              <a href="index.php?opt=brand&cat=edit&id=<?= $brand->id; ?>" class="px-1 text-primary">
                                 <i class="fa fa-edit"></i>
                              </a>
                              <a href="index.php?opt=brand&cat=show&id=<?= $brand->id; ?>" class="px-1 text-info">
                                 <i class="fa fa-eye"></i>
                              </a>
                              <a href="index.php?opt=brand&cat=delete&id=<?= $brand->id; ?>" class="px-1 text-danger">
                                 <i class="fa fa-trash"></i>
                              </a>
                           </div>
                        </td>
                        <td>
                           <?= $brand->slug; ?>
                        </td>
                        <td class="text-center">
                           <?= $brand->id; ?>
                        </td>
                     </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>

   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php" ?>