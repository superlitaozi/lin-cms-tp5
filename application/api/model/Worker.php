<?php

namespace app\api\model;

use app\lib\exception\worker\WorkerException;
use think\Db;
use think\Exception;
use think\model\concern\SoftDelete;
use app\api\model\admin\LinUser;

class Worker extends BaseModel
{
    use SoftDelete;
    protected $autoWriteTimestamp = true;
    protected $hidden = ['create_time','update_time','delete_time'];

    public function workshopLine()
    {
        return $this->belongsTo('WorkshopLine','workshop_line_id','id');
    }

}