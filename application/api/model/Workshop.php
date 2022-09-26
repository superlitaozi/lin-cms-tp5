<?php

namespace app\api\model;

use think\model\concern\SoftDelete;

class Workshop extends BaseModel
{
    use SoftDelete;
    protected $autoWriteTimestamp = true;
    protected $hidden = ['create_time','update_time','delete_time'];

}