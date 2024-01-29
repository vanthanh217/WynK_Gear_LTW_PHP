<?php

use App\Models\Banner;

$id = $_REQUEST['id'];
$banner = Banner::find($id);
?>

<?php require_once "../views/admin/header.php" ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Chi tiết</h1>
      <div class="row mt-2 align-items-center">
         <div class="col-md-12 text-end">
            <a href="index.php?opt=banner" class="btn btn-primary btn-sm">
               <i class="fa fa-arrow-left"></i> Về danh sách
            </a>
            <a href="index.php?opt=banner&cat=edit&id=<?= $banner->id ?>" class="btn btn-success btn-sm">
               <i class="fa fa-edit"></i> Sửa
            </a>
            <a href="index.php?opt=banner&cat=tras&id=<?= $banner->id ?>" class="btn btn-danger btn-sm">
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
               <td><?= $banner->id ?></td>
            </tr>
            <tr>
               <th>name</th>
               <td><?= $banner->name ?></td>
            </tr>
            <tr>
               <th>Ảnh</th>
               <td>
                  <img class="img-fluid" src="../public/images/banner/<?= $banner->image; ?>" alt="<?= $banner->image; ?>" style="width: 100%; height: 120px; object-fit: cover;" />
               </td>
            </tr>
            <tr>
               <th>link</th>
               <td><?= $banner->link ?></td>
            </tr>
            <tr>
               <th>sort_order</th>
               <td><?= $banner->sort_order ?></td>
            </tr>
            <tr>
               <th>position</th>
               <td><?= $banner->position ?></td>
            </tr>
            <tr>
               <th>description</th>
               <td><?= $banner->description ?></td>
            </tr>
            <tr>
               <th>created_at</th>
               <td><?= $banner->created_at ?></td>
            </tr>
            <tr>
               <th>created_by</th>
               <td><?= $banner->created_by  ?></td>
            </tr>
            <tr>
               <th>status</th>
               <td><?= $banner->status == 1 ? 'Xuất bản' : 'Chưa xuất bản' ?></td>
            </tr>
         </tbody>
      </table>

   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php" ?>