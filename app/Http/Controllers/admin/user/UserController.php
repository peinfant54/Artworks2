<?php

namespace App\Http\Controllers\admin\user;

use App\Models\CoreModel\CorePermission;
use App\User;
use App\Models\CoreModel\CoreProfile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Helpers\SystemCatchLog\LogSystem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\CoreModel\CoreModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreateUser;
use App\Http\Requests\EditUser;
use App\Http\Requests\ChangePasswordUser;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;


class UserController extends Controller
{

    private $idmodulo = 1; /* Defined by the databases table CoreModule */

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username_new' => 'required|string|max:255',
            'email_new' => 'required|string|email|max:255|unique:users',
            'password_new' => 'required|string|min:6|confirmed',
        ]);
    }



    public function UserIndex()
    {
        try{

            $title      = "Proyecto Galeria";
            //$user       = User::find(Auth::id());
            /* Menu */

            $mod  = User::find(Auth::id())->profile->module;

            foreach($mod as $a)
            {
                if($a->id == $this->idmodulo) /* Is allowed to see this Module */
                {
                    if($a->pivot->rread > 0 or $a->pivot->eedit > 0 or $a->pivot->wwrite > 0 or $a->pivot->ddelete > 0) {
                        /* Content */

                        $user = User::paginate(12);
                        $profile = CoreProfile::pluck('name','id');
                        return view('admin/user/index')
                            ->with('title', $title)
                            ->with('modulos', $mod)
                            ->with('users', $user)
                            ->with('xmod', $a)
                            ->with('profile',$profile);
                    }
                }
            }
            Session::flash('msg_access', 'User');
            return redirect("admin/index"); /* If he dont have access redirect to the Index*/

        }
        catch(\Exception $e)
        {
            LogSystem::writeLog("ExcepcionM : " . $e->getMessage() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionF : " . $e->getFile() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionL : " . $e->getLine() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionT : " . $e->getTraceAsString() . " ", Auth::id());
            Session::flash('msg_access2', $e);
            return redirect("admin/index");
        }

    }

    public function UserEdit(EditUser $request)
    {
        try{
            //dd($request->all());
            $user = User::find(Input::get('id_user'));
            $user->username = Input::get('username_edit');
            $user->email = Input::get('email_edit');
            $user->id_profile = Input::get('id_profile_edit'.Input::get('id_user'));
            //$user->password = Hash::make(Input::get('password'));
            $user->save();
            Session::flash('dbUpdated', '1');
            LogSystem::writeSystemLog("The user with ID = ". $user->id." has been updated","admin",Auth::id());
            return redirect("admin/user/index/");

        }
        catch(\Exception $e)
        {
            LogSystem::writeLog("ExcepcionM : " . $e->getMessage() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionF : " . $e->getFile() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionL : " . $e->getLine() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionT : " . $e->getTraceAsString() . " ", Auth::id());
        }

    }

    public function UserChangePassword()
    {
        try{

            $title      = "Proyecto Galeria";
            //$user       = User::find(Auth::id());
            /* Menu */

            $mod  = User::find(Auth::id())->profile->module;

            return view("admin/user/changepassword")->with('title',$title)->with('modulos', $mod);



        }
        catch(\Exception $e)
        {
            LogSystem::writeLog("ExcepcionM : " . $e->getMessage() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionF : " . $e->getFile() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionL : " . $e->getLine() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionT : " . $e->getTraceAsString() . " ", Auth::id());
            Session::flash('msg_access2', $e);
            return redirect("admin/index");
        }
    }

    public function UserCheckPass(Request $request)
    {
        try{
            //dd($request->all());
            $user = User::find(Auth::id());
            //$user->username = Input::get('username');
            //$user->email = Input::get('email');
            //$user->id_profile = Input::get('id_profile_edit');
            $passEnter= Hash::make(Input::get('password1'));
            /*echo $passEnter."<br>". Input::get('password'). "<br>";
            echo $user->password."<br>";*/
            //echo Hash::check(Input::get('password'), $user->password);

                if (Hash::check(Input::get('password1'), $user->password))
                {
                    $title = "Proyecto Galeria";

                    /* Menu */
                    $back = redirect()->back();
                    $mod  = User::find(Auth::id())->profile->module;
                    //return view("admin/user/changepassword")->with('title',$title)->with('modulos', $mod)->with('back', $back);
                    return redirect("admin/user/changepassword");
                }
                else{
                    Session::flash('dbUpdatedPass', '1');
                    //$a = redirect()->back();
                    //echo $a;

                    return redirect()->back()->withErrors('error', 'Password Incorrect');
                    //dd($request->route()); // ."<br>*2- ";
                    //echo Route::current()->getName(). "<br>";
                    //return redirect("admin/user/index/");
                }


            //LogSystem::writeSystemLog("The user with ID = ". $user->id." has change his password","admin",Auth::id());


        }
        catch(\Exception $e)
        {
            LogSystem::writeLog("ExcepcionM : " . $e->getMessage() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionF : " . $e->getFile() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionL : " . $e->getLine() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionT : " . $e->getTraceAsString() . " ", Auth::id());
        }

    }

    public function UserEditPass(ChangePasswordUser $request)
    {
        try{

            $user = User::find(Auth::id());

            $user->password = Hash::make(Input::get('password_change'));

            $user->save();

            Session::flash('dbUpdatedPassword', '1');


            LogSystem::writeSystemLog("The user with ID = ". $user->id." has change his password","admin",Auth::id());

            return redirect("admin/index/");

        }
        catch(\Exception $e)
        {
            LogSystem::writeLog("ExcepcionM : " . $e->getMessage() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionF : " . $e->getFile() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionL : " . $e->getLine() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionT : " . $e->getTraceAsString() . " ", Auth::id());
        }

    }

    public function UserEditPassUser(ChangePasswordUser $request)
    {
        try{

            $user = User::find(Auth::id());

            $user->password = Hash::make(Input::get('password_change'));

            $user->save();

            Session::flash('dbUpdatedPassword', '1');


            LogSystem::writeSystemLog("The passowrd of the user with ID = ". $user->id." has been modify ","admin",Auth::id());

            return redirect("admin/user/index/");

        }
        catch(\Exception $e)
        {
            LogSystem::writeLog("ExcepcionM : " . $e->getMessage() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionF : " . $e->getFile() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionL : " . $e->getLine() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionT : " . $e->getTraceAsString() . " ", Auth::id());
        }

    }

    public function UserDestroy()
    {
        try{
            User::destroy(Input::get('id_user'));
            LogSystem::writeSystemLog("The user with ID = ". Input::get('id_user')." has been deleted","admin",Auth::id());
            Session::flash('dbDelete', 'User');
            return redirect("admin/user/index");

        }
        catch(\Exception $e)
        {
            LogSystem::writeLog("ExcepcionM : " . $e->getMessage() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionF : " . $e->getFile() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionL : " . $e->getLine() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionT : " . $e->getTraceAsString() . " ", Auth::id());
        }

    }

    public function UserCreate(CreateUser $request)
    {
        try{



            //dd($request->all());
            $user = new User;
            $user->email = Input::get('email');
            $user->username = Input::get('username');
            $user->id_profile = Input::get('id_profile_new');
            $user->password = Hash::make(Input::get('password'));
            $user->save();
            Session::flash('dbCreate', 'User');

            LogSystem::writeSystemLog("The user with ID = ". $user->id." has been created","admin",Auth::id());
            return redirect("admin/user/index/");
        }
        catch(\Exception $e)
        {
            LogSystem::writeLog("ExcepcionM : " . $e->getMessage() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionF : " . $e->getFile() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionL : " . $e->getLine() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionT : " . $e->getTraceAsString() . " ", Auth::id());
            Session::flash('msg_access2', $e->getMessage());
            return redirect("admin/user/index");
        }

    }
}
