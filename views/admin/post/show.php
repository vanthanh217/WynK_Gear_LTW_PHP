<?php

use App\Models\Post;

$id = $_REQUEST['id'];
$post = Post::find($id);
?>

<?php require_once "../views/admin/header.php" ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Chi tiết</h1>
      <div class="row mt-2 align-items-center">
         <div class="col-md-12 text-end">
            <a href="index.php?opt=post" class="btn btn-primary btn-sm">
               <i class="fa fa-arrow-left"></i> Về danh sách
            </a>
            <a href="index.php?opt=post&cat=edit" class="btn btn-success btn-sm">
               <i class="fa fa-edit"></i> Sửa
            </a>
            <a href="index.php?opt=post" class="btn btn-danger btn-sm">
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
               <td><?= $post->id ?></td>
            </tr>
            <tr>
               <th>topic_id</th>
               <td><?= $post->topic_id ?></td>
            </tr>
            <tr>
               <th>title</th>
               <td><?= $post->title ?></td>
            </tr>
            <tr>
               <th>slug</th>
               <td><?= $post->slug ?></td>
            </tr>
            <tr>
               <th>detail</th>
               <td><?= $post->detail ?></td>
            </tr>
            <tr>
               <th>Ảnh</th>
               <td>
                  <?php if ($post->image) : ?>
                     <img class="img-fluid" src="../public/images/post/<?= $post->image; ?>" alt="<?= $post->image; ?>" style="width: 70px; height: 70px; object-fit: cover;" />
                  <?php else : ?>
                     <?= 'No Image' ?>
                  <?php endif; ?>
               </td>
            </tr>
            <tr>
               <th>type</th>
               <td><?= $post->type ?></td>
            </tr>
            <tr>
               <th>description</th>
               <td><?= $post->description ?></td>
            </tr>
            <tr>
               <th>created_at</th>
               <td><?= $post->created_at ?></td>
            </tr>
            <tr>
               <th>created_by</th>
               <td><?= $post->created_by ?></td>
            </tr>
            <tr>
               <th>status</th>
               <td><?= $post->status == 1 ? 'Xuất bản' : 'Chưa xuất bản' ?></td>
            </tr>
         </tbody>
      </table>

   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php" ?>