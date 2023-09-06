<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Batiment;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Session;

class BatimentController extends Controller
{
    /** index page batiment list */
    public function batiment()
    {
        $batimentList = Batiment::all();
        return view('batiment.list-batiment',compact('batimentList'));
    }

    /** add batiment */
    public function batimentAdd()
    {
        return view('batiment.add-batiment');
    }

    /** save batiment */
    public function batimentSave(Request $request)
    {
        $request->validate([
            'state'    => 'required|string',
            'city'     => 'required|string',
            'address'  => 'required|string',
        ]);

        DB::beginTransaction();
        try {
           
            $batiment = new Batiment;
            $batiment->state    = $request->state;
            $batiment->city     = $request->city;
            $batiment->address  = $request->address;
            $batiment->save();

            Toastr::success('Ajout avec succès :)','Succés');
            DB::commit();


            return redirect()->back();
           
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Échec ajout  :(','Échec');
            return redirect()->back();
        }
    }
    
    /** batiment update */
    public function batimentEdit($id)
    {
        $batimentEdit = Batiment::where('id',$id)->first();
        return view('batiment.edit-batiment',compact('batimentEdit'));
    }

    /** update record batiment */
    public function batimentUpdate(Request $request)
    {
        DB::beginTransaction();
        try {

            $update = [
                'state'     => $request->state,
                'city'      => $request->city,
                'address'   => $request->address,
            ];
            Batiment::where('id',$request->id)->update($update);
            
            Toastr::success('Mise à jour avec succès :)','Succès');
            DB::commit();
            return redirect()->back();
           
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Échec de la mise à jour :(','Échec');
            return redirect()->back();
        }
    }

    /** batiment delete */
    public function batimentDelete(Request $request)
    {
        DB::beginTransaction();
        try {
            if (Session::get('role_name') === 'Directeur')
            {
                    Batiment::destroy($request->id);
            } else {
                Toastr::error('Échec de la suppression :(','Échec');
            }

            DB::commit();
            Toastr::success('Supprimé avec succès :)','Succès');
            return redirect()->back();
    
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Échec de la suppression :(','Échec');
            return redirect()->back();
        }
    }
}
