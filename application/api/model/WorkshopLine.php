<?php

namespace app\api\model;

use think\Db;
use think\model\concern\SoftDelete;
use app\api\model\admin\LinUser;

class WorkshopLine extends BaseModel
{
    use SoftDelete;
    protected $autoWriteTimestamp = true;
    protected $hidden = ['create_time','update_time','delete_time'];

    public function workshop()
    {
        return $this->hasOne('Workshop','id','workshop_id');
    }

    public function line()
    {
        return $this->hasOne('Line','id','line_id');
    }


}