<?php
/**
 * 客户模型
 */

namespace Home\Model;

use Think\Model;

class CustomerModel extends Model
{
    //删除客户之前，先将客户logo删掉
    public function _before_delete($data)
    {
        $img_url = $this->field('customer_logo_url')->find($data['where']['id']);
        @unlink('./Uploads/' . $img_url['customer_logo_url']);
    }
}