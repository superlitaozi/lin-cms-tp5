<?php

namespace app\api\validate\worker;

use LinCmsTp5\validate\BaseValidate;

class WorkerForm extends BaseValidate
{
    protected $rule = [
      'name' => 'require|chsDash',
    ];

}