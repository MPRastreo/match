<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use GoogleTranslate;
use stdClass;
use GoogleTranslate;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notificationsTranslated = [];
        if (Auth::user()->role == 2 || Auth::user()->role == 1) {
            $notificaciones = Notifications::where('id_usuario', '=', Auth::user()->_id)->get();

            for ($i = 0; $i < sizeof($notificaciones); $i++)
            {
                $notificaciones[$i]->titulo = ucwords(GoogleTranslate::justTranslate($notificaciones[$i]->titulo, app()->getLocale()));
                $notificaciones[$i]->cuerpo = ucwords(GoogleTranslate::justTranslate($notificaciones[$i]->cuerpo, app()->getLocale()));
            }

            return response()->json($notificaciones);

        }elseif (Auth::user()->role == 4) {
            $notificaciones = Notifications::where('visto',false)->where('id_usuario','Informativa')->get();

            for ($i = 0; $i < sizeof($notificaciones); $i++)
            {
                $notificaciones[$i]->titulo = ucwords(GoogleTranslate::justTranslate($notificaciones[$i]->titulo, app()->getLocale()));
                $notificaciones[$i]->cuerpo = ucwords(GoogleTranslate::justTranslate($notificaciones[$i]->cuerpo, app()->getLocale()));
            }

            return response()->json($notificaciones);
        }
    }

    public function asignacion($user)
    {
        try {
            $notificaciones = new Notifications();

            $obj = new stdClass();

            $obj->encabezado = 'Match';
            $obj->titulo = 'quotation';
            $obj->cuerpo = 'You have an appointment to assign.';
            $notificaciones->visto = false;
            $notificaciones->id_usuario = "Informativa";

            foreach ($obj as $key => $value) {
                $notificaciones->$key = $value;
            }

            $notificaciones->save();


            $notificacionesUser = new Notifications();

            $objUser = new stdClass();

            $objUser->encabezado = 'Match';
            $objUser->titulo = 'quotation';
            $objUser->cuerpo = 'Your appointment is pending assignment.';
            $notificacionesUser->visto = false;
            $notificacionesUser->id_usuario = $user->familyMemberID;

            foreach ($objUser as $key => $value) {
                $notificacionesUser->$key = $value;
            }

            $notificacionesUser->save();

        } catch (Exception $ex) {
            Log::info($ex);
        }
    }

    public function notificarAssign($user)
    {
        $notificaciones = new Notifications();

            $obj = new stdClass();

            $obj->encabezado = 'Match';
            $obj->titulo = 'quotation';
            $obj->cuerpo = 'Your appointment is already assigned.';
            $obj->visto = false;
            $obj->id_usuario = $user->familyMemberID;

            foreach ($obj as $key => $value) {
                $notificaciones->$key = $value;
            }

            $notificaciones->save();
    }

    public function watchNotification(Request $request)
    {

        Log::info($request);

        $quotation = Notifications::find($request->id);

        $quotation->visto = true;

        $quotation->save();

        return 1;
    }
}
