<?php
/**
 * 基础控制器
 */

namespace Home\Controller;

use Think\Controller;

class CommonController extends Controller
{
    public function _initialize()
    {
        $chkLogin = false;

        if (isset($_COOKIE['user']) && isset($_COOKIE['pass'])) {
            $chkLogin = D('user')->login($_COOKIE['user'], $_COOKIE['pass']);
        }

        //判断session是否存在，或者，是否选择了一周免登陆
        if (!(isset($_SESSION['username']) || $chkLogin)) {
            if (IS_AJAX) {
                $url = 'http://127.0.0.1' . U('Login/login');
                echo json_encode(array('url' => $url));
                exit;
            }
            $url = 'http://127.0.0.1' . U('Login/login');
            echo "<script>top.location.href='{$url}'</script>";
            exit;
        }

    }
}