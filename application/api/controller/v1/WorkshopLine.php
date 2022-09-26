<?php

namespace app\api\controller\v1;

use app\api\model\WorkshopLine as WorkshopLineModel;

class WorkshopLine
{
    //联查产线名称
    public function getWorkshopLine()
    {
        $result = WorkshopLineModel::with('workshop,line')->select();
        return $result;
    }
}