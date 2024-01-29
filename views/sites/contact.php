<?php

use App\Models\Contact;

if (isset($_REQUEST['SEND'])) {
    $contact = new Contact();
    $contact->name = $_REQUEST['name'];
    $contact->email = $_REQUEST['email'];
    $contact->phone = $_REQUEST['phone'];
    $contact->title = $_REQUEST['title'];
    $contact->content = $_REQUEST['content'];
    $contact->created_at = date('Y-m-d H:i:s');
    $contact->status = 1;

    $contact->save();
}
$title = 'Liên hệ';
?>

<?php require_once 'views/sites/header.php' ?>

<main class="contact-page">
    <form action="index.php?opt=contact" method="post">
        <div class="container">
            <section class="breadcrumbs-wrap">
                <ul class="breadcrumbs-list">
                    <li>
                        <a href="index.php">Trang chủ</a>
                        <span>&nbsp;/&nbsp;</span>
                    </li>
                    <li>
                        <a href="#">Liên hệ</a>
                    </li>
                </ul>
            </section>
            <section class="contact-page__wrap">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.746776096385!2d106.77242407468411!3d10.830680489321376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317526ffdc466379%3A0x89b09531e82960d!2zMjAgVMSDbmcgTmjGoW4gUGjDuiwgUGjGsOG7m2MgTG9uZyBCLCBRdeG6rW4gOSwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oIDcwMDAwMCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1692683712719!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                <div class="contact-page__form">
                    <div class="form-wrap">
                        <fieldset class="form-group">
                            <label for="name">Họ và tên</label>
                            <input type="text" name="name" autocomplete="off" id="name" class="form-control">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" name="phone" autocomplete="off" id="phone" class="form-control">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" autocomplete="off" id="email" class="form-control">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="title">Tiêu đề</label>
                            <input type="text" name="title" autocomplete="off" id="title" class="form-control">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="content">Nội dung</label>
                            <textarea name="content" id="content" class="form-control"></textarea>
                        </fieldset>
                    </div>
                    <div class="contact-page__btn">
                        <button type="submit" name="SEND" class="action-submit">
                            Gửi liên hệ
                        </button>
                    </div>
                </div>
            </section>
        </div>
    </form>
</main>

<?php require_once 'views/sites/footer.php' ?>