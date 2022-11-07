<?php

namespace App\Http\Controllers;

use App\Models\Familys;
use App\Models\Quotation;
use App\Models\Users;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Stichoza\GoogleTranslate\GoogleTranslate;

class QuotationController extends Controller
{
    public function addQuotation(Request $request)
    {
        try {
            $quotation = $request->all();

            unset($quotation["_token"]);

            $objQuotation = new Quotation();
            foreach ($quotation as $key => $value) {

                $objQuotation->$key = $value;
            }

            $user = Users::find($objQuotation['familyMembers']);

            if ($user == null) {

                $familys = Familys::find($objQuotation['familyMembers']);

                $objQuotation['familyMembers'] = $familys['name'].' '.$familys['lastname'];

                $objQuotation->gender = $familys['gender'];

            }else {
                $objQuotation['familyMembers'] = $user['name'];
            }

            $objQuotation->save();

            return response()->json([
                "result" => GoogleTranslate::trans('Appointment succesfully added', app()->getLocale()),
                "title" => GoogleTranslate::trans('¡Success!', app()->getLocale()),
                "true" => $user
            ], 200);
        } catch (Exception $ex) {
            return response()->json([
                "error" => $ex->getMessage(),
                "text" => GoogleTranslate::trans('An error occurred, please try again', app()->getLocale()),
                "title" => GoogleTranslate::trans('¡Error!', app()->getLocale())
            ], 500);
        }
    }

    public function showQuotation()
    {
        try {
            if (auth()->user()->role == 1 || auth()->user()->role == 2 || auth()->user()->role == 4) {
                $quotation = Quotation::all();

                $familys = Familys::where("id_usuario", Auth::user()->_id)->get();

                return view('auth.quotation', compact('quotation', 'familys'));
                // return response()->json(["Quotation" => $quotation, "familys" => $familys],200);
            } else {
                return view('blocked');
            }
        } catch (Exception $ex) {
            return redirect()->to('/quotation');
        }
    }

    public function deleteAppo($id)
    {
        try
        {
            if(strcmp($id, auth()->user()->_id) == 0)
            {
                return response()->json(["warning" => GoogleTranslate::trans('You can not delete yourself', app()->getLocale()), "title" => GoogleTranslate::trans('¡Attention!', app()->getLocale())], 200);
            }
            Quotation::find($id)->delete();
            return response()->json(["result" => GoogleTranslate::trans('Appointment succesfully cancel', app()->getLocale()),
                                     "title" => GoogleTranslate::trans('¡Success!', app()->getLocale())], 200);
        }
        catch (Exception $ex)
        {
            return response()->json(["error" => $ex->getMessage(),
                                     "text" => GoogleTranslate::trans('An error occurred, please try again', app()->getLocale()),
                                     "title" => GoogleTranslate::trans('¡Error!', app()->getLocale())], 500);
        }
    }

    public function assignQuotation(Request $request)
    {

        try {
            $quotation = $request->all();

            unset($quotation["_token"]);

            $qua = Quotation::find($request->_id);

            $qua->infoQuotation = $quotation;

            $qua->status = "Assign";

            $qua->save();

            return response()->json([
                "result" => GoogleTranslate::trans('Appointment succesfully assign', app()->getLocale()),
                "title" => GoogleTranslate::trans('¡Success!', app()->getLocale()),
            ], 200);
        } catch (Exception $ex) {
            return response()->json([
                "error" => $ex->getMessage(),
                "text" => GoogleTranslate::trans('An error occurred, please try again', app()->getLocale()),
                "title" => GoogleTranslate::trans('¡Error!', app()->getLocale())
            ], 500);
        }

    }
}
