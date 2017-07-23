<?php

namespace Home\Model;

use Think\Model;

class EmployModel extends Model
{
    public function _before_insert(&$data)
    {
        $data['job_duty'] = implode(',', $data['job_duty']);
        $data['job_require'] = implode(',', $data['job_require']);
        $data['job_time'] = date("Y-m-d H:i:s");
    }

    public function _before_update(&$data)
    {
        $data['job_duty'] = implode(',', $data['job_duty']);
        $data['job_require'] = implode(',', $data['job_require']);
    }


}