<?php

namespace app\api\controller\v1;

use app\api\model\WorkerHandle as WorkerHandleModel;
use think\facade\Request;

class WorkerHandle
{
    /**
     * 查询所有的问题处理记录
     * @return mixed
     */
    public function getHandles() {
        $result = WorkerHandleModel::all();
        return $result;
    }

    public function getWorkerHandles($id)
    {
        $result = WorkerHandleModel::with('user')->where('worker_id','=',$id)->select();
        return $result;
    }

    public function addHandles(Request $request)
    {
        $params = $request->post();
        WorkerHandleModel::create($params);
        return writeJson(201, '', '处理问题成功');
    }

    public function editHandle(Request $request)
    {
        $params = $request->put();
        $workerHandleModel = new WorkerHandleModel();
        $workerHandleModel->save($params, ['id' => $params['id']]);
        return writeJson(201, '', '更新图书成功');
    }

    public function delHandle($hid)
    {
        WorkerHandleModel::destroy($hid);
        Hook::listen('logger', '删除了id为' . $hid . '的问题');
        return writeJson(201, '', '删除问题成功');
    }
}