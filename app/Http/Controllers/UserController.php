<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
 public function register(AuthRequest $request){
    $validated = $request->validated();
    $user = User::create([
        'name'=>$validated['name'],
        'phone'=>$validated['phone'],
        'password'=>bcrypt($validated['password'])
    ]);
    $token = $user->createToken('myapptoken')->plainTextToken;
    $response =[
        'user'=> $user,
        'token'=> $token
    ];
    return response($response,201);

 }

public function login(Request $request)
{
    $validated = $request->validate([
        'phone' =>'required|numeric|regex:01[0125][0-9]{8}',
        'password'=>'required|string'
    ]);

    $user = User::where('phone',$validated['phone'])->first();
    if(! $user || !Hash::check($validated['password'],$user->password)){
        return response([
            'message'=>'error phone or password please try again'
        ],401);}
        $token = $user ->createToken('myapptoken')->plainTextToken;
        $response = [
            'user'=> $user,
            'token'=> $token
        ];
        return response($response,201);


    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return [
            'message'=>'logout'
        ];

    }

}
