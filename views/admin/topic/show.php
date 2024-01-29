<?php

use App\Models\Topic;

$id = $_REQUEST['id'];
$topic = Topic::find($id);
?>

<?php require_once "../views/admin/header.php" ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Chi tiết</h1>
      <div class="row mt-2 align-items-center">
         <div class="col-md-12 text-end">
            <a href="index.php?opt=topic" class="btn btn-primary btn-sm">
               <i class="fa fa-arrow-left"></i> Về danh sách
            </a>
            <a href="index.php?opt=topic&cat=edit" class="btn btn-success btn-sm">
               <i class="fa fa-edit"></i> Sửa
            </a>
            <a href="index.php?opt=topic" class="btn btn-danger btn-sm">
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
               <td><?= $topic->id ?></td>
            </tr>
            <tr>
               <th>name</th>
               <td><?= $topic->name ?></td>
            </tr>
            <tr>
               <th>slug</th>
               <td><?= $topic->slug ?></td>
            </tr>
            <tr>
               <th>description</th>
               <td><?= $topic->description ?></td>
            </tr>
            <tr>
               <th>sort_order</th>
               <td><?= $topic->sort_order ?></td>
            </tr>
            <tr>
               <th>created_at</th>
               <td><?= $topic->created_at ?></td>
            </tr>
            <tr>
               <th>created_by</th>
               <td><?= $topic->created_by ?></td>
            </tr>
            <tr>
               <th>status</th>
               <td><?= $topic->status == 1 ? 'Xuất bản' : 'Chưa xuất bản' ?></td>
            </tr>
         </tbody>
      </table>

   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php" ?>