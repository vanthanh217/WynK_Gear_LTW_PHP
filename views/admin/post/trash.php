<?php

use App\Models\Post;
use App\Models\Topic;

$posts = Post::where([['status', '=', 0], ['type', '=', 'post']])
   ->orderBy('created_at', 'DESC')->get();
$garbage = Post::where([['status', '=', 0], ['type', '=', 'post']])->count();
$public = Post::where([['status', '!=', 0], ['type', '=', 'post']])->count();
$all = $garbage + $public;
?>

<?php require_once "../views/admin/header.php" ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Thùng rác bài viết</h1>
      <div class="row mt-3 align-items-center">
         <div class="col-6">
            <ul class="manager">
               <li>
                  <a href="index.php?opt=post">
                     Tất cả ( <?= ($all > 0) ? $all : '0' ?> )
                  </a>
               </li>
               <li>
                  <a href="#">
                     Xuất bản ( <?= ($public > 0) ? $public : '0' ?> )
                  </a>
               </li>
               <li>
                  <a href="#">
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
               <option value="">Chủ đề</option>
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
      <?php require_once '../views/admin/message.php' ?>
      <table class="table table-bordered">
         <thead>
            <tr>
               <th class="text-center" style="width:30px;">
                  <input type="checkbox" id="checkboxAll" />
               </th>
               <th class="text-center" style="width:130px;">Hình ảnh</th>
               <th>Tiêu đề bài viết</th>
               <th>Tên chủ đề</th>
               <th class="text-center" style="width:30px;">ID</th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($posts as $post) : ?>
               <tr class="datarow">
                  <td>
                     <input type="checkbox" id="checkId" />
                  </td>
                  <td>
                     <img class="img-fluid" src="../public/images/post/<?= $post->image ?>" alt="<?= $post->image ?>">
                  </td>
                  <td>
                     <div class="name">
                        <a href="index.php?opt=post&cat=edit&id=<?= $post->id ?>">
                           <?= $post->title ?>
                        </a>
                     </div>
                     <div class="function_style">
                        <a href="index.php?opt=post&cat=restore&id=<?= $post->id ?>" class="text-primary mx-1">
                           <i class="fa fa-undo"></i>
                        </a>
                        <a href="index.php?opt=post&cat=destroy&id=<?= $post->id ?>" class="text-danger mx-1">
                           <i class="fa fa-trash"></i>
                        </a>
                     </div>
                  </td>
                  <td>
                     <?php
                     $topic = Topic::find($post->topic_id);
                     echo $topic->name;
                     ?>
                  </td>
                  <td class="text-center">
                     <?= $post->id ?>
                  </td>
               </tr>
            <?php endforeach; ?>
         </tbody>
      </table>

   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php" ?>