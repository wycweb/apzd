<?php
/*
 * 系统首页 控制器
 */

namespace Home\Controller;

class IndexController extends CommonController
{
    //首页
    public function index()
    {
        $this->display();
    }

    //首页右侧页面home
    public function home()
    {
        //客户
        $cusModel = M('customer');

        $cusNum = $cusModel->count();

        //动态
        $actModel = M('active');
        $actNum = $actModel->count();

        //服务项目
        $serModel = M('advice');
        $serNum = $serModel->count();

        //职位
        $emModel = M('employ');
        $emNum = $emModel->count();

        $this->assign(array(
            'cusNum' => $cusNum,
            'actNum' => $actNum,
            'serNum' => $serNum,
            'emNum' => $emNum
        ));

        $this->display();
    }

    public function ajaxDelHTML()
    {
        $status = unlink_dir('../Application/Html');
        if ($status) {
            $this->ajaxReturn(array('status' => true, 'result' => '清除成功'));
        } else {
            $this->ajaxReturn(array('status' => false, 'result' => '清除失败，请稍后重试！'));
        }
    }

}