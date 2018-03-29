<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Queue;
use App\Console\Commands\sendEmail;

class DefaultController extends Controller
{
    public function index() {
        for($i = 0; $i < 30; $i ++) {
            Queue::push(new sendEmail("sendEmail:".$i));
        }
    }
}
