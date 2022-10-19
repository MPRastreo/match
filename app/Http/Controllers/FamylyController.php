<?php

namespace App\Http\Controllers;

use App\Models\Familys;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FamylyController extends Controller
{
    public function index()
    {
        $familys = Familys::all();
        return view('auth.family', compact('familys'));
    }

    public function create(Request $request)
    {
        try {
            // $family=[];
            $familyR = $request->all();
            $family = new Familys();
            foreach ($familyR as $key => $value) {

                if (gettype($key) == "object") {
                    $family[$key] = json_encode($value);
                } else {
                    $family->$key = $value;
                }
            }
            // return $family;
            // Familys::create($familyR);
            $family->save();
            return response()->json(["result" => true, "message" => "Family succesfully added"], 200);
        } catch (Exception $th) {
            Log::error($th);
            return response()->json(['result' => false, "message" => $th->getMessage()], 500);
        }
    }
}