<?php

use cerverus\Entities\Charge;
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
        $charges=Charge::all();
        $business=Business::all();
        $charges_id=["seleccione un cargo"=>"seleccione un cargo"]+Charge::all()->lists('name','id');
        $business_id=["seleccione una empresa"=>"seleccione una empresa"]+Business::all()->lists('name','id');
        return View::make('front.contacts.contact',compact('charges_id','business_id','total','contacts','charges','business'));
    }

    public function createContact()
    {
        $contactManager=new CreateContactManager(new Contact(),Input::all());
        $contactValidator=$contactManager->isValid();
        if($contactValidator)
        {
            return Redirect::route('contacts')->withErrors($contactValidator)->withInput();
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

    public function createCharges()
    {
        $chargesManager=new CreateChargesManager(new Charge(),Input::all());
        $chargesValidator=$chargesManager->isValid();
        if($chargesValidator)
        {
            return Redirect::route('contacts')->withErrors($chargesValidator)->withInput();
        }
        $chargesManager->saveCharges();
        new LogRepo(
            [
                'responsible'=> Auth::user()->user_name,
                'responsible_id'=> Auth::user()->id,
                'action' => 'ha creado un cargo ',
                'affected_entity'=> Input::get('name'),
            ]
        );
            return Redirect::route('contacts')->with('message','el cargo fue creado correctamente');
    }

    public function deleteCharges($id)
    {

        $user=Contact::where('charges_id','=',$id)->first();
        if($user)
        {
            return Redirect::route('contacts')->with('message_error','el cargo no se puede eliminar por que esta siendo utilizado');
        }
            Charge::find($id)->delete();
            new LogRepo(
                [
                    'responsible'=> Auth::user()->user_name,
                    'responsible_id'=> Auth::user()->id,
                    'action' => 'ha eliminado un cargo ',
                ]
            );
            return Redirect::route('contacts')->with('message','el cargo ha sido eliminado exitosamente');


    }

    public function showUpdateContact($id)
    {
        $contact=Contact::find($id);
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        $contacts=Contact::all();
        $charges=Charge::all();
        $business=Business::all();
        $charges_id=["seleccione un cargo"=>"seleccione un cargo"]+Charge::all()->lists('name','id');
        $business_id=["seleccione una empresa"=>"seleccione una empresa"]+Business::all()->lists('name','id');
        return View::make('front.contacts.updateContact',compact('charges_id','business_id','total','contacts','charges','business','contact'));
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