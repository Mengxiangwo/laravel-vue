<?php
/**
 * Created by PhpStorm.
 * User: 10643
 * Date: 2017/5/26
 * Time: 19:13
 */

namespace App\Http\Controllers;

use App\Models\User;

class UserController
{
    public function user(){
        throw new \Exception("这只是一个测试", 1);
        $data = User::find(1);

        return $data['name'];
    }
}