<?php

use App\Models\Category;

$id = $_REQUEST['id'];
$category = Category::find($id);
?>

<?php require_once "../views/admin/header.php" ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Chi tiết</h1>
      <div class="row mt-2 align-items-center">
         <div class="col-md-12 text-end">
            <a href="index.php?opt=category" class="btn btn-primary btn-sm">
               <i class="fa fa-arrow-left"></i> Về danh sách
            </a>
            <a href="index.php?opt=category&cat=edit&id=<?= $category->id ?>" class="btn btn-success btn-sm">
               <i class="fa fa-edit"></i> Sửa
            </a>
            <a href="index.php?opt=category&cat=delete&id=<?= $category->id ?>" class="btn btn-danger btn-sm">
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
               <td><?= $category->id ?></td>
            </tr>
            <tr>
               <th>name</th>
               <td><?= $category->name ?></td>
            </tr>
            <tr>
               <th>slug</th>
               <td><?= $category->slug ?></td>
            </tr>
            <tr>
               <th>parent_id</th>
               <td><?= $category->parent_id ?></td>
            </tr>
            <tr>
               <th>Ảnh</th>
               <td>
                  <?php if ($category->image) : ?>
                     <img src="../public/images/category/<?= $category->image ?>" alt="" class="image-fluid" style="width: 200px;">
                  <?php else : ?>
                     <?= 'NO IMAGE' ?>
                  <?php endif; ?>
               </td>
            </tr>
            <tr>
               <th>sort_order</th>
               <td><?= $category->sort_order ?></td>
            </tr>
            <tr>
               <th>description</th>
               <td><?= $category->description ?></td>
            </tr>
            <tr>
               <th>created_at</th>
               <td><?= $category->created_at ?></td>
            </tr>
            <tr>
               <th>created_by</th>
               <td><?= $category->created_by ?></td>
            </tr>
            <tr>
               <th>status</th>
               <td><?= $category->status == 1 ? 'Xuất bản' : 'Chưa xuất bản' ?></td>
            </tr>
         </tbody>
      </table>

   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php" ?>