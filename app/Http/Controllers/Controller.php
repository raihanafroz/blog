<?php
/**
 * Created by PhpStorm V 2017.3.1
 * Author  MD. Raihan Afroz
 * User: Raihan
 * Date: 2/7/2021
 * Time: 9:56 AM
 */


namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
