<?php
function set_flash($name, $arr_message = array())
{
    $_SESSION[$name] = $arr_message;
}

function get_flash($name)
{
    $tmp = $_SESSION[$name];
    unset($_SESSION[$name]);
    return $tmp;
}
function exists_flash($name)
{
    return isset($_SESSION[$name]);
}

function str_slug($slug)
{
    $slug = html_entity_decode($slug);
    $slug = preg_replace("/(å|ä|ā|à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|ä|ą)/", 'a', $slug);
    $slug = preg_replace("/(ß|ḃ)/", "b", $slug);
    $slug = preg_replace("/(ç|ć|č|ĉ|ċ|¢|©)/", 'c', $slug);
    $slug = preg_replace("/(đ|ď|ḋ|đ)/", 'd', $slug);
    $slug = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|ę|ë|ě|ė)/", 'e', $slug);
    $slug = preg_replace("/(ḟ|ƒ)/", "f", $slug);
    $slug = str_replace("ķ", "k", $slug);
    $slug = preg_replace("/(ħ|ĥ)/", "h", $slug);
    $slug = preg_replace("/(ì|í|î|ị|ỉ|ĩ|ï|î|ī|¡|į)/", 'i', $slug);
    $slug = str_replace("ĵ", "j", $slug);
    $slug = str_replace("ṁ", "m", $slug);
    $slug = preg_replace("/(ö|ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|ö|ø|ō)/", 'o', $slug);
    $slug = str_replace("ṗ", "p", $slug);
    $slug = preg_replace("/(ġ|ģ|ğ|ĝ)/", "g", $slug);
    $slug = preg_replace("/(ü|ù|ú|ū|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|ü|ų|ů)/", 'u', $slug);
    $slug = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ|ÿ)/", 'y', $slug);
    $slug = preg_replace("/(ń|ñ|ň|ņ)/", 'n', $slug);
    $slug = preg_replace("/(ŝ|š|ś|ṡ|ș|ş|³)/", 's', $slug);
    $slug = preg_replace("/(ř|ŗ|ŕ)/", "r", $slug);
    $slug = preg_replace("/(ṫ|ť|ț|ŧ|ţ)/", 't', $slug);
    $slug = preg_replace("/(ź|ż|ž)/", 'z', $slug);
    $slug = preg_replace("/(ł|ĺ|ļ|ľ)/", "l", $slug);
    $slug = preg_replace("/(ẃ|ẅ)/", "w", $slug);
    $slug = str_replace("æ", "ae", $slug);
    $slug = str_replace("þ", "th", $slug);
    $slug = str_replace("ð", "dh", $slug);
    $slug = str_replace("£", "pound", $slug);
    $slug = str_replace("¥", "yen", $slug);
    $slug = str_replace("ª", "2", $slug);
    $slug = str_replace("º", "0", $slug);
    $slug = str_replace("¿", "?", $slug);
    $slug = str_replace("µ", "mu", $slug);
    $slug = str_replace("®", "r", $slug);
    $slug = preg_replace("/(Ä|À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|Ą|Å|Ā)/", 'A', $slug);
    $slug = preg_replace("/(Ḃ|B)/", 'B', $slug);
    $slug = preg_replace("/(Ç|Ć|Ċ|Ĉ|Č)/", 'C', $slug);
    $slug = preg_replace("/(Đ|Ď|Ḋ)/", 'D', $slug);
    $slug = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|Ę|Ë|Ě|Ė|Ē)/", 'E', $slug);
    $slug = preg_replace("/(Ḟ|Ƒ)/", "F", $slug);
    $slug = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ|Ï|Į)/", 'I', $slug);
    $slug = preg_replace("/(Ĵ|J)/", "J", $slug);
    $slug = preg_replace("/(Ö|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ø)/", 'O', $slug);
    $slug = preg_replace("/(Ü|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|Ū|Ų|Ů)/", 'U', $slug);
    $slug = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ|Ÿ)/", 'Y', $slug);
    $slug = str_replace("Ł", "L", $slug);
    $slug = str_replace("Þ", "Th", $slug);
    $slug = str_replace("Ṁ", "M", $slug);
    $slug = preg_replace("/(Ń|Ñ|Ň|Ņ)/", "N", $slug);
    $slug = preg_replace("/(Ś|Š|Ŝ|Ṡ|Ș|Ş)/", "S", $slug);
    $slug = str_replace("Æ", "AE", $slug);
    $slug = preg_replace("/(Ź|Ż|Ž)/", 'Z', $slug);
    $slug = preg_replace("/(Ř|R|Ŗ)/", 'R', $slug);
    $slug = preg_replace("/(Ț|Ţ|T|Ť)/", 'T', $slug);
    $slug = preg_replace("/(Ķ|K)/", 'K', $slug);
    $slug = preg_replace("/(Ĺ|Ł|Ļ|Ľ)/", 'L', $slug);
    $slug = preg_replace("/(Ħ|Ĥ)/", 'H', $slug);
    $slug = preg_replace("/(Ṗ|P)/", 'P', $slug);
    $slug = preg_replace("/(Ẁ|Ŵ|Ẃ|Ẅ)/", 'W', $slug);
    $slug = preg_replace("/(Ģ|G|Ğ|Ĝ|Ġ)/", 'G', $slug);
    $slug = preg_replace("/(Ŧ|Ṫ)/", 'T', $slug);
    if (empty($slug)) return $slug;
    if (is_array($slug)) {
        foreach (array_keys($slug) as $key) {
            $slug[$key] = htmlspecialchars($slug[$key]); //nv_unhtmlspecialchars
        }
    } else {
        $search = array(
            '&amp;', '&#039;', '&quot;', '&lt;', '&gt;', '&#x005C;', '&#x002F;',
            '&#40;', '&#41;', '&#42;', '&#91;', '&#93;', '&#33;', '&#x3D;', '&#x23;',
            '&#x25;', '&#x5E;', '&#x3A;', '&#x7B;', '&#x7D;', '&#x60;', '&#x7E;'
        );
        $replace = array(
            '&', '\'', '"', '<', '>', '\\', '/', '(', ')', '*',
            '[', ']', '!', '=', '#', '%', '^', ':', '{', '}', '`', '~'
        );
        $slug = str_replace($search, $replace, $slug);
    }
    $slug = preg_replace("/(!|\"|#|$|%|'|̣)/", '', $slug);
    $slug = preg_replace("/(̀|́|̉|$|>)/", '', $slug);
    $slug = preg_replace("'<[\/\!]*?[^<>]*?>'si", "", $slug);
    $slug = str_replace("----", " ", $slug);
    $slug = str_replace("---", " ", $slug);
    $slug = str_replace("--", " ", $slug);
    $slug = preg_replace('/(\W+)/i', '-', $slug);
    $slug = str_replace(array(
        '-8220-', '-8221-', '-7776-'
    ), '-', $slug);
    //$slug = preg_replace( '/[^a-zA-Z0-9\-]+/e', '', $slug );
    $slug = str_replace(array(
        'dAg', 'DAg', 'uA', 'iA', 'yA', 'dA', '--', '-8230'
    ), array(
        'dong', 'Dong', 'uon', 'ien', 'yen', 'don', '-', ''
    ), $slug);
    $slug = preg_replace('/(\-)$/', '', $slug);
    $slug = preg_replace('/^(\-)/', '', $slug);
    return strtolower($slug);
}

function word_limit($str, $limit = 10)
{
    $arr = explode(' ', $str);
    $limit = ($limit <= 0) ? count($arr) : $limit;
    $limit = ($limit >= count($arr)) ? count($arr) : $limit;
    $a = array_slice($arr, 0, $limit);
    return implode(' ', $a);
}

class Pagination
{
    public static function pageCurrent()
    {
        $page = (isset($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
        $page = (is_numeric($page)) ? $page : 1;
        $page = ($page <= 0) ? 1 : $page;
        return $page;
    }
    public static function pageOffset($page, $limit)
    {
        return ($page - 1) * $limit;
    }
    public static function pageLinks($total, $current, $limit, $url = '')
    {
        if ($total == 0) return '';
        $numPage = ceil($total / $limit);
        if (($total / $limit) - $numPage > 0) {
            $numPage += 1;
        }
        $html = "<ul class='pagination-wrap'>";
        if ($numPage == 1) {
            return '';
        }
        if ($current == 1) {
            $html .= "<li class='page-item'><a class='page-link'>Trang đầu </a></li> ";
            $html .= "<li class='page-item'><a class='page-link'>
            <i class='bx bx-chevron-left'></i> </a></li> ";
        } else {
            $html .= "<li class='page-item'><a class='page-link' href='$url&page=1'>Trang đầu</a> </li> ";
            $html .= "<li class='page-item'><a class='page-link' href='$url&page=" . ($current - 1) . "'>
            <i class='bx bx-chevron-left'></i> </a></li> ";
        }
        if ($current <= 3) {
            for ($i = 1; ($i <= 5) and ($i <= $numPage); $i++) {
                if ($i == $current) {
                    $html .= "<li class='page-item'><a class='page-link'><span>" . $i . "</span></a></li>";
                } else {
                    $html .= "<li class='page-item'><a class='page-link' href='$url&page=$i'><span>$i</span></a></li>";
                }
            }
        } else {
            if ($numPage >= $current + 2) {
                for ($i = $current - 2; ($i <= $current + 2) and ($i <= $numPage); $i++) {
                    if ($i == $current) {
                        $html .= "<li class='page-item'><a class='page-link'><span>" . $i . "</span></a></li>";
                    } else {
                        $html .= "<li class='page-item'><a class='page-link' href='$url&page=$i'><span>$i</span></a> </li> ";
                    }
                }
            } else {
                for ($i = $numPage - 4; $i <= $numPage; $i++) {
                    if ($i > 0) {
                        if ($i == $current) {
                            $html .= "<li class='page-item'><a class='page-link'><span>" . $i . "</span></a></li>";
                        } else {
                            $html .= "<li class='page-item'><a class='page-link' href='$url&page=$i'><span>$i</span></a> </li> ";
                        }
                    }
                }
            }
        }
        if ($current == $numPage) {
            $html .= "<li class='page-item'>
                <a class='page-link'>
                  <i class='bx bx-chevron-right'></i>
                </a>
            </li> ";
            $html .= "<li class='page-item'><a class='page-link'>Trang cuối</a></li>";
        } else {
            $html .= "<li class='page-item'><a class='page-link' href='$url&page=" . ($current + 1) . "'>
           <i class='bx bx-chevron-right'></i></a></li> ";
            $html .= "<li class='page-item'><a class='page-link' href='$url&page=$numPage'>Trang cuối</a></li>";
        }
        $html .= "</ul>";
        return $html;
    }
}

class Cart
{
    public static function checkCart($id)
    {
        $carts = $_SESSION['cart'] ?? [];
        if (count($carts) > 0) {
            foreach ($carts as $item) {
                if ($item['id'] == $id) {
                    return true;
                }
            }
        }
        return false;
    }
    public static function posCart($id)
    {
        $carts = $_SESSION['cart'] ?? [];
        if (count($carts) > 0) {
            foreach ($carts as $pos => $item) {
                if ($item['id'] == $id) {
                    return $pos;
                }
            }
        }
        return -1;
    }
    public static function addCart($cart_item)
    {
        $carts = $_SESSION['cart'] ?? [];
        if (count($carts) > 0) {
            if (self::checkCart($cart_item['id']) == true) {
                $pos = self::posCart($cart_item['id']);
                $carts[$pos]['qty'] += $cart_item['qty'];
            } else {
                $carts[] = $cart_item;
            }
        } else {
            $carts[] = $cart_item;
        }
        $_SESSION['cart'] = $carts;
    }
    public static function cartContent()
    {
        return $_SESSION['cart'] ?? [];
    }
    public static function cartTotal()
    {
        $total = 0;
        $carts = $_SESSION['cart'] ?? [];
        if (count($carts) > 0) {
            foreach ($carts as $item) {
                $total += $item['qty'] * $item['price'];
            }
        }
        return $total;
    }
    public static function cartCount()
    {
        $count = 0;
        $carts = $_SESSION['cart'] ?? [];
        if (count($carts) > 0) {
            foreach ($carts as $item) {
                $count += $item['qty'];
            }
        }
        return $count;
    }
    public static function updateCart($id, $qty)
    {
        $carts = $_SESSION['cart'] ?? [];
        if (count($carts) > 0) {
            foreach ($carts as $pos => $item) {
                if ($item['id'] == $id) {
                    if ($qty == 0) {
                        unset($carts[$pos]);
                    } else {
                        $carts[$pos]['qty'] = $qty;
                    }
                }
            }
        }
        $_SESSION['cart'] = $carts;
    }
    public static function deleteCart($id)
    {
        $carts = $_SESSION['cart'] ?? [];
        if (count($carts) > 0) {
            foreach ($carts as $pos => $item) {
                if ($item['id'] == $id) {
                    unset($carts[$pos]);
                }
            }
        }
        $_SESSION['cart'] = $carts;
    }
}
