<?php
/**
 * 客户展示 控制器
 */

namespace Home\Controller;

use Think\Image;
use Think\Upload;

class CustomerController extends CommonController
{
    //添加
    public function add()
    {
        if (IS_POST) {
            $model = M('customer');

            //未上传图片
            if (!isset($_FILES['customer_logo_url']['tmp_name']) || $_FILES['customer_logo_url']['tmp_name'] == "") {
                $this->ajaxReturn(array('status' => false, 'result' => '客户logo未上传！'));
                exit;
            }
            //图片处理
            if (isset($_FILES['customer_logo_url']['tmp_name']) && $_FILES['customer_logo_url']['tmp_name'] != "") {
                $upload = new Upload();
                $upload->maxsize = 10485760;
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg', 'JPG', 'PNG', 'JPEG', 'GIF');
                $upload->savePath = 'customer/';
                $info = $upload->upload();
                $path = $info['customer_logo_url']['savepath'] . $info['customer_logo_url']['savename'];

                if ($info) {
                    $data['customer_logo_url'] = $path;
                } else {
                    $this->ajaxReturn(array('status' => false, 'result' => $upload->getError()));
                    exit;
                }
            }

            $data['customer_name'] = $_POST['customer_name'];
            $data['customer_show_status'] = $_POST['customer_show_status'];
            $data['customer_time'] = date("Y-m-d H:i:s");

            if ($model->add($data)) {
                $this->ajaxReturn(array('status' => true, 'result' => '添加成功~'));
                exit;
            } else {
                $this->ajaxReturn(array('status' => false, 'result' => '添加失败，请刷新重试'));
                exit;
            }
        } else {
            $this->display();
        }
    }

    //列表
    public function lst()
    {
        $where = "1";
        if (isset($_GET['search']) && $_GET['search']) {
            $where .= " and customer_name = '{$_GET['search']}'";
        }

        $model = M('customer');

        $cusData = $model->where($where)->select();
        $this->assign('cusData', $cusData);
        $this->display();
    }

    //修改
    public function save($id)
    {
        $model = M('customer');

        if (IS_POST) {

            //图片处理
            if (isset($_FILES['customer_logo_url']['tmp_name']) && $_FILES['customer_logo_url']['tmp_name'] != "") {

                $upload = new Upload();
                $upload->maxsize = 5242880;
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg', 'JPG', 'PNG', 'JPEG', 'GIF');
                $upload->savePath = 'customer/';
                $info = $upload->upload();
                $path = $info['customer_logo_url']['savepath'] . $info['customer_logo_url']['savename'];
                if ($info) {

                    $image = new Image();
                    $image->open('./Uploads/' . $path);
                    $image->thumb(C('CUSTOMER_IMAGE_WIDTH'), C('CUSTOMER_IMAGE_HEIGHT'))->save('./Uploads/' . $path);
                    $data['customer_logo_url'] = $path;
                    @unlink('./Uploads/' . $_POST['old_img']);
                } else {

                    $this->ajaxReturn(array('status' => false, 'result' => $upload->getError()));
                    exit;
                }
            }
            $data['id'] = $_POST['id'];
            $data['customer_name'] = $_POST['customer_name'];
            $data['customer_show_status'] = $_POST['customer_show_status'];
            $data['customer_desc_status'] = $_POST['customer_desc_status'];
            if ($data['customer_desc_status'] == "是") {

                $data['customer_desc_content'] = $_POST['customer_desc_content'];
            } else {
                $data['customer_desc_content'] = "";
            }


            if ($model->save($data) !== false) {

                $this->ajaxReturn(array('status' => true, 'result' => '修改成功~'));
                exit;
            } else {

                $this->ajaxReturn(array('status' => false, 'result' => '修改失败，请刷新重试'));
                exit;
            }
        } else {
            $data = $model->find($id);
            $this->assign('data', $data);
            $this->display();
        }

    }

    //删除
    public function delete($id)
    {
        $model = D('customer');

        if ($model->delete($id)) {
            $this->ajaxReturn(array('status' => true, 'result' => '删除成功~'));
        } else {
            $this->ajaxReturn(array('status' => false, 'result' => '删除失败！'));
        }
    }

    //修改显示状态
    public function setShowStatus()
    {
        $model = M('customer');

        $id = $_POST['id'];
        $status = $_POST['status'];
        if ($status) {
            if ($model->where('id=' . $id)->setField('customer_show_status', '启用')) {

                $this->ajaxReturn(array('status' => true, 'result' => '已启用~'));
                exit;
            } else {

                $this->ajaxReturn(array('status' => false, 'result' => '启用失败！'));
                exit;
            }

        } else {
            if ($model->where('id=' . $id)->setField('customer_show_status', '停用')) {

                $this->ajaxReturn(array('status' => true, 'result' => '已停用~'));
                exit;
            } else {

                $this->ajaxReturn(array('status' => false, 'result' => '停用失败！'));
                exit;
            }
        }
    }

    //排序
    public function sort()
    {
        $num = $_POST['num'];
        $id = $_POST['id'];

        $model = M('customer');

        if ($model->where('id=' . $id)->setField('customer_order', $num) !== false)
            $this->ajaxReturn(array('status' => true, 'result' => '更改成功~'));
        else
            $this->ajaxReturn(array('status' => false, 'result' => '更改失败！'));
    }

}