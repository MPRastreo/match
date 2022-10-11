<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function showUsers()
    {
        $users = Users::all();
        return view('auth.users', compact('users'));
    }

    public function editUser(Request $request, $id)
    {
        try
        {
            $userR = $request->all();
            $user = Users::find($id);
            foreach($userR as $key => $value)
            {
                if(strcmp($key, 'password') == 0)
                {
                    if(strlen($value) < 60)
                    {
                        $value = Hash::make($value);
                    }
                }
                $user->$key = $value;
            }
            $user->save();

            return response()->json(["result" => "User succesfully modified"], 200);
        }
        catch (Exception $ex)
        {
            return response()->json(["error" => $ex->getMessage()], 500);
        }
    }


    public function addUser(Request $request)
    {
        try
        {
            $userR = $request->all();
            $userR['password'] = Hash::make($request['password']);
            $user = new Users();
            foreach($userR as $key => $value)
            {
                $user->$key = $value;
            }
            $user->save();

            return response()->json(["result" => "User succesfully added"], 200);
        }
        catch (Exception $ex)
        {
            return response()->json(["error" => $ex->getMessage()], 500);
        }
    }

    public function deleteUser($id)
    {
        try
        {
            if(strcmp($id, auth()->user()->_id) == 0)
            {
                return response()->json(["warning" => "You can not delete yourself"], 200);
            }
            Users::find($id)->delete();
            return response()->json(["result" => "User succesfully deleted"], 200);
        }
        catch (Exception $ex)
        {
            return response()->json(["error" => $ex->getMessage()], 500);
        }
    }

    public function getUserByID($id)
    {
        try
        {
            $user = Users::find($id);
            return response()->json($user, 200);
        }
        catch (Exception $ex)
        {
            return response()->json(["error" => $ex->getMessage()], 500);
        }
    }
}
