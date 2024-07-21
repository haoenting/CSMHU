<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Action;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller{
    public function register(Request $request) {
        // validate request parameters
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:20',
            'account' => 'required|alpha_num|max:20',
            'password' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false, 
                'message' => '資料規格有誤!']);
        }

        if (Employee::where('account', $request->input('account'))->exists()) {
            return response()->json([
                'success' => false,
                'message' => '帳號已經存在!'
            ]);
        }
        // create new user
        Employee::create([
            'username' => $request->input('username'),
            'account' => $request->input('account'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Record operation Register
        Action::create([
            'username' => $request->input('username'),
            'action' => 'Register',
        ]);

        return response()->json([
            'success' => true, 
            'message' => '註冊成功!']);
    }

    public function login(Request $request){
        // check the currect mathod
        if (!$request->isMethod('post')) {
            return response()->json([
                'success' => false, 
                'message' => 'Method not allowed']);
        }
        
        // check the illegal characters
        $validator = Validator::make($request->all(), [
            'account' => 'required|alpha_num|max:20',
            'password' => 'required|string|max:20',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false, 
                'message' => '輸入非法字元']);
        }

        // check the account
        $employee = Employee::where('account', $request->input('account'))->first();
        
        if (!$employee) {
            return response()->json([
                'success' => false, 
                'message' => '帳號不存在']);
        }
        // check if password matches
        if (!password_verify($request->input('password'), $employee->password)) {
            return response()->json([
                'success' => false, 
                'message' => '密碼錯誤']);
        }
        
        // Record operation Login
        Action::create([
            'username' => $employee->username,
            'action' => 'Login',
        ]);

        return response()->json([
            'success' => true,
            'username' => $employee->username,
        ]);
    }
}
