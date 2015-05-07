<?php

use cerverus\Entities\Business;
use cerverus\Managers\EmailManager;
use cerverus\Repositories\LogRepo;


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
        $promotionManager=new EmailManager('',Input::all());
        $promotionValidator=$promotionManager->isValid();
        if($promotionValidator) {
            return Redirect::route('promotion')->withErrors($promotionValidator)->withInput();
        }
        $business=Business::all();
        $data=Input::all();
        foreach($business as $client)
        {
            $email=$client->email;
            Mail::send('emails.promotion', $data, function ($message) use ($email) {
                $message->to($email, 'cerveruss CRM')->subject('correo de Mi-Martinez.com');
            });
        }

        new LogRepo(
            [
                'responsible'=> Auth::user()->user_name,
                'responsible_id'=> Auth::user()->id,
                'action' => 'se ha enviado correos masivos de promocion ',
                'affected_entity'=> '',
            ]
        );
        return Redirect::route('promotion')->with('message','los correos fueron enviados exitosamente');

    }

}
