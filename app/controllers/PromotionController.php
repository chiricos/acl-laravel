<?php

use cerverus\Entities\Business;


class PromotionController extends BaseController
{

    public function show()
    {
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        return View::make('front.promotion.showPromotion',compact('total'));
    }

    public function sendPromotion()
    {
        $business=Business::all();
        $data=[];
        foreach($business as $client)
        {
            $email=$client->email;
            Mail::send('emails.auth.reminder', $data, function ($message) use ($email) {
                $message->to($email, 'cerveruss CRM')->subject('correo de Mi-Martinez.com');
            });
        }

        return Redirect::route('promotion')->with('message','los correos fueron enviados exitosamente');

    }

}
