<?php
namespace App\Modules\Gxc\Controllers;

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    protected $result=[
        'code'=>0,
        'data'=>[],
        'msg'=>''
    ];


}
