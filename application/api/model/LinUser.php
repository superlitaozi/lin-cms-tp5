<?php

namespace app\api\model;

use think\Model;
use think\model\concern\SoftDelete;

class LinUser extends Model
{
    use SoftDelete;
    protected $autoWriteTimestamp = true;
    protected $hidden = ['username','avatar','email','create_time','update_time','delete_time'];
}