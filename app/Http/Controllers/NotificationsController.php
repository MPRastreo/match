<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use JoggApp\GoogleTranslate\GoogleTranslate;
use stdClass;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 2 || Auth::user()->role == 1) {

            Log::info("Si entro");

            Log::info(Auth::user()->_id);

            $notificaciones = Notifications::where('id_usuario', '=', Auth::user()->_id)->get();

            return response()->json($notificaciones);

        }elseif (Auth::user()->role == 4) {
            $notificaciones = Notifications::where('visto',false)->where('id_usuario','Informativa')->get();

            return response()->json($notificaciones);
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notifications  $notifications
     * @return \Illuminate\Http\Response
     */
    public function show(Notifications $notifications)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notifications  $notifications
     * @return \Illuminate\Http\Response
     */
    public function edit(Notifications $notifications)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notifications  $notifications
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notifications $notifications)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notifications  $notifications
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notifications $notifications)
    {
        //
    }

    public function asignacion($user)
    {
        try {
            $notificaciones = new Notifications();

            $obj = new stdClass();

            $obj->encabezado = 'Match';
            $obj->titulo = ucwords(GoogleTranslate::justTranslate('Quotation', app()->getLocale()));
            $obj->cuerpo = ucwords(GoogleTranslate::justTranslate('You have an appointment to assign', app()->getLocale()));
            $notificaciones->visto = false;
            $notificaciones->id_usuario = "Informativa";

            foreach ($obj as $key => $value) {
                $notificaciones->$key = $value;
            }

            $notificaciones->save();


            $notificacionesUser = new Notifications();

            $objUser = new stdClass();

            $objUser->encabezado = 'Match';
            $objUser->titulo = ucwords(GoogleTranslate::justTranslate('Quotation', app()->getLocale()));
            $objUser->cuerpo = ucwords(GoogleTranslate::justTranslate('Your appointment is pending assignment.', app()->getLocale()));
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
            $obj->titulo = ucwords(GoogleTranslate::justTranslate('Quotation', app()->getLocale()));
            $obj->cuerpo = ucwords(GoogleTranslate::justTranslate('Your appointment is already assigned', app()->getLocale()));
            $obj->visto = false;
            $obj->id_usuario = $user->familyMemberID;

            foreach ($obj as $key => $value) {
                $notificaciones->$key = $value;
            }

            $notificaciones->save();
    }
}
