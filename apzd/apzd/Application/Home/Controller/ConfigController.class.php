<?php
/**
 * 系统设置 控制器
 */

namespace Home\Controller;

class ConfigController extends CommonController
{
    public function system()
    {
        $model = M('config');

        $configs = $model->select();
        $this->assign('configs', $configs);
        $this->display();
    }

    public function config()
    {
        if (IS_POST) {
            $model = M('config');

            $configs = $_POST['configs'];
            foreach ($configs as $k => $v) {
                $model->where('id=' . $k)->setField('config_value', $v[0]);
            }
            $this->ajaxReturn(array('status' => true, 'result' => '保存成功~'));
        }
    }
}