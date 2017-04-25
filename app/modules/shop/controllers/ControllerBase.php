<?php
namespace App\Modules\Shop\Controllers;

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    protected $result=[
        'code'=>0,
        'data'=>[],
        'msg'=>''
    ];
}
