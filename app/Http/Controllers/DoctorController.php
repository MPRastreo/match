<?php

namespace App\Http\Controllers;

use App\Models\ClinicalHistorie;
use App\Models\Familys;
use App\Models\Quotation;
use App\Models\Users;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use STS\JWT\JWTFacade;
use GoogleTranslate;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Lcobucci\JWT\ValidationData;
use STS\JWT\Exceptions\JwtExpiredException;
use STS\JWT\Exceptions\JwtValidationException;

class DoctorController extends Controller
{
    public function index($id, $langString)
    {
        $lang = $langString;
        $years = range(1900, strftime("%Y", time()));
        rsort($years, SORT_NUMERIC);
        $quotation = Quotation::find($id);

        if(isset($quotation))
        {
            $person = Familys::find($quotation->familyMemberID);
            if(!isset($person))
            {
                $person = Users::find($quotation->familyMemberID);
            }
            $quotation->person = $person;
            unset($quotation->familyMemberID, $quotation->person->password, $quotation->person->token);
            $clinical_history = ClinicalHistorie::find($quotation->person->id_clinical);
            $quotation->person->clinical_history = $clinical_history;
            // return $quotation;
            return view('doctor.quotationd', compact('lang', 'years', 'quotation'));
        }
        else
        {
            return redirect()->intended('/doctor/exit');
        }
    }

    public function generateTokenJWT(Request $request)
    {
        try
        {
            $id = config('app.key');
            $token = JWTFacade::setId($id)
                    ->setLifetime(Carbon::now()->addHours(4))
                    ->setIssuer('match')
                    ->setAudience('doctor_match')
                    ->set('_id', $request->_id)
                    ->getToken();

            return response()->json(["token" => (string) $token, "text" => GoogleTranslate::justTranslate('Token successfully copied to clipboard', app()->getLocale())], 200);
        }
        catch (Exception $ex)
        {
            return response()->json(["error" => $ex->getMessage(),
                                     "text" => ucwords(GoogleTranslate::justTranslate('An error occurred, please try again', app()->getLocale())),
                                     "title" => ucwords(GoogleTranslate::justTranslate('¡Error!', app()->getLocale()))], 500);
        }
    }

    public function validateTokenJWT(Request $request)
    {
        try
        {
            $id = config('app.key');
            $tokenV = JWTFacade::parse((string) $request->token);
            $dataV = new ValidationData();
            $dataV->setIssuer('match');
            $dataV->setAudience('doctor_match');
            $dataV->setId($id);
            $validity = $tokenV->isValid($dataV);

            if($validity)
            {
                $request->session()->regenerate();
                $request->session()->put('session_id', Hash::make(Carbon::now('GMT-6').'-'.$request->token));
                return redirect()->intended('/doctor/view/'.$tokenV->get('_id').'/'.$request->lang);
            }
            else
            {
                return back()->withErrors(['error' => 'Token invalid']);
            }
        }
        catch (JwtExpiredException $jwe)
        {
            return back()->withErrors(['error' => 'Token has expired']);
        }
        catch (JwtValidationException $jve)
        {
            return back()->withErrors(['error' => 'Token invalid']);
        }
        catch (Exception $ex)
        {
            return back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    public function logoutDoctor(Request $request)
    {
        try
        {
            $request->session()->forget('session_id');
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/tokendr');
        }
        catch (Exception $ex)
        {
            return response()->json(["error" => $ex->getMessage()], 200);
        }
    }
}
