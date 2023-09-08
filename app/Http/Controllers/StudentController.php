<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Student;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Session;

class StudentController extends Controller
{
    /** index page student list */
    public function student()
    {
        $studentList = Student::all();
        return view('student.student',compact('studentList'));
    }

    /** student add page */
    public function studentAdd()
    {
        return view('student.add-student');
    }
    
    /** student save */
    public function studentSave(Request $request)
    {
        $request->validate([
            'first_name'    => 'required|string',
            'last_name'     => 'required|string',
            'date_of_birth' => 'required|string',
            'cin'           => 'required|string',
            'payment'       => 'required|string',
            'email'         => 'required|email',
            'groupe'        => 'required|string',
            'formation'     => 'required|string',
            'phone_number'  => 'required|string|max:8',
        ]);
        
        DB::beginTransaction();
        try {
           
            $student = new Student;
            $student->first_name    = $request->first_name;
            $student->last_name     = $request->last_name;
            $student->date_of_birth = $request->date_of_birth;
            $student->cin           = $request->cin;
            $student->payment       = $request->payment;
            $student->email         = $request->email;
            $student->groupe        = $request->groupe;
            $student->formation     = $request->formation;
            $student->phone_number  = $request->phone_number;
            $student->save();

            Toastr::success('Ajout avec succès :)','Succés');
            DB::commit();


            return redirect()->back();
           
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Échec ajout  :(','Échec');
            return redirect()->back();
        }
    }

    /** student update */
    public function studentEdit($id)
    {
        $studentEdit = Student::where('id',$id)->first();
        return view('student.edit-student',compact('studentEdit'));
    }

    /** update record */
    public function studentUpdate(Request $request)
    {
        DB::beginTransaction();
        try {

                $first_name     = $request->first_name;
                $last_name      = $request->last_name;
                $date_of_birth  = $request->date_of_birth;
                $cin            = $request->cin;
                $payment        = $request->payment;
                $email          = $request->email;
                $groupe         = $request->groupe;
                $formation      = $request->formation;
                $phone_number   = $request->phone_number;

            
                $update = [
                    'first_name'      => $first_name,
                    'last_name'       => $last_name,
                    'date_of_birth'   => $date_of_birth,
                    'cin'             => $cin,
                    'payment'         => $payment,
                    'email'           => $email,
                    'groupe'          => $groupe,
                    'formation'       => $formation,
                    'phone_number'    => $phone_number,
                ];

                Student::where('id',$request->id)->update($update);
            
                DB::commit();
                Toastr::success('Mise à jour avec succès :)','Succès');
                return redirect()->back();

        } catch(\Exception $e){
            DB::rollback();
            Toastr::error('Échec de la mise à jour :(','Échec');
            return redirect()->back();
        }
    }

    /** student delete */
    public function studentDelete(Request $request)
    {
        DB::beginTransaction();
        try {
            if (Session::get('role_name') === 'RH')
            {
                    Student::destroy($request->id);
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
