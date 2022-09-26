<?php

namespace app\api\controller\v1;

use app\api\model\WorkshopLine as WorkshopLineModel;

class WorkshopLine
{
    public function getWorkshopLine()
    {
        $result = WorkshopLineModel::with('workshop,line')->select();
        return $result;
    }
}