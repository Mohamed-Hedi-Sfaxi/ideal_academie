<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Teacher;
use Brian2694\Toastr\Facades\Toastr;

class TeacherController extends Controller
{
    /** add teacher page */
    public function teacherAdd()
    {
        return view('teacher.add-teacher');
    }

    /** teacher list */
    public function teacherList()
    {
        $listTeacher = DB::table('users')
            ->join('teachers','teachers.teacher_id','users.user_id')
            ->select('users.user_id','users.name','users.avatar','teachers.email','teachers.formation','teachers.id','teachers.mobile','teachers.address')
            ->get();
        return view('teacher.list-teachers',compact('listTeacher'));
    }


    /** save record */
    public function saveRecord(Request $request)
    {
        $request->validate([
            'full_name'             => 'required|string',
            'date_of_birth'         => 'required|string',
            'mobile'                => 'required|string|max:8',
            'joining_date'          => 'required|string',
            'formation'             => 'required|string',
            'username'              => 'required|string',
            'email'                 => 'required|email',
            'password'              => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
            'address'               => 'required|string',
            'city'                  => 'required|string',
            'state'                 => 'required|string',
            'zip_code'              => 'required|string',
        ]);

        try {
        
            $dt        = Carbon::now();
            $todayDate = $dt->toDayDateTimeString();
            
                 
            User::create([
                'name'          => $request->full_name,
                'join_date'     => $todayDate,
                'email'         => $request->email,
                'formation'     => $request->formation,
                'phone_number'  => $request->mobile,
                'address'       => $request->address,
                'role_name'     => 'Formateur',
                'password'      => Hash::make($request->password),
            ]);
            $user_id = DB::table('users')->select('user_id')->orderBy('id','DESC')->first();
            
            $saveRecord = new Teacher;
            $saveRecord->teacher_id    = $user_id->user_id;
            $saveRecord->full_name     = $request->full_name;
            $saveRecord->date_of_birth = $request->date_of_birth;
            $saveRecord->email         = $request->email;
            $saveRecord->mobile        = $request->mobile;
            $saveRecord->joining_date  = $request->joining_date;
            $saveRecord->formation     = $request->formation;
            $saveRecord->username      = $request->username;
            $saveRecord->address       = $request->address;
            $saveRecord->city          = $request->city;
            $saveRecord->state         = $request->state;
            $saveRecord->zip_code      = $request->zip_code;
            $saveRecord->save();
   
            Toastr::success('Ajout avec succès :)','Succés');
            return redirect()->back();
        } catch(\Exception $e) {
            \Log::info($e);
            DB::rollback();
            Toastr::error('Échec ajout  :(','Échec');
            return redirect()->back();
        }
    }

    /** edit record */
    public function editRecord($id)
    {
        $teacher = Teacher::where('id',$id)->first();
        return view('teacher.edit-teacher',compact('teacher'));
    }

    /** update record teacher */
    public function updateRecordTeacher(Request $request)
    {
        DB::beginTransaction();
        try {

            $updateRecord = [
                'full_name'     => $request->full_name,
                'date_of_birth' => $request->date_of_birth,
                'mobile'        => $request->mobile,
                'joining_date'  => $request->joining_date,
                'formation'     => $request->formation,
                'username'      => $request->username,
                'address'       => $request->address,
                'city'          => $request->city,
                'state'         => $request->state,
                'zip_code'      => $request->zip_code,
            ];
            Teacher::where('id',$request->id)->update($updateRecord);
            
            Toastr::success('Mise à jour avec succès :)','Succès');
            DB::commit();
            return redirect()->back();
           
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Échec de la mise à jour :(','Échec');
            return redirect()->back();
        }
    }

    /** delete record */
    public function teacherDelete(Request $request)
    {
        DB::beginTransaction();
        try {

            Teacher::destroy($request->id);
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
