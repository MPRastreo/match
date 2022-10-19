<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LangController extends Controller
{
    public function changeLanguage(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
        $user = Users::find(auth()->user()->_id);
        $user->lang = $request->lang;
        $user->save();
        return redirect()->back();
    }
}
