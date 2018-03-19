<?php
/**
 * Created by PhpStorm.
 * User: 10643
 * Date: 2017/5/26
 * Time: 19:13
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;

class RequestController extends Controller
{
    public function index(Request $request){
        return view('request');
    }

    public function test(Request $request) {
        $request->file1->storeAs('images', 'filename.png');
    }
}