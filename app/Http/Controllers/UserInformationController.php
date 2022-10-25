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
        $users_information = User::paginate(10);

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

        if (!$user) return redirect()->back();
      
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone = $request->phone;
            $user->save();

            return redirect()->back()->with('status',"تم تحديث الحساب  بنجاح");

    }


    /** This function to delete the user account */
    public function destroy($id)
    {
        if ($id ==  Auth::user()->id ) {
            User::destroy($id);
        }
        return back()->with('status', "تم حذف الحساب بنجاح"); 
    }
}
