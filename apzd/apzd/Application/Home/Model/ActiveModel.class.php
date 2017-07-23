<?php
/**
 * 客户模型
 */

namespace Home\Model;

use Think\Model;

class ActiveModel extends Model
{
    public function _before_delete($data)
    {
        $active = $this->field('active_img_url')->find($data['where']['id']);
        @unlink('./Uploads/' . $active['active_img_url']);
    }
}