<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Stichoza\GoogleTranslate\GoogleTranslate;

class UserController extends Controller
{
    public function showUsers()
    {
        try
        {
            if(auth()->user()->role == 1 || auth()->user()->role == 2 || auth()->user()->role == 4)
            {
                $users = Users::all();
                return view('auth.users', compact('users'));
                // return response()->json(["rs" => $users],200);
            }
            else
            {
                return view('blocked');
            }
        }
        catch (Exception $ex)
        {
            return redirect()->to('/users');
        }
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
                else if(strcmp($key, '_token') == 0)
                {
                    continue;
                }
                $user->$key = $value;
            }
            $user->save();

            return response()->json(["result" => GoogleTranslate::trans('User succesfully modified', app()->getLocale()),
                                     "title" => GoogleTranslate::trans('¡Success!', app()->getLocale())], 200);
        }
        catch (Exception $ex)
        {
            return response()->json(["error" => $ex->getMessage(),
                                     "text" => GoogleTranslate::trans('An error occurred, please try again', app()->getLocale()),
                                     "title" => GoogleTranslate::trans('¡Error!', app()->getLocale())], 500);
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
                if(strcmp($key, '_token') == 0)
                {
                    continue;
                }
                $user->$key = $value;
            }
            $user->lang = 'en';
            $user->created_by = auth()->user()->_id;
            $user->save();

            return response()->json(["result" => GoogleTranslate::trans('User succesfully added', app()->getLocale()),
                                     "title" => GoogleTranslate::trans('¡Success!', app()->getLocale())], 200);
        }
        catch (Exception $ex)
        {
            return response()->json(["error" => $ex->getMessage(),
                                     "text" => GoogleTranslate::trans('An error occurred, please try again', app()->getLocale()),
                                     "title" => GoogleTranslate::trans('¡Error!', app()->getLocale())], 500);
        }
    }

    public function deleteUser($id)
    {
        try
        {
            if(strcmp($id, auth()->user()->_id) == 0)
            {
                return response()->json(["warning" => GoogleTranslate::trans('You can not delete yourself', app()->getLocale()), "title" => GoogleTranslate::trans('¡Attention!', app()->getLocale())], 200);
            }
            Users::find($id)->delete();
            return response()->json(["result" => GoogleTranslate::trans('User succesfully deleted', app()->getLocale()),
                                     "title" => GoogleTranslate::trans('¡Success!', app()->getLocale())], 200);
        }
        catch (Exception $ex)
        {
            return response()->json(["error" => $ex->getMessage(),
                                     "text" => GoogleTranslate::trans('An error occurred, please try again', app()->getLocale()),
                                     "title" => GoogleTranslate::trans('¡Error!', app()->getLocale())], 500);
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
            return response()->json(["error" => $ex->getMessage(),
                                     "text" => GoogleTranslate::trans('An error occurred, please try again', app()->getLocale()),
                                     "title" => GoogleTranslate::trans('¡Error!', app()->getLocale())], 500);
        }
    }

    public function changeField(Request $request)
    {
        try
        {
            Users::find(auth()->user()->_id)->update(
            [
                "personal_data" => $request->all(),
            ]);
            return response()->json(["result" => GoogleTranslate::trans('Data succesfully modified', app()->getLocale()),
                                     "title" => GoogleTranslate::trans('¡Success!', app()->getLocale())], 200);
        }
        catch (Exception $ex)
        {
            return response()->json(["error" => $ex->getMessage(),
                                     "text" => GoogleTranslate::trans('An error occurred, please try again', app()->getLocale()),
                                     "title" => GoogleTranslate::trans('¡Error!', app()->getLocale())], 500);
        }
    }
}
