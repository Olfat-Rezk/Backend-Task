<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function numberUsers(){
        $num = 'SELECT COUNT (`id`)FROM users';
        return response()->json([
            'status' =>'true',
            'message' =>'Number of users ',
            'numUsers' => $num
        ],200);
    }
    public function postNum(){
        $num = 'SELECT COUNT (`id`)FROM posts';
        return response()->json([
            'status' =>'true',
            'message' =>'Number of users ',
            'postnums' => $num
        ],200);
    }
    public function userWithNoPost(){
        $user ='SELECT
        `users`.`name`,
        `posts`.`title`,
        FROM `users`
        LEFT JION `posts`
        ON `users`.`id`=`posts`.`user_id` ';
        return response()->json([
            'status' =>'true',
            'message' =>'Number of users ',
            'userWithNoPost' => $user
        ],200);

    }
}
