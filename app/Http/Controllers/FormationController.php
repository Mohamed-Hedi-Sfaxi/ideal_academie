<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Formation;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Session;

class FormationController extends Controller
{
    /** index page formation list */
    public function formation()
    {
        $formationList = Formation::all();
        return view('formation.list-formation',compact('formationList'));
    }

    /** add formation */
    public function formationAdd()
    {
        return view('formation.add-formation');
    }

    /** save formation */
    public function formationSave(Request $request)
    {
        $request->validate([
            'name'          => 'required|string',
            'sub_cost'      => 'required|string',
            'exam_cost'     => 'required|string',
            'form_cost'     => 'required|string',
            'period'        => 'required|string',
            'definition'    => 'required|string',
            'description'   => 'required|string',
        ]);

        DB::beginTransaction();
        try {
           
            $formation = new Formation;
            $formation->name        = $request->name;
            $formation->sub_cost    = $request->sub_cost;
            $formation->exam_cost   = $request->exam_cost;
            $formation->form_cost   = $request->form_cost;
            $formation->period      = $request->period;
            $formation->definition  = $request->definition;
            $formation->description = $request->description;
            $formation->save();

            Toastr::success('Ajout avec succès :)','Succés');
            DB::commit();


            return redirect()->back();
           
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Échec ajout  :(','Échec');
            return redirect()->back();
        }
    }
    
    /** formation update */
    public function formationEdit($id)
    {
        $formationEdit = Formation::where('id',$id)->first();
        return view('formation.edit-formation',compact('formationEdit'));
    }

    /** update record formation */
    public function formationUpdate(Request $request)
    {
        DB::beginTransaction();
        try {

            $update = [
                'name'          => $request->name,
                'sub_cost'      => $request->sub_cost,
                'exam_cost'     => $request->exam_cost,
                'form_cost'     => $request->form_cost,
                'period'        => $request->period,
                'definition'    => $request->definition,
                'description'   => $request->description,
            ];
            Formation::where('id',$request->id)->update($update);
            
            Toastr::success('Mise à jour avec succès :)','Succès');
            DB::commit();
            return redirect()->back();
           
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Échec de la mise à jour :(','Échec');
            return redirect()->back();
        }
    }

    /** formation delete */
    public function formationDelete(Request $request)
    {
        DB::beginTransaction();
        try {
            if (Session::get('role_name') === 'Directeur')
            {
                    Formation::destroy($request->id);
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
