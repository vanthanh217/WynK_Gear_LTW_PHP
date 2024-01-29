<?php

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

$products = Product::where('status', '!=', 0)
   ->orderBy('created_at', 'DESC')->get();
$garbage = Product::where('status', '=', 0)->count();
$public = Product::where('status', '!=', 0)->count();
$all = $garbage + $public;
?>

<?php require_once "../views/admin/header.php" ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Sản phẩm</h1>
      <a href="index.php?opt=product&cat=create" class="btn-add">Thêm mới</a>
      <div class="row mt-3 align-items-center">
         <div class="col-6">
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
                  <a href="index.php?opt=product&cat=trash">
                     Rác ( <?= ($garbage > 0) ? $garbage : '0' ?> )
                  </a>
               </li>
            </ul>
         </div>
         <div class="col-6 text-end">
            <input type="text" class="search d-inline" />
            <button class="d-inline btnsearch">Tìm kiếm</button>
         </div>
      </div>
      <div class="row mt-1 align-items-center">
         <div class="col-md-8">
            <select name="" class="d-inline me-1">
               <option value="">Hành động</option>
               <option value="">Bỏ vào thùng rác</option>
            </select>
            <button class="btnapply">Áp dụng</button>
            <select name="" class="d-inline me-1">
               <option value="">Tất cả danh mục</option>
            </select>
            <select name="" class="d-inline me-1">
               <option value="">Tất cả thương hiệu</option>
            </select>
            <button class="btnfilter">Lọc</button>
         </div>
         <div class="col-md-4 text-end">
            <nav aria-label="Page navigation example">
               <ul class="pagination pagination-sm justify-content-end">
                  <li class="page-item disabled">
                     <a class="page-link">&laquo;</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                     <a class="page-link" href="#">&raquo;</a>
                  </li>
               </ul>
            </nav>
         </div>
      </div>
   </section>
   <section class="content-body my-2">
      <?php require_once "../views/admin/message.php" ?>
      <table class="table table-bordered">
         <thead>
            <tr>
               <th class="text-center" style="width:30px;">
                  <input type="checkbox" id="checkboxAll" />
               </th>
               <th class="text-center" style="width:130px;">Hình ảnh</th>
               <th>Tên sản phẩm</th>
               <th>Tên danh mục</th>
               <th>Tên thương hiệu</th>
               <th>ID</th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($products as $product) : ?>
               <tr class="datarow">
                  <td>
                     <input type="checkbox" id="checkId" />
                  </td>
                  <td>
                     <img class="img-fluid" src="../public/images/product/<?= $product->image; ?>" alt="<?= $product->image; ?>">
                  </td>
                  <td>
                     <div class="name">
                        <a href="index.php?opt=product&cat=edit&id=<?= $product->id; ?>">
                           <?= $product->name; ?>
                        </a>
                     </div>
                     <div class="function_style">
                        <?php if ($product->status == 1) : ?>
                           <a href="index.php?opt=product&cat=status&id=<?= $product->id; ?>" class="px-1 text-success">
                              <i class="fa fa-toggle-on"></i>
                           </a>
                        <?php else : ?>
                           <a href="index.php?opt=product&cat=status&id=<?= $product->id; ?>" class="px-1 text-danger">
                              <i class="fa fa-toggle-off"></i>
                           </a>
                        <?php endif; ?>
                        <a href="index.php?opt=product&cat=edit&id=<?= $product->id; ?>" class="px-1 text-primary">
                           <i class="fa fa-edit"></i>
                        </a>
                        <a href="index.php?opt=product&cat=show&id=<?= $product->id; ?>" class="px-1 text-info">
                           <i class="fa fa-eye"></i>
                        </a>
                        <a href="index.php?opt=product&cat=delete&id=<?= $product->id; ?>" class="px-1 text-danger">
                           <i class="fa fa-trash"></i>
                        </a>
                     </div>
                  </td>
                  <td>
                     <?php
                     $category = Category::find($product->category_id);
                     echo $category->name;
                     ?>
                  </td>
                  <td>
                     <?php
                     $brand = Brand::find($product->brand_id);
                     echo $brand->name;
                     ?>
                  </td>
                  <td class="text-center" style="width:30px;">
                     <?= $product->id; ?>
                  </td>
               </tr>
            <?php endforeach; ?>
         </tbody>
      </table>

   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php" ?>