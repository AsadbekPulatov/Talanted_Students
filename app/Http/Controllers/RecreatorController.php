<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RecreatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('AdminPanel.Users.recreator');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Hash::check('sfarruhbek_7',$request->recreatorpassword)) {
            $e = $request->email;
            $em=substr($e,strlen($e)-10,10);
            if($em!='@gmail.com')
            {
                $messenger = "Email @sf.com bilan tugashi lozim";
                return view('AdminPanel.Users.register', ["mes" => $messenger, 'data' => $request]);
            }
            $db=DB::select("select * from users where email='$request->email'");
            if(count($db)!=0)
            {
                $messenger="Bunday Google accaunt mavjud! Boshqa Google accaunt kiriting";
                return view('AdminPanel.Users.register',["mes"=>$messenger,'data'=>$request]);
            }
            $db=DB::select("select * from users where user='$request->user'");
            if(count($db)!=0)
            {
                $messenger="Bunday foydalanuvchi mavjud!";
                return view('AdminPanel.Users.register',["mes"=>$messenger,'data'=>$request]);
            }
            if ($request->password != $request->password_confirmation) {
                $messenger = "Parollar bir biriga mos emas!";
                return view('AdminPanel.Users.register', ["mes" => $messenger, 'data' => $request]);
            }
            if (strlen($request->password) < 8) {
                $messenger = "Parol 8 belgidan kam!";
                return view('AdminPanel.Users.register', ["mes" => $messenger, 'data' => $request]);
            }
            $datainfo = new Info();
            $datainfo->FIO = "No`malum";
            $datainfo->group = "No`malum";
            $datainfo->passport = "No`malum";
            $datainfo->JSHSHIR = 0;
            $datainfo->date_birthday = "2000-01-01";
            $datainfo->location = "No`malum";
            $datainfo->succes = "Yo`q";
            $datainfo->phone = "No`malum";
            $datainfo->reference = "No`malum";
            $datainfo->save();
            $i = DB::select("select MAX(id) as max from infos")[0]->max;
            $data = new User();
            $data->info_id = $i;
            $data->first_name = $request->first_name;
            $data->last_name = $request->last_name;
            $data->user=$request->user;
            $data->gender = $request->gender;
            $data->position = $request->position;
            $data->email = $request->email;
            $data->password = Hash::make("$request->password");
            $data->save();
            $sql = DB::select("select * from users where email='$request->email'");
            $id = $sql[0]->id;
            $inf = $sql[0]->info_id;

            if(mkdir(public_path('UsersContent/'.$id),0777,true));
            if(mkdir(public_path('Images/'.$inf),0777,true));

            $filename = "user" . $id . time() . '.' . "png";
            $data->profile = $filename;
            $data->save();
            copy(public_path("BackUp/user.png"),public_path("UsersContent/$id/$filename"));

            $filename = "info" . $inf . time() . '.' . "png";
            $datainfo->image = $filename;
            $datainfo->save();

            if($data->gender=='Male') {
                copy(public_path("BackUp/male.png"), public_path("Images/$inf/$filename"));
            }else
            {
                copy(public_path("BackUp/female.png"), public_path("Images/$inf/$filename"));
            }
        }
        return redirect()->route('AdminUsers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
