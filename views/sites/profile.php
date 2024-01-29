<?php
if (isset($_REQUEST['info'])) {
    require_once 'views/sites/profile-info.php';
}

if (isset($_REQUEST['changepassword'])) {
    require_once 'views/sites/profile-changepassword.php';
}
