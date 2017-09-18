<?php

namespace Home\Controller;

use Think\Controller;

class CommonController extends Controller
{
    public function _initialize()
    {
        $config = M('config')->field('config_name,config_value')->select();
        $config = array_column($config, 'config_value', 'config_name');

        $wechat = M('image')->where("id IN(4,5,6)")->select();
        $wechat = array_column($wechat, 'image_url', 'image_type_name');

        $this->assign('config', $config);
        $this->assign('wechat', $wechat);
    }

}