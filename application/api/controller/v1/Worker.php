<?php

namespace app\api\controller\v1;

use app\api\service\token\LoginToken;
use app\api\model\Worker as WorkerModel;
use app\lib\exception\worker\WorkerException;
use LinCmsTp5\exception\BaseException;
use think\facade\Hook;
use think\facade\Request;

class Worker
{

    /**
     * @return array|\PDOStatement|string|\think\Collection|\think\model\Collection
     * @throws WorkerException
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * 获取所有员工信息
     */
    public function getAllWorkers()
    {
//        $rid = LoginToken.getToken();
//        $user = Token.getCurrentUser();
        $result = WorkerModel::with(['workshopLine'=>['workshop','Line']])->select();
        if($result->isEmpty()){
            throw new WorkerException([
                'msg' => '没有查询到任何员工'
            ]);
        }
        return $result;
    }

    /**
     * @param $id
     * @return \think\db\Query|null
     * @throws WorkerException
     * @throws \think\Exception\DbException
     * 通过ID查询员工信息
     *
     */
    public function getWorkerById($id)
    {
        $result = WorkerModel::with(['workshopLine'=>['workshop','Line']])->get($id);
        if($result->isEmpty()){
            throw new WorkerException([
                'msg' => '没有查询到此员工'
            ]);
        }
        return $result;
    }

    /**
     * @return \think\response\Json
     * @throws WorkerException
     * 新增员工
     */
    public function addWorker()
    {
        $params = Request::post();
        $worker = WorkerModel::create($params, true);
        if($worker->isEmpty()){
            throw new WorkerException([
                    'msg' => '增加员工失败'
            ]);
        }
        return writeJson(201, ['id' => $worker->id], '员工新增成功');
    }

    /**
     * @return \think\response\Json
     * @validate('WorkerForm.edit')
     */
    public function updateWorker($id)
    {
        $params = Request::patch();
        $worker = WorkerModel::get($id);
        if(!$worker) throw new BaseException(['msg'=>'id为'.$id.'的员工不存在']);
        $worker->save($params);
//        WorkerModel::update($params);
        return writeJson(201,[],'员工信息更新成功');
    }

    /**
     * @param $id
     * @return \think\response\Json
     */
    public function delWorker($wid)
    {
        WorkerModel::destroy($wid);
        Hook::listen('logger', '删除了id为' . $wid . '的员工');
        return writeJson(201, '', '删除员工成功');
    }


}