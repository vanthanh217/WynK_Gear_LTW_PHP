<?php

use App\Models\Brand;

$id = $_REQUEST['id'];
$brand = Brand::find($id);
?>

<?php require_once "../views/admin/header.php" ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Chi tiết</h1>
      <div class="row mt-2 align-items-center">
         <div class="col-md-12 text-end">
            <a href="index.php?opt=brand" class="btn btn-primary btn-sm">
               <i class="fa fa-arrow-left"></i> Về danh sách
            </a>
            <a href="index.php?opt=brand&cat=edit&id=<?= $brand->id ?>" class="btn btn-success btn-sm">
               <i class="fa fa-edit"></i> Sửa
            </a>
            <a href="index.php?opt=brand&cat=delete&id=<?= $brand->id ?>" class="btn btn-danger btn-sm">
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
               <td><?= $brand->id ?></td>
            </tr>
            <tr>
               <th>name</th>
               <td><?= $brand->name ?></td>
            </tr>
            <tr>
               <th>slug</th>
               <td><?= $brand->slug ?></td>
            </tr>
            <tr>
               <th>Ảnh</th>
               <td>
                  <?php if ($brand->image) : ?>
                     <img src="../public/images/category/<?= $brand->image ?>" alt="" class="image-fluid" style="width: 200px;">
                  <?php else : ?>
                     <?= 'NO IMAGE' ?>
                  <?php endif; ?>
               </td>
            </tr>
            <tr>
               <th>sort_order</th>
               <td><?= $brand->sort_order ?></td>
            </tr>
            <tr>
               <th>description</th>
               <td><?= $brand->description ?></td>
            </tr>
            <tr>
               <th>created_at</th>
               <td><?= $brand->created_at ?></td>
            </tr>
            <tr>
               <th>created_by</th>
               <td><?= $brand->created_by ?></td>
            </tr>
            <tr>
               <th>status</th>
               <td><?= $brand->status == 1 ? 'Xuất bản' : 'Chưa xuất bản' ?></td>
            </tr>
         </tbody>
      </table>

   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php" ?>