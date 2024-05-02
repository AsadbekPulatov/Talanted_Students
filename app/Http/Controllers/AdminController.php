<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use App\Models\Info;
use App\Models\News;
use App\Models\Posts;
use App\Models\Setting;
use App\Models\Statutes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isNull;

class AdminController extends Controller
{

    public function DateMonth($m)
    {
        if($m==1) return "Jan";
        elseif($m==2) return "Feb";
        elseif($m==3) return "Mart";
        elseif($m==4) return "Apr";
        elseif($m==5) return "May";
        elseif($m==6) return "June";
        elseif($m==7) return "July";
        elseif($m==8) return "Avg";
        elseif($m==9) return "Sep";
        elseif($m==10) return "Oct";
        elseif($m==11) return "Nov";
        elseif($m==12) return "Dec";
    }
    public function AdminDashboard()
    {
//        return redirect()->route("AdminUsers");
        $id=auth()->id();
        $data=User::find(auth()->id());
        $news=News::all()->sortKeysDesc();
        $setting=DB::select("select * from settings where user_id=$id");
        if($setting!=null)
        {
            $setting=$setting[0];
        }
        else
        {
            $setting=new Setting();
            $setting->theme="light";
        }
        return view('AdminPanel.Dashboard.texrobot',['user'=>$data,'news'=>$news,'setting'=>$setting]);
    }

    public function AdminProfile()
    {
        $data=User::find(auth()->id());
        return view('AdminPanel.profile',['user'=>$data]);
    }

    public function AdminUsers()
    {
        $id=auth()->id();
        $data=User::where('position', '!=', 'student')->get();
        $sf= User::where('position', '!=', 'student')->where('id', '!=', $id)->get();
        if (count($data)>0) {
            foreach ($data as $val) {
                $us[$val->id] = $val;
            }
            $data = $us;
        }
        $user=auth()->user();
        if (auth()->user()->position=="Creator")
        {
            $info=Info::all();
        }
        else
        {
            $info[0]=Info::find(auth()->user()->info_id);
        }
        if(count($info)>0) {
            foreach ($info as $val) {
                $in[$val->id] = $val;
                if(!isNull($val->image) || !is_file(public_path("Images/".$val->id."/".$val->image)))
                {
                    $in[$val->id]->image = "../info.png";
                }
            }
            $info = $in;
        }
        $news=News::all()->sortKeysDesc();
        $setting=DB::select("select * from settings where user_id=$id");
        if($setting!=null)
        {
            $setting=$setting[0];
        }
        else
        {
            $setting=new Setting();
            $setting->theme="light";
        }
        return view('AdminPanel.Users.index',["user"=>$user,"data"=>$data,'infos'=>$info,'news'=>$news,'sf'=>$sf,'setting'=>$setting]);
    }

    public function AdminStudents()
    {
        $user=auth()->user();
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
        return view('AdminPanel.master', ["user"=>$user, 'setting'=>$setting]);
    }

    public function AdminPosts()
    {
        $id=auth()->id();
        $user=auth()->user();
        $posts=DB::select("select * from posts where user_id=$id ORDER by id desc LIMIT 5");
        $news=News::all()->sortKeysDesc();
        $setting=DB::select("select * from settings where user_id=$id");
        if($setting!=null)
        {
            $setting=$setting[0];
        }
        else
        {
            $setting=new Setting();
            $setting->theme="light";
        }
        $p=[];
        foreach ($posts as $val)
        {
            $date=date_parse($val->created_at);
            if(date_parse(date('y-m-d h:i:s'))['day']==$date['day']) {
                $val->created_at = "Today, " . $date['hour'] . ":" . $date['minute'];
            }
            elseif (date_parse(date('y-m-d h:i:s'))['day']==$date['day']+1)
            {
                $val->created_at = "Yesterday, " . $date['hour'] . ":" . $date['minute'];
            }
            else
            {
                $val->created_at = $this->DateMonth($date['month'])." ". $date['day']. ", " . $date['hour'] . ":" . $date['minute'];
            }
            $p[$val->id]=$val;
        }
        $posts=$p;
        return view('AdminPanel.Posts.index',["user"=>$user,"data"=>$posts,'news'=>$news,'setting'=>$setting]);
    }

    public function AdminNews()
    {
        $id=auth()->id();
        $data=DB::select("select * from news order by id desc LIMIT 10");
        $user=auth()->user();
        $news=$data;
        $ne=[];
        if(count($news)>0) {
            foreach ($news as $val) {
                $ne[$val->id] = $val;
            }
            $news = $ne;
        }
        $setting=DB::select("select * from settings where user_id=$id");
        if($setting!=null)
        {
            $setting=$setting[0];
        }
        else
        {
            $setting=new Setting();
            $setting->theme="light";
        }
        return view('AdminPanel.News.index',["user"=>$user,"data"=>$data,'news'=>$news,'setting'=>$setting]);
    }

    public function AdminStatutes(Request $request)
    {
        $search = $request['search'];
        $date = $request['date'];

        $statutes=Statutes::orderby('id', 'desc');
        if (isset($search)){
            $statutes=$statutes->where('name', 'like', "%$search%");
        }
        if (isset($date)){
            $statutes=$statutes->where('date', $date);
        }
        $data=User::find(auth()->id());
        $statutes=$statutes->get();
        if(count($statutes)>0) {
            foreach ($statutes as $val) {
                $st[$val->id] = $val;
            }
            $statutes = $st;
        }
        $news=News::all()->sortKeysDesc();
        $setting=DB::select("select * from settings where user_id=$data->id");
        if($setting!=null)
        {
            $setting=$setting[0];
        }
        else
        {
            $setting=new Setting();
            $setting->theme="light";
        }
        return view('AdminPanel.Statutes.index',["user"=>$data,"data"=>$statutes,'news'=>$news,'setting'=>$setting]);
    }

    public function AdminChoices()
    {
        $id=auth()->id();
        $data=DB::select("select * from choices order by id desc LIMIT 10");
        $user=auth()->user();
        $choices=$data;
        if(count($choices)>0) {
            foreach ($choices as $val) {
                $ne[$val->id] = $val;
            }
            $choices = $ne;
        }
        $setting=DB::select("select * from settings where user_id=$id");
        if($setting!=null)
        {
            $setting=$setting[0];
        }
        else
        {
            $setting=new Setting();
            $setting->theme="light";
        }
        return view('AdminPanel.Choices.index',["user"=>$user,"data"=>$data,'choices'=>$choices,'setting'=>$setting]);
    }

    public function AdminInfos()
    {
        $news=News::all()->sortKeysDesc();
        $data=User::find(auth()->id());
        return view('AdminPanel.Infos.index',["user"=>$data,'news'=>$news]);
    }

    public function AdminPrivileges()
    {
        $data=User::find(auth()->id());
        $news=News::all()->sortKeysDesc();
        return view('AdminPanel.Privileges.index',["user"=>$data,'news'=>$news]);
    }

    public function Setting(Request $request)
    {
        $id=auth()->id();
        if(DB::select("select * from settings where user_id=$id")==null)
        {
            $user=new Setting();
            $user->user_id=auth()->id();
        }
        else
        {
            $user=Setting::find($id);
        }
        if(isset($request->theme))
        {
            if($request->theme=='light' || $request->theme=='dark')
            {
                $user->theme=$request->theme;
            }
        }
        if(isset($request->sidebar))
        {
            if($request->sidebar=='light' || $request->sidebar=='dark')
            {
                $user->sidebar=$request->sidebar;
            }
        }
        if(isset($request->navbar))
        {
            if($request->navbar=='0' || $request->navbar=='1')
            {
                $user->navbar=$request->navbar;
            }
        }
        $user->save();
        return response()->json([
            "status" => "success",
            "message" => "Task has been done"
        ]);
    }
    public function more(Request $request)
    {
        return response()->json([
            "status" => "success",
            "message" => "Task has been done"
        ]);
    }
    public function RePassword()
    {
        if(isset($_GET['id'])) {
            $id=$_GET['id'];
            if(is_numeric($id))
            {
                if(User::find($id)!=null)
                {
                    $position=auth()->user()->position;
                    $uid=User::find($id)->id;
                    if($id==$uid || $position="Creator")
                    {
                        $data=auth()->user();
                        return view("AdminPanel.Users.repassword",['data'=>$data]);
                    }
                }
            }
        }
        return redirect()->back();
    }

    public function morenews(Request $request)
    {
        if (isset($request->offset))
        {
            $data=DB::select("select * from news ORDER BY id DESC LIMIT 10 OFFSET $request->offset");
            return response()->json([
                "data" => $data,
            ]);
        }
        $data=new News();
        $data->id=0;
        $data->title="None";
        $data->text="None";
        return response()->json([
            "data" => $data,
        ]);
    }

    public function morechoices(Request $request)
    {
        if (isset($request->offset))
        {
            $data=DB::select("select * from choices ORDER BY id DESC LIMIT 10 OFFSET $request->offset");
            return response()->json([
                "data" => $data,
            ]);
        }
        $data=new News();
        $data->id=0;
        $data->title="None";
        $data->text="None";
        return response()->json([
            "data" => $data,
        ]);
    }

    public function morestatutes(Request $request)
    {
        if (isset($request->offset))
        {
            $data=DB::select("select * from statutes ORDER BY id DESC LIMIT 10 OFFSET $request->offset");
            return response()->json([
                "data" => $data,
            ]);
        }
        $data=new News();
        $data->id=0;
        $data->title="None";
        $data->text="None";
        return response()->json([
            "data" => $data,
        ]);
    }

    public function moreposts(Request $request)
    {
        if (isset($request->offset))
        {
            $uid=auth()->id();
            $posts=DB::select("select * from posts where user_id=$uid ORDER BY id DESC LIMIT 5 OFFSET $request->offset");
            $p=null;
            $i=0;
            foreach ($posts as $val) {
                $date=date_parse($val->created_at);
                if(date_parse(date('y-m-d h:i:s'))['day']==$date['day']) {
                    $val->created_at = "Today, " . $date['hour'] . ":" . $date['minute'];
                }
                elseif (date_parse(date('y-m-d h:i:s'))['day']==$date['day']+1)
                {
                    $val->created_at = "Yesterday, " . $date['hour'] . ":" . $date['minute'];
                }
                else
                {
                    $val->created_at = $this->DateMonth($date['month'])." ". $date['day']. ", " . $date['hour'] . ":" . $date['minute'];
                }
                $p[$i]=$val;
                $i++;
            }
            $posts=$p;
            return response()->json([
                "data" => $posts,
            ]);
        }
        $data=new Posts();
        return response()->json([
            "data" => $data,
        ]);
    }

}
