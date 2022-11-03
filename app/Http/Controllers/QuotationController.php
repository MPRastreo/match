<?php

namespace App\Http\Controllers;

use App\Models\Familys;
use App\Models\Quotation;
use App\Models\Users;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Stichoza\GoogleTranslate\GoogleTranslate;

class QuotationController extends Controller
{
    public function addQuotation(Request $request)
    {
        try {
            $quotation = $request->all();
            $objQuotation = new Quotation();
            foreach ($quotation as $key => $value) {

                $objQuotation->$key = $value;
            }
            $objQuotation->save();

            return response()->json([
                "result" => GoogleTranslate::trans('User succesfully added', app()->getLocale()),
                "title" => GoogleTranslate::trans('¡Success!', app()->getLocale())
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
}
