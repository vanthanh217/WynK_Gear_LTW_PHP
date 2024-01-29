<?php

use App\Models\Contact;

$id = $_REQUEST['id'];
$contact = Contact::find($id);
?>

<?php require_once "../views/admin/header.php" ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Chi tiết</h1>
      <div class="row mt-2 align-items-center">
         <div class="col-md-12 text-end">
            <a href="index.php?opt=contact" class="btn btn-primary btn-sm">
               <i class="fa fa-arrow-left"></i> Về danh sách
            </a>
            <a href="index.php?opt=contact&cat=reply&id=<?= $contact->id ?>" class="btn btn-success btn-sm">
               <i class="fa fa-edit"></i> Sửa
            </a>
            <a href="index.php?opt=contact&cat=delete&id=<?= $contact->id ?>" class="btn btn-danger btn-sm">
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
               <td><?= $contact->id ?></td>
            </tr>
            <tr>
               <th>Họ và Tên</th>
               <td><?= $contact->name ?></td>
            </tr>
            <tr>
               <th>email</th>
               <td><?= $contact->email ?></td>
            </tr>
            <tr>
               <th>phone</th>
               <td><?= $contact->phone ?></td>
            </tr>
            <tr>
               <th>Tiêu đề</th>
               <td><?= $contact->title ?></td>
            </tr>
            <tr>
               <th>Nội dung</th>
               <td><?= $contact->content ?></td>
            </tr>
            <tr>
               <th>Reply Id</th>
               <td><?= $contact->reply_id ?></td>
            </tr>

            <tr>
               <th>Ngày tạo</th>
               <td><?= date_format($contact->created_at, "H:i:s d/m/Y ") ?></td>
            </tr>
            <tr>
               <th>Người tạo</th>
               <td><?= $contact->created_by ?></td>
            </tr>
            <tr>
               <th>Ngày sửa</th>
               <td><?= date_format($contact->updated_at, "H:i:s d/m/Y ") ?></td>
            </tr>
            <tr>
               <th>Người sửa</th>
               <td><?= $contact->updated_by ?></td>
            </tr>
            <tr>
               <th>Trạng thái</th>
               <td><?= $contact->status ?></td>
            </tr>
         </tbody>
      </table>

   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php" ?>