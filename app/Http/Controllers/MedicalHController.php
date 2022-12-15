<?php

namespace App\Http\Controllers;

use App\Models\Familys;
use Exception;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Http\Request;
use stdClass;
use GoogleTranslate;

class MedicalHController extends Controller
{
    public function index()
    {
        $clinicalH = [];
        set_time_limit('120');
        try
        {
            if (auth()->user()->role == 1 || auth()->user()->role == 2 || auth()->user()->role == 3)
            {
                $years = range(1900, strftime("%Y", time()));
                rsort($years, SORT_NUMERIC);
                $family = Familys::where('id_usuario', '=', auth()->user()->_id)->get();
                $history = Familys::where('id_usuario', '=', auth()->user()->_id)->get();
                // $clinicalH = Familys::where('id_usuario', '=', auth()->user()->_id)->get();
                return view('auth.clinicalHistorie', compact('years', 'family', 'history'));
            }
            else
            {
                return view('blocked');
            }
        }
        catch (ConnectException $cex)
        {
            return redirect('/clinicalHistorie');
        }
    }

    public function saveClinicalHistorie(Request $request)
    {
        try
        {
            $relative = Familys::find($request->clinical_history['familiar_id']);
            $relative->clinical_history = $request->clinical_history;
            $relative->save();

            return response()->json(["result" => ucwords(GoogleTranslate::justTranslate('Clinical Historie succesfully saved', app()->getLocale())),
                                     "title" => ucwords(GoogleTranslate::justTranslate('¡Success!', app()->getLocale()))], 200);
        }
        catch (Exception $ex)
        {
            return response()->json(["error" => $ex->getMessage(),
                                     "text" => ucwords(GoogleTranslate::justTranslate('An error occurred, please try again', app()->getLocale())),
                                     "title" => ucwords(GoogleTranslate::justTranslate('¡Error!', app()->getLocale()))], 500);
        }
    }

    public function getClinicalHistoryByID($id)
    {
        try
        {
            $clinical_history = Familys::find($id);
            return response()->json($clinical_history, 200);
        }
        catch (Exception $ex)
        {
            return response()->json(["error" => $ex->getMessage(),
                                     "text" => ucwords(GoogleTranslate::justTranslate('An error occurred, please try again', app()->getLocale())),
                                     "title" => ucwords(GoogleTranslate::justTranslate('¡Error!', app()->getLocale()))], 500);
        }
    }
}
