<?php

use App\Models\Product;

$id = $_REQUEST['id'];
$product = Product::find($id);
?>

<?php require_once "../views/admin/header.php" ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Chi tiết</h1>
      <div class="row mt-2 align-items-center">
         <div class="col-md-12 text-end">
            <a href="index.php?opt=product" class="btn btn-primary btn-sm">
               <i class="fa fa-arrow-left"></i> Về danh sách
            </a>
            <a href="product_edit" class="btn btn-success btn-sm">
               <i class="fa fa-edit"></i> Sửa
            </a>
            <a href="index.php?opt=product" class="btn btn-danger btn-sm">
               <i class="fa fa-trash"></i> Xóa
            </a>
         </div>
      </div>
   </section>
   <section class="content-body my-2">

      <table class="table table-bordered">
         <thead>
            <tr>
               <th style="width:180px">Tên trường</th>
               <th>Giá trị</th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <th>id</th>
               <td><?= $product->id ?></td>
            </tr>
            <tr>
               <th>category_id</th>
               <td><?= $product->category_id ?></td>
            </tr>
            <tr>
               <th>brand_id</th>
               <td><?= $product->brand_id ?></td>
            </tr>
            <tr>
               <th>name</th>
               <td><?= $product->name ?></td>
            </tr>
            <tr>
               <th>slug</th>
               <td><?= $product->slug ?></td>
            </tr>
            <tr>
               <th>price</th>
               <td><?= number_format($product->price) ?>đ</td>
            </tr>
            <tr>
               <th>pricesale</th>
               <td><?= number_format($product->pricesale) ?>đ</td>
            </tr>
            <tr>
               <th>Ảnh</th>
               <td>
                  <img src="../public/images/product/<?= $product->image ?>" alt="" class="image-fluid" style="width: 200px;">
               </td>
            </tr>
            <tr>
               <th>qty</th>
               <td><?= $product->qty ?></td>
            </tr>
            <tr>
               <th>detail</th>
               <td><?= $product->detail ?></td>
            </tr>
            <tr>
               <th>description</th>
               <td><?= $product->description ?></td>
            </tr>
            <tr>
               <th>created_at</th>
               <td><?= $product->created_at ?></td>
            </tr>
            <tr>
               <th>created_by</th>
               <td><?= $product->created_by ?></td>
            </tr>
            <tr>
               <th>status</th>
               <td><?= $product->status == 1 ? 'Xuất bản' : 'Chưa xuất bản' ?></td>
            </tr>
         </tbody>
      </table>

   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php" ?>