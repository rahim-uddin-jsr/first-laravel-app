<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetInfoWithSequrityKey extends Controller
{
    function __invoke(Request $request) {
        $key= $request['key'];
        $info=['info'=>'valid key'];
    if ($key==123456) {
    return response()->json($info)->header('content-type','application/json');
    }else{
    return response()->json(['status'=>'invalid key'], 200)->header('Content-Type', 'application/json');
    }
    }
}
