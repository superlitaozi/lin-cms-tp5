<?php

namespace app\lib\exception\worker;

use LinCmsTp5\exception\BaseException;

class WorkerException extends BaseException
{
    public $code = 400;
    public $msg = '员工接口异常';
    public $error_code = '80000';
}