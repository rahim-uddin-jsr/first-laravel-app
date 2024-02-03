<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function getUsers(){
        $users = [
            [
                'id' => 1,
                'username' => 'john_doe',
                'email' => 'john@example.com',
                'age' => 28,
            ],
            [
                'id' => 2,
                'username' => 'jane_smith',
                'email' => 'jane@example.com',
                'age' => 35,
            ],
            // Add more users as needed
        ];
        return response()->json($users,200,['content-type'=>'application/json']);
    }
}
