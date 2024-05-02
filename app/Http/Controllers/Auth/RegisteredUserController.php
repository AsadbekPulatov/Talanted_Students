<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Models\Info;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'user' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed'],
        ]);
        
        $datainfo=new Info();
        $datainfo->FIO="No`malum";
        $datainfo->group="No`malum";
        $datainfo->passport="No`malum";
        $datainfo->JSHSHIR=0;
        $datainfo->date_birthday="2000-01-01";
        $datainfo->location="No`malum";
        $datainfo->succes="Yo`q";
        $datainfo->phone="No`malum";
        $datainfo->reference="No`malum";
        $datainfo->save();

        $i=DB::select("select MAX(id) as max from infos")[0]->max;
        $user=new User();
        $user->info_id=$i;
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->user=$request->user;
        $user->gender=$request->gender;
        $user->position='student';
        $user->email=$request->email;
        $user->password=Hash::make("$request->password");
        $user->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
