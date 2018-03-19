<?php

namespace App\Http\Controllers;

use App\Jobs\SendVerifyCode;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function sendVerifyCode(Request $request) {
        dd($request->all());
        $this->validate($request, ['phone' => 'required|size:11|exists:users']);

        dispatch(new SendVerifyCode($request->phone));

        return ['success' => true];
    }
}
