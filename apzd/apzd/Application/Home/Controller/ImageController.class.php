<?php
/**
 * Created by PhpStorm.
 * User: huanglei_pc
 * Date: 2017/1/15
 * Time: 13:10
 */

namespace Home\Controller;

use Think\Upload;

class ImageController extends CommonController
{
    //列表
    public function lst()
    {
        $category = $_GET['category'];

        $model = M('image');

        $images = $model->where("category = '$category'")->select();
        $this->assign('images', $images);
        $this->display();
    }

    //修改
    public function save($id)
    {
        $model = M('image');

        if (IS_POST) {

            //图片处理
            if (isset($_FILES['image_url']['tmp_name']) && $_FILES['image_url']['tmp_name'] != "") {

                $upload = new Upload();
                $upload->maxsize = 10485760;
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
                $upload->savePath = 'image/';
                $info = $upload->upload();
                $path = $info['image_url']['savepath'] . $info['image_url']['savename'];
                if ($info) {

//                    $image = new Image();
//                    $image->open('./Uploads/'.$path);
//                    $image->thumb(C('LUNBO_IMAGE_WIDTH'), C('LUNBO_IMAGE_HEIGHT'))->save('./Uploads/' . $path);
                    $data['image_url'] = $path;
                    @unlink('./Uploads/' . $_POST['old_img']);
                } else {

                    $this->ajaxReturn(array('status' => false, 'result' => $upload->getError()));
                    exit;
                }
            }
            $data['id'] = $_POST['id'];
            $data['image_last_update_time'] = date("Y-m-d H:i:s");
            $data['image_show_status'] = $_POST['image_show_status'];
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

}