<?php

namespace app\api\model;

use think\Db;
use think\model\concern\SoftDelete;
use app\api\model\admin\LinUser;

class Line extends BaseModel
{
    use SoftDelete;
    protected $autoWriteTimestamp = true;
    protected $hidden = ['create_time','update_time','delete_time'];
}