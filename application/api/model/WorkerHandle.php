<?php

namespace app\api\model;

use think\Db;
use think\model\concern\SoftDelete;
use app\api\model\admin\LinUser;

class WorkerHandle extends BaseModel
{
    use SoftDelete;
    protected $autoWriteTimestamp = true;
    protected $hidden = ['lin_user_id','create_time','update_time','delete_time'];

    public function user(){
        return $this->belongsTo('LinUser','lin_user_id','id');
    }

}