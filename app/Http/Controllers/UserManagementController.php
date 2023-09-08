<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use Carbon\Carbon;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;


class UserManagementController extends Controller
{
    // index page
    public function index()
    {
        $users = User::all();
        return view('usermanagement.list_users',compact('users'));
    }

    /** user view */
    public function userView($id)
    {
        $users = User::where('user_id',$id)->first();
        return view('usermanagement.user_update',compact('users'));
    }

    /** user add page */
    public function userAdd()
    {
        return view('usermanagement.user_add');
    }

    /** user Save */
    public function userSave(Request $request)
    {
        $request->validate([
            'full_name'             => 'required|string',
            'joining_date'          => 'required|string',
            'email'                 => 'required|string',
            'mobile'                => 'required|string|max:8',
            'password'              => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        try {
        
            $dt        = Carbon::now();
            $todayDate = $dt->toDayDateTimeString();
            
                
            User::create([
                'name'          => $request->full_name,
                'email'         => $request->email,
                'join_date'     => $todayDate,
                'phone_number'  => $request->mobile,
                'status'        => $request->status,
                'role_name'     => $request->role_name,
                'password'      => Hash::make($request->password),
            ]);
            $user_id = DB::table('users')->select('user_id')->orderBy('id','DESC')->first();
            
            $userSave = new User;
            $userSave->user_id       = $user_id->user_id;
            $userSave->full_name     = $request->full_name;
            $userSave->joining_date  = $request->joining_date;
            $userSave->role_name     = $request->role_name;
            $userSave->save();

            Toastr::success('Ajout avec succès :)','Succés');
            return redirect()->back();
        } catch(\Exception $e) {
            \Log::info($e);
            DB::rollback();
            Toastr::success('Ajout avec succès :)','Succés');
            return redirect()->back();
        }
    }

    /** user Update */
    public function userUpdate(Request $request)
    {
        DB::beginTransaction();
        try {
            if (Session::get('role_name') === 'Directeur')
            {
                $user_id      = $request->user_id;
                $name         = $request->name;
                $email        = $request->email;
                $role_name    = $request->role_name;
                $phone        = $request->phone_number;

            
                $update = [
                    'user_id'      => $user_id,
                    'name'         => $name,
                    'role_name'    => $role_name,
                    'email'        => $email,
                    'phone_number' => $phone,
                ];

                User::where('user_id',$request->user_id)->update($update);
            } else {
                Toastr::error('Échec de la mise à jour :(','Échec');
            }
            DB::commit();
            Toastr::success('Mise à jour avec succès :)','Succès');
            return redirect()->back();

        } catch(\Exception $e){
            DB::rollback();
            Toastr::error('Échec de la mise à jour :(','Échec');
            return redirect()->back();
        }
    }

    /** user delete */
    public function userDelete(Request $request)
    {
        DB::beginTransaction();
        try {
            if (Session::get('role_name') === 'Directeur')
            {
                    User::destroy($request->user_id);
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

    /** change password */
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password'     => ['required', new MatchOldPassword],
            'new_password'         => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        DB::commit();
        Toastr::success('Changement de mot de passe réussi :)','Succès');
        return redirect()->intended('home');
    }
}
