<?php 
class Route {
    public static function route_site() {
        $pathView = "views/sites/";
        if (!isset($_REQUEST['opt'])) {
            $pathView .= "home.php";
        } else {
            $pathView .= $_REQUEST['opt'];
            if (isset($_REQUEST['slug'])) {
                $pathView .= "-detail.php";
            } else {
                if (isset($_REQUEST['cat'])) {
                    $pathView .= "-category.php";
                } else {
                    $pathView .= ".php";
                }
            }
        }

        // if (file_exists($pathView)) {
            require_once $pathView;
        // } else {
        //     require_once "views/404.php";
        // }
    }

    public static function route_admin() {
        $pathView = "../views/admin/";
        if (!isset($_REQUEST['opt'])) {
            $pathView .= "dashboard/index.php";
        } else {
            $pathView .= $_REQUEST['opt'] . "/";
            if (!isset($_REQUEST['cat'])) {
                $pathView .= "index.php";
            } else {
                $pathView .= $_REQUEST['cat'] . ".php";
            }
        }

        // if (file_exists($pathView)) {
            require_once $pathView;
        // } else {
        //     require_once "../views/404.php";
        // }
    }
}