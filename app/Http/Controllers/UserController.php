<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use App\Models\ChoiseUser;
use App\Models\Info;
use App\Models\News;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('admin')->except(['update', 'user_task', 'download_choice_users']);
        $this->middleware('admin')->only('download_choice_users');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authid=auth()->id();
        $data=User::find($authid);
        $position=$data->position;
        if($position=='Creator')
        {
            return view('AdminPanel.Users.register');
        }
        else
        {
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
        $e=$request->email;
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
        if($request->password!=$request->password_confirmation)
        {
            $messenger="Parollar bir biriga mos emas!";
            return view('AdminPanel.Users.register',["mes"=>$messenger,'data'=>$request]);
        }
        if(strlen($request->password)<8)
        {
            $messenger="Parol 8 belgidan kam!";
            return view('AdminPanel.Users.register',["mes"=>$messenger,'data'=>$request]);
        }
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
        $data=new User();
        $data->info_id=$i;
        $data->first_name=$request->first_name;
        $data->last_name=$request->last_name;
        $data->user=$request->user;
        $data->gender=$request->gender;
        $data->position=$request->position;
        $data->email=$request->email;
        $data->password=Hash::make("$request->password");
        $data->save();
        $sql=DB::select("select * from users where email='$request->email'");
        $id=$sql[0]->id;
        $inf=$sql[0]->info_id;

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
        }
        else
        {
            copy(public_path("BackUp/female.png"), public_path("Images/$inf/$filename"));
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
        $d=User::find($id);
        $dd=User::find(auth()->id());
        if($d==Null)
        {
            return redirect()->back();
        }
        if($dd->position=='Creator')
        {
            return view('AdminPanel.Users.repassword',['data'=>$d]);
        }
        if($d->id==auth()->id())
        {
            return view('AdminPanel.Users.repassword',['data'=>$d]);
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $uid=auth()->id();
        $user=auth()->user();
        if($id!=$uid)
        {
            if($user->position!='Creator')
            {
                return redirect()->back();
            }
        }
        $user=auth()->user();
        $data=User::find($id);
        $setting=DB::select("select * from settings where user_id=$uid");
        if($setting!=null)
        {
            $setting=$setting[0];
        }
        else
        {
            $setting=new Setting();
            $setting->theme="light";
        }
        return view('AdminPanel.Users.edit',["data"=>$data,"user"=>$user,'setting'=>$setting]);
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
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'user' => ['required', 'string', 'max:255'],
        ]);
        $uid=auth()->id();
        $user=auth()->user();
        if($id!=$uid)
        {
            if($user->position!='Creator')
            {
                return redirect()->back();
            }
        }
        $data=User::find($id);
        if(isset($request->profile))
        {
            if ($request->profile->getClientOriginalExtension()=="jpg") {
                $dp=$data->profile;
                $filename = "user" . time() . "." . $request->profile->getClientOriginalExtension();
                request()->profile->move(public_path("/UsersContent/$id"), $filename);
                $data->profile = $filename;
            }
        }
        if(isset($request->first_name))
        {
            $data->first_name=$request->first_name;
        }
        if(isset($request->last_name))
        {
            $data->last_name=$request->last_name;
        }
        if(isset($request->email))
        {
            $e=count(DB::select("select email from users where email='$request->email'"));
            if($e==0)
            {
                $data->email=$request->email;
            }
        }
        $data->save();
        if(isset($dp))
        {
            unlink(public_path('UsersContent/'.$id."/".$dp));
        }
        if(isset($request->password) && isset($request->password_confirmation))
        {
            if($request->password==$request->password_confirmation && $request->password!=null && strlen($request->password)>=8)
            {
                $data=User::find($id);
                $data->password=Hash::make($request->password);
                $data->save();
            }
        }
        if(isset($request->user))
        {
            $usern=$request->user;
            $ut=DB::select("select * from users where user='$usern'");
            if(count($ut)==0)
            {
                $data->user=$request->user;
            }
            $data->save();
        }
        return redirect()->route('AdminUsers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->position=='Creator') {
            $data = User::find($id);
            $info = Info::find($data->info_id);

            //if (is_file(public_path("UsersContent/" . $data->id . "/" . $data->profile))) {
//                unlink(public_path("UsersContent/" . $data->id . "/" . $data->profile));
//                rmdir("UsersContent/" . $data->id);
            //}
            //if (is_file(public_path("Images/" . $info->id . "/" . $info->image))) {
//                unlink(public_path("Images/" . $info->id . "/" . $info->image));
//                rmdir("Images/" . $info->id);
            //}

            User::destroy($data->id);
            Info::destroy($info->id);
        }
        return redirect()->back();
    }

    public function user_task(Request $request){
        $file = $request['file'];
        $user = $request['user_id'];
        $count = ChoiseUser::where('task_id', $request->task_id)->where('user_id', $user)->count();
        if ($count == 0){
            $role = User::findOrFail($user)->position;
            if ($role == 'student'){
                if (isset($file)){
                    $data = new ChoiseUser();
                    $data->task_id = $request->task_id;
                    $data->user_id = $user;

                    $filename = time().'.'.$file->getClientOriginalExtension();

                    $file->move('tasks', $filename);
                    $data->file = $filename;
                    $data->save();
                }
            }
        }
        return redirect()->back();
    }

    public function choice_users($task_id){
        $students = ChoiseUser::where('task_id',$task_id)->get();
        dd($students);
    }

    public function leaderboard(Request $request){
        $user = auth()->user();
        $search = $request->search;
        $type = $request->type;
        $data = [];
        if ($search == null){
            $students = ChoiseUser::all()->groupBy('user_id');
            $new_students = [];
            foreach($students as $key => $item){
                $new_students[$key]['user']=$item[0]->user->last_name.' '.$item[0]->user->first_name;
                $new_students[$key]['data'][] = $item;
                $new_students[$key]['count'] = count($students[$key]);
            }

            usort($new_students, function($a, $b) {
                return $b['count'] - $a['count'];
            });

            $data = $new_students;
        }
        if ($type == 'student'){
            $students = User::with('tasks')->orderby('first_name')->where('first_name', 'like', "%$search%")
            ->orWhere('last_name', 'like', "%$search%")->get();

            $data = $students;
        }

        if ($type == 'choice'){
            $students = Choice::with('tasks')->orderby('name')->where('name', 'like', "%$search%")->get();
            $data = $students;
        }
        $setting=DB::select("select * from settings where user_id=$user->id");
        if($setting!=null)
        {
            $setting=$setting[0];
        }
        else
        {
            $setting=new Setting();
            $setting->theme="light";
        }
        return view('AdminPanel.leaderboard.index', compact('data', 'user', 'setting', 'type'));
    }

    public function download_choice_users($id){
        $task = ChoiseUser::findorfail($id);
        $file = $task->file;
        $filePath = public_path('tasks/'.$file);

        // Check if the file exists
        if (file_exists($filePath)) {
            // Return the file for download
            return response()->download($filePath);
        } else {
            // Return a response if the file does not exist
            return response()->json(['error' => 'File not found'], 404);
        }
    }
}
