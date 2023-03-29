<?php
namespace Grape\Http\Controllers\Admin;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

/*
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
*/


use Grape\Http\Controllers\Controller as BaseController;

abstract class Controller extends BaseController { 

    protected $path = "grape::admin.";
    
}