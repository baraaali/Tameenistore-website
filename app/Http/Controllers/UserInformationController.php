<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserInformation;
use Illuminate\Support\Facades\Auth;
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
        $user_id = Auth::user()->id;
        $users_information = UserInformation::all()->where('user_id',$user_id);

        return view('admin.userInformation')->with('users_information',$users_information);
    }

    /** This function for user to create his account information */
    public function create()
    {
        return view('user.accountInformation.create');
    }

    /** This function stores the data received from the user in the database */   
    public function store(Request $request)
    {
        
        $validation = $request->validate([
            'phone' => ['required', 'string','unique'],
            'account_type' => ['required', 'string','in:normal_user,agency,insurance_company,maintenance_center'],
            'city' => ['required', 'string'],
            'user_id' => ['required|exists:users,id'],
            'country_id' => ['required|exists:countries,id'],
        ]);
        
        UserInformation::create($validation);

        return back()->with(Lang::get('messages.create_account'));
    }
    
    /** This function for user to shows his account information */ 
    public function show($id)
    {
        $user_id = Auth::user()->id;
        $account_information = UserInformation::find($id)->where('id',$user_id);

        return view('user.accountInformation.show')->with('account_information',$account_information);
    }

    /** This function for user to edit his account information */ 
    public function edit($id)
    {
        $user_id = Auth::user()->id;
        $account_information = UserInformation::find($id)->where('id',$user_id);

        return view('user.accountInformation.edit')->with('account_information',$account_information);
    }

     /** This function to update the data received from the user in the database */
    public function update(Request $request, $id)
    {
        $user_id = Auth::user()->id;
        $account_information = UserInformation::find($id)->where('id',$user_id);
        $input = $request->all();
        $account_information->update($input);

        return back()->with(Lang::get('messages.update_account'));  
    }

    /** This function to delete the user account */
    public function destroy($id)
    {
        $user_id = Auth::user()->id;

        if (UserInformation::id() == $user_id ) {
            UserInformation::destroy($id) && User::destroy($id) ; ;
        }
        return back()->with(Lang::get('messages.delete_account')); 
    }
}
