<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use App\Models\News;
use App\Models\Posts;
use App\Models\Setting;
use App\Models\Statutes;
use App\Models\User;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isNull;

class HomeController extends Controller
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
    public function Home()
    {
        $now = Carbon::now()->format('Y-m-d');
        $choices=Choice::whereDate('deadline', '>', $now)->get();
        return view('Home.index',['data'=>$choices]);
    }

    public function About()
    {
        return view('Home.about');
    }

    public function Services()
    {
        return view('Home.services');
    }

    public function Portfolio()
    {
        return view('Home.portfolio');
    }

    public function Team()
    {
        $data=DB::select("select * from users where `position`<>'Creator' AND `position`<>'student'");
        $leader=DB::select("select * from users where `position`='Creator'");
        if (count($data)>0) {
            $i=count($data);
            foreach ($data as $k=>$val) {
                if($i-$k==$i)
                {
                    $us[0]=$val;
                }
                if($k==$i-1)
                {
                    $us[0]=$val;
                    continue;
                }
                $us[$val->id] = $val;
            }
            $data = $us;
        }
        shuffle($data);
        return view('Home.team',['team'=>$data,'leader'=>$leader]);
    }

    public function Blog()
    {
        date_default_timezone_set('Asia/Tashkent');
        $page=1;
        $defpage=$page;
        $element=10;
        if(isset($_GET['page']))
        {
            if(is_numeric($_GET['page']) && $_GET['page']!=0)
            {
                $page=$_GET['page'];
                $defpage=(int)$page;
            }
        }
        $p=[];
        $page=abs($page-1)*$element;
        $posts=DB::select("select posts.id,posts.user_id,posts.title,posts.text,posts.type,posts.location,posts.created_at,posts.view,users.first_name,users.last_name,users.user,posts.updated_at from posts inner join users on posts.user_id=users.id ORDER BY id DESC LIMIT $element OFFSET $page");

        $maxpage=(int)ceil(DB::select("select count(*) as count from posts")[0]->count/$element);
        $d=null;
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
        $n=[];
        $news=DB::select("select * from news ORDER BY id DESC LIMIT 10");
        foreach ($news as $val)
        {
            $n[$val->id]=$val;
        }
        $news=$n;

        return view('Home.blog',['posts'=>$posts,'news'=>$news,'dpage'=>$defpage,'mpage'=>$maxpage]);
    }
    public function Statutes()
    {
        return view('Home.statutes');
    }

    public function searchnews(Request $request)
    {
        if (isset($request->search))
        {
            $search=$request->search."%";
            $data=DB::select("select * from news WHERE title LIKE '$search' || text LIKE '$search' LIMIT 10");
            return response()->json([
                "data" => $data,
            ]);
        }
    }
    public function newsdata(Request $request)
    {
        if (isset($request->search))
        {
            $data=News::find($request->search);
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
    function view()
    {
        if(isset($_GET['id'])) {
            $id=$_GET['id'];
            if(is_numeric($id)) {
                $data = Posts::find($id);
                $data->view += 1;
                $data->save();
            }
        }
        return redirect()->back();
    }
}
