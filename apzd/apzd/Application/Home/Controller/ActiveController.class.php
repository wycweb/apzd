<?php
/**
 * 活动动态 控制器
 */

namespace Home\Controller;

use Think\Upload;

class ActiveController extends CommonController
{
    //添加
    public function add()
    {
        if (IS_POST) {
            set_time_limit(0);
            $model = M('active');
            //未上传图片
            if (!isset($_FILES['active_img_url']['tmp_name']) || $_FILES['active_img_url']['tmp_name'] == "") {
                $this->ajaxReturn(array('status' => false, 'result' => '动态图片未上传！'));
                exit;
            }
            //图片处理
            if (isset($_FILES['active_img_url']['tmp_name']) && $_FILES['active_img_url']['tmp_name'] != "") {
                $upload = new Upload();
                $upload->maxsize = 10485760;
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg', 'JPG', 'PNG', 'JPEG', 'GIF');
                $upload->savePath = 'active/';
                $info = $upload->upload();
                $path = $info['active_img_url']['savepath'] . $info['active_img_url']['savename'];
                if ($info) {
                    $data['active_img_url'] = $path;
                } else {
                    $this->ajaxReturn(array('status' => false, 'result' => $upload->getError()));
                    exit;
                }
            }

            $data['active_name'] = $_POST['active_name'];
            $data['active_show_status'] = $_POST['active_show_status'];
            $data['active_time'] = date("Y-m-d H:i:s");

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
            $where .= " and active_name = '{$_GET['search']}'";
        }

        $model = M('active');
        $actData = $model->where($where)->select();
        $this->assign('actData', $actData);
        $this->display();
    }

    //修改
    public function save($id)
    {
        $model = M('active');

        if (IS_POST) {
            //图片处理
            if (isset($_FILES['active_img_url']['tmp_name']) && $_FILES['active_img_url']['tmp_name'] != "") {
                $upload = new Upload();
                $upload->maxsize = 5242880;
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg', 'JPG', 'PNG', 'JPEG', 'GIF');
                $upload->savePath = 'active/';
                $info = $upload->upload();
                $path = $info['active_img_url']['savepath'] . $info['active_img_url']['savename'];
                if ($info) {

//                    $image = new Image();
//                    $image->open('./Uploads/'.$path);
//                    $image->thumb(C('ACTIVE_IMAGE_WIDTH'), C('ACTIVE_IMAGE_HEIGHT'))->save('./Uploads/' . $path);
                    $data['active_img_url'] = $path;
                    @unlink('./Uploads/' . $_POST['old_img']);
                } else {

                    $this->ajaxReturn(array('status' => false, 'result' => $upload->getError()));
                    exit;
                }
            }
            $data['id'] = $_POST['id'];
            $data['active_name'] = $_POST['active_name'];
            $data['active_show_status'] = $_POST['active_show_status'];
            $data['active_content'] = $_POST['active_content'];

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
        $model = D('active');

        if ($model->delete($id)) {
            $this->ajaxReturn(array('status' => true, 'result' => '删除成功~'));
        } else {
            $this->ajaxReturn(array('status' => false, 'result' => '删除失败！'));
        }
    }

    //修改显示状态
    public function setShowStatus()
    {
        $model = M('active');
        $id = $_POST['id'];
        $status = $_POST['status'];
        if ($status) {
            if ($model->where('id=' . $id)->setField('active_show_status', '启用')) {
                $this->ajaxReturn(array('status' => true, 'result' => '已启用~'));
                exit;
            } else {
                $this->ajaxReturn(array('status' => false, 'result' => '启用失败！'));
                exit;
            }

        } else {
            if ($model->where('id=' . $id)->setField('active_show_status', '停用')) {
                $this->ajaxReturn(array('status' => true, 'result' => '已停用~'));
                exit;
            } else {
                $this->ajaxReturn(array('status' => false, 'result' => '停用失败！'));
                exit;
            }
        }
    }

}