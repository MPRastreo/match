<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Exception;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use GoogleTranslate;
use stdClass;

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

    public function translateAlerts(Request $request)
    {
        try
        {
            $translation = new stdClass();
            $translation->title = GoogleTranslate::justTranslate($request->title, auth()->user()->lang);
            $translation->text = GoogleTranslate::justTranslate($request->text, auth()->user()->lang);

            return response()->json($translation, 200);
        }
        catch (Exception $ex)
        {
            return response()->json(["error" => $ex->getMessage()], 500);
        }
    }
}
