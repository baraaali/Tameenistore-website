<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserInformation;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;


class UserInformationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /** This function returns all user information in the admin panel*/
    public function index()
    {
        $users_information = User::all();

        return view('admin.userInformation')->with('users_information',$users_information);
    }


    
    /** This function for user to shows his account information */ 
    public function show()
    {
        return view('user.profile.show');
    }

    /** This function for user to edit his account information */ 
    public function edit()
    {
        $user = Auth::user();
        return view('user.profile.edit')->with('user',$user);
    }

     /** This function to update the data received from the user in the database */
    public function update(Request $request)
    { 
        $user = User::find(Auth::user()->id);

        if ($user) {
            if(Auth::user()->email === $request->email){
                $this->validate($request,[
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255'],
                    'password' => ['required', 'confirmed', Rules\Password::defaults()],
                    'phone' => ['required', 'string','unique:user_information'],
                    ]);
            }else{
                $this->validate($request,[
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'confirmed', Rules\Password::defaults()],
                    'phone' => ['required', 'string','unique:user_information'],
                    ]);
            }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone = $request->phone;
            $user->save();

            return redirect()->back()->with('status',"تم تحديث الحساب  بنجاح");
        } else {
            return redirect()->back();
        }
    }


    /** This function to delete the user account */
    public function destroy($id)
    {
        $user_id = Auth::user()->id;

        if ($id == $user_id ) {
            User::destroy($id);
        }
        return back()->with('status', "تم حذف الحساب بنجاح"); 
    }
}
