<?php

namespace Home\Controller;
class IndexController extends CommonController
{
    public function index()
    {
        // 公司介绍
        $abstract = M('abstract')->field('ab_image,ab_content')->find(1);
        // 创始人介绍
        $founder = M('founder')->field('fd_image,fd_content')->find(1);

        // 企业文化
        $culture = M('culture')->field('cul_title,cul_desc')->select();

        // 公司愿景
        $wish = M('wish')->field('wish_title,wish_desc')->select();

        // 服务项目
        $advice = M('advice')->field('advice_title,id')->where('advice_show_status = "启用"')->order("advice_sort desc")->select();

        // 公司动态
        $active = M('active')->field('active_name,active_img_url')->where("active_show_status = '启用'")->select();

        //服务客户
        $customer = M('customer')->field('customer_name,customer_logo_url')->where("customer_show_status = '启用'")->select();

        //首页轮播图
        $lunbo = M('image')->field('image_url')->where("id IN(1,2,3)")->select();

        $this->assign(array(
            'abstract' => $abstract,
            'founder' => $founder,
            'culture' => $culture,
            'wish' => $wish,
            'advice' => $advice,
            'active' => $active,
            'customer' => $customer,
            'lunbo' => $lunbo,
        ));
        layout(true);
        $this->display();
    }

    public function advice()
    {
        layout(true);
        // 服务项目
        $advice = M('advice')->field('advice_title,advice_content')->where('advice_show_status = "启用"')->order("advice_sort desc")->select();
        $this->assign('advice', $advice);
        $this->display();
    }

    public function employ()
    {
        $employ = M('employ')->field('job_name,job_duty,job_require')->where('job_show_status = "启用"')->order("job_sort desc")->select();
        $this->assign('employ', $employ);
        layout(true);
        $this->display();
    }
}