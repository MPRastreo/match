<?php

namespace App\Http\Controllers;

use App\Models\ClinicalHistorie;
use App\Models\Familys;
use App\Models\Users;
use Exception;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Http\Request;
use stdClass;
use GoogleTranslate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MedicalHController extends Controller
{
    public function index()
    {
        $clinicalH = [];
        $clinicalHComplete = [];
        $clinicalHUncomplete = [];
        set_time_limit('120');
        try
        {
            if (auth()->user()->role == 1 || auth()->user()->role == 2 || auth()->user()->role == 3)
            {
                $years = range(1900, strftime("%Y", time()));
                rsort($years, SORT_NUMERIC);
                $family = Familys::where('id_usuario', '=', auth()->user()->_id)->get()->toArray();
                $user = (object) auth()->user();
                array_push($family, $user);
                for ($i = 0; $i < sizeof($family); $i++)
                {
                    if (isset($family[$i]['id_clinical']))
                    {
                        $clinical_history = ClinicalHistorie::find($family[$i]['id_clinical']);
                        $family[$i]['clinical_history'] = $clinical_history;
                        unset($family[$i]->id_clinical);
                    }
                    else
                    {
                        $family[$i]['clinical_history'] = null;
                    }
                }

                if(isset($family))
                {
                    foreach($family as $f)
                    {
                        if($f['clinical_history'] != null && $f['clinical_history']['progress'] < 100)
                        {
                            array_push($clinicalHUncomplete, $f);
                        }
                        else if(isset($f['clinical_history']['progress']))
                        {
                            if($f['clinical_history']['progress'] == 100)
                            {
                                array_push($clinicalHComplete, $f);
                            }
                        }
                    }
                }

                // return $clinicalHUncomplete;

                return view('auth.clinicalHistorie', compact('years', 'clinicalHUncomplete', 'clinicalHComplete', 'family'));
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
            $_idClinical = null;
            if(isset($request->clinical_history['_id']))
            {
                $clinicalH = ClinicalHistorie::find($request->clinical_history['_id']);
                foreach($request->clinical_history as $key => $value)
                {
                    $clinicalH->$key = $value;
                }
                $clinicalH->save();
            }
            else
            {
                $clinicalH = new ClinicalHistorie();
                foreach($request->clinical_history as $key => $value)
                {
                    $clinicalH->$key = $value;
                }
                $clinicalH->save();
                $_idClinical = $clinicalH->_id;

                $family = Familys::find($request->clinical_history['person_id']);
                if(isset($family))
                {
                    $family->id_clinical = $clinicalH->_id;
                    $family->save();
                }
                else
                {
                    $family = Users::find($request->clinical_history['person_id']);
                    $family->id_clinical = $clinicalH->_id;
                    $family->save();
                }
            }

            return response()->json(["result" => ucwords(GoogleTranslate::justTranslate('Clinical Historie succesfully saved', app()->getLocale())),
                                    "title" => ucwords(GoogleTranslate::justTranslate('¡Success!', app()->getLocale())),
                                    "_id" => $_idClinical], 200);
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
            $family = Familys::find($id);
            if(!isset($family))
            {
                $family = Users::find($id);
            }

            if (isset($family->id_clinical))
            {
                $clinical_history = ClinicalHistorie::find($family->id_clinical);
                $family->clinical_history = $clinical_history;
                unset($family->id_clinical);
            }

            return response()->json($family, 200);
        }
        catch (Exception $ex)
        {
            return response()->json(["error" => $ex->getMessage(),
                                     "text" => ucwords(GoogleTranslate::justTranslate('An error occurred, please try again', app()->getLocale())),
                                     "title" => ucwords(GoogleTranslate::justTranslate('¡Error!', app()->getLocale()))], 500);
        }
    }

    public function saveClinicalHistorieByDoctor(Request $request)
    {
        try
        {
            if(isset($request->clinical_history['_id']))
            {
                $clinicalH = ClinicalHistorie::find($request->clinical_history['_id']);
                foreach($request->clinical_history as $key => $value)
                {
                    $clinicalH->$key = $value;
                }
                $clinicalH->save();
            }
            else
            {
                $clinicalH = new ClinicalHistorie();
                foreach($request->clinical_history as $key => $value)
                {
                    $clinicalH->$key = $value;
                }
                $clinicalH->save();

                $family = Familys::find($request->clinical_history['person_id']);
                if(isset($family))
                {
                    $family->id_clinical = $clinicalH->_id;
                    $family->save();
                }
                else
                {
                    $family = Users::find($request->clinical_history['person_id']);
                    $family->id_clinical = $clinicalH->_id;
                    $family->save();
                }
            }

            return response()->json(["result" => ucwords(GoogleTranslate::justTranslate('Clinical Historie succesfully saved', $request->lang)),
                                    "title" => ucwords(GoogleTranslate::justTranslate('¡Success!', $request->lang))], 200);
        }
        catch (Exception $ex)
        {
            return response()->json(["error" => $ex->getMessage(),
                                     "text" => ucwords(GoogleTranslate::justTranslate('An error occurred, please try again', $request->lang)),
                                     "title" => ucwords(GoogleTranslate::justTranslate('¡Error!', $request->lang))], 500);
        }
    }
}
