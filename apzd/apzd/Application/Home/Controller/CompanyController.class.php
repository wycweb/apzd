<?php
/**
 * 公司管理控制器
 */

namespace Home\Controller;

use Think\Upload;

class CompanyController extends CommonController
{
    // 公司简介
    public function abstract_lst()
    {
        $model = M('abstract');
        $abData = $model->select();
        $this->assign('abData', $abData);
        $this->display();
    }

    // 公司简介修改
    public function abstract_save($id)
    {
        $model = M('abstract');

        if (IS_POST) {
            if ($msg = $model->create()) {
                $msg['ab_lastTime'] = date('Y-m-d H:i:s');
                //公司图片上传
                if (isset($_FILES['ab_image']['tmp_name']) && $_FILES['ab_image']['tmp_name']) {
                    $upload = new Upload();
                    $upload->maxsize = 10485760;
                    $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
                    $upload->savePath = 'abstract/';
                    $info = $upload->upload();
                    $path = $info['ab_image']['savepath'] . $info['ab_image']['savename'];
                    if ($info) {
                        $msg['ab_image'] = $path;
                        @unlink('./Uploads/' . $_POST['old_img']);
                    } else {
                        $this->ajaxReturn(array('status' => false, 'result' => $upload->getError()));
                        exit;
                    }
                }
                //修改
                if ($model->save($msg) !== false) {
                    $this->ajaxReturn(array('status' => true, 'result' => '修改成功~'));
                    exit;
                } else {
                    $this->ajaxReturn(array('status' => false, 'result' => '修改失败'));
                    exit;
                }
            } else {
                $this->ajaxReturn(array('status' => false, 'result' => '修改失败'));
                exit;
            }
        } else {
            $data = $model->find($id);
            $this->assign('data', $data);
            $this->display();
        }
    }

    // 创始人介绍
    public function founder_lst()
    {
        $model = M('founder');

        $fdData = $model->select();
        $this->assign('fdData', $fdData);
        $this->display();
    }

    // 创始人介绍修改
    public function founder_save($id)
    {
        $model = M('founder');

        if (IS_POST) {
            if ($msg = $model->create()) {
                $msg['fd_lastTime'] = date('Y-m-d H:i:s');
                //公司图片上传
                if (isset($_FILES['fd_image']['tmp_name']) && $_FILES['fd_image']['tmp_name']) {

                    $upload = new Upload();
                    $upload->maxsize = 5242880;
                    $upload->exts = array('jpg', 'gif', 'png', 'jpeg', 'JPG', 'PNG', 'JPEG', 'GIF');
                    $upload->savePath = 'founder/';
                    $info = $upload->upload();
                    $path = $info['fd_image']['savepath'] . $info['fd_image']['savename'];
                    if ($info) {
                        $msg['fd_image'] = $path;
                        @unlink('./Uploads/' . $_POST['old_img']);
                    } else {
                        $this->ajaxReturn(array('status' => false, 'result' => $upload->getError()));
                        exit;
                    }
                }

                //修改
                if ($model->save($msg) !== false) {

                    $this->ajaxReturn(array('status' => true, 'result' => '修改成功~'));
                    exit;
                } else {

                    $this->ajaxReturn(array('status' => false, 'result' => '修改失败'));
                    exit;
                }

            } else {
                $this->ajaxReturn(array('status' => false, 'result' => '修改失败'));
                exit;
            }
        } else {
            $data = $model->find($id);
            $this->assign('data', $data);
            $this->display();
        }
    }

    //企业文化列表
    public function culture_lst()
    {
        $culData = M('culture')->select();
        $this->assign('culData', $culData);
        $this->display();
    }

    public function culture_add()
    {
        if (IS_POST) {
            $model = M('culture');
            if ($info = $model->create()) {
                $info['cul_time'] = date("Y-m-d H:i:s");
                if ($model->add($info)) {
                    $this->ajaxReturn(array('status' => true, 'result' => '添加成功~'));
                    exit;
                } else {
                    $this->ajaxReturn(array('status' => false, 'result' => '添加失败'));
                    exit;
                }
            } else {
                $this->ajaxReturn(array('status' => false, 'result' => '添加失败'));
                exit;
            }
        }
        $this->display();
    }

    public function culture_save($id)
    {
        if (IS_POST) {
            $model = D('culture');
            if ($model->create()) {
                if ($model->save() !== false) {
                    $this->ajaxReturn(array('status' => true, 'result' => '修改成功'));
                    exit;
                } else {
                    $this->ajaxReturn(array('status' => false, 'result' => '修改失败'));
                    exit;
                }
            } else {
                $this->ajaxReturn(array('status' => false, 'result' => '修改失败'));
                exit;
            }
        }
        $data = M('culture')->find($id);
        $this->assign('data', $data);
        $this->display();
    }

    public function culture_delete($id)
    {
        $model = D('culture');

        if ($model->delete($id)) {
            $this->ajaxReturn(array('status' => true, 'result' => '删除成功~'));
        } else {
            $this->ajaxReturn(array('status' => false, 'result' => '删除失败！'));
        }
    }

    //企业愿景列表
    public function wish_lst()
    {
        $wishData = M('wish')->select();
        $this->assign('wishData', $wishData);
        $this->display();
    }

    public function wish_add()
    {
        if (IS_POST) {
            $model = M('wish');
            if ($info = $model->create()) {
                $info['wish_time'] = date("Y-m-d H:i:s");
                if ($model->add($info)) {
                    $this->ajaxReturn(array('status' => true, 'result' => '添加成功~'));
                    exit;
                } else {
                    $this->ajaxReturn(array('status' => false, 'result' => '添加失败'));
                    exit;
                }
            } else {
                $this->ajaxReturn(array('status' => false, 'result' => '添加失败'));
                exit;
            }
        }
        $this->display();
    }

    public function wish_save($id)
    {
        if (IS_POST) {
            $model = D('wish');
            if ($model->create()) {
                if ($model->save() !== false) {
                    $this->ajaxReturn(array('status' => true, 'result' => '修改成功'));
                    exit;
                } else {
                    $this->ajaxReturn(array('status' => false, 'result' => '修改失败'));
                    exit;
                }
            } else {
                $this->ajaxReturn(array('status' => false, 'result' => '修改失败'));
                exit;
            }
        }
        $data = M('wish')->find($id);
        $this->assign('data', $data);
        $this->display();
    }

    public function wish_delete($id)
    {
        $model = D('wish');

        if ($model->delete($id)) {
            $this->ajaxReturn(array('status' => true, 'result' => '删除成功~'));
        } else {
            $this->ajaxReturn(array('status' => false, 'result' => '删除失败！'));
        }
    }

}