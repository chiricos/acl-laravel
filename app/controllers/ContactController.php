<?php

use cerverus\Entities\Business;
use cerverus\Entities\Contact;
use cerverus\Managers\CreateContactManager;
use cerverus\Managers\CreateChargesManager;
use cerverus\Managers\UpdateContactManager;
use cerverus\Repositories\LogRepo;

class ContactController extends BaseController
{
    public function contact()
    {
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        $contacts=Contact::all();
        $business=Business::all();
        $business_id=["seleccione una empresa"=>"seleccione una empresa"]+Business::all()->lists('name','id');
        return View::make('front.contacts.contact',compact('business_id','total','contacts','charges','business'));
    }

    public function createContact()
    {
        $contactManager=new CreateContactManager(new Contact(),Input::all());
        $contactValidator=$contactManager->isValid();
        if($contactValidator)
        {
            return Redirect::route('contacts')->with('see','1')->withErrors($contactValidator)->withInput();
        }
        $saveContact=$contactManager->saveContact();
        if($saveContact)
        {
            new LogRepo(
                [
                    'responsible'=> Auth::user()->user_name,
                    'responsible_id'=> Auth::user()->id,
                    'action' => 'ha creado un contacto ',
                    'affected_entity'=> Input::get('name'),
                ]
            );
            return Redirect::route('contacts')->with('message','el contacto fue creado correctamente');
        }
        return Redirect::route('contacts')->with('message_error','el contacto fue creado correctamente');
    }



    public function showUpdateContact($id)
    {
        $contact=Contact::find($id);
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        $contacts=Contact::all();
        $business=Business::all();
        $business_id=["seleccione una empresa"=>"seleccione una empresa"]+Business::all()->lists('name','id');
        return View::make('front.contacts.updateContact',compact('business_id','total','contacts','charges','business','contact'));
    }

    public function updateContact($id)
    {
        $updateContactManager=new UpdateContactManager(new Contact(),Input::all());
        $updateContactValidator=$updateContactManager->isValid();
        if($updateContactValidator)
        {
            return Redirect::route('updateContacts',$id)->withErrors($updateContactValidator)->withInput();
        }
        $updateContact=$updateContactManager->updateContact($id);
        if($updateContact)
        {
            new LogRepo(
                [
                    'responsible'=> Auth::user()->user_name,
                    'responsible_id'=> Auth::user()->id,
                    'action' => 'ha actualizado una cuenta ',
                    'affected_entity'=> Input::get('name'),
                    'affected_entity_id'=> $id,
                ]
            );
            return Redirect::route('contacts')->with('message','el contacto fue actualizado correctamente');
        }
        return Redirect::route('contacts')->with('message_error','el contacto no pudo ser actualizado');
    }

}