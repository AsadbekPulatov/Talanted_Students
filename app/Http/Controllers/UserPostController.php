<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserPostController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        $page=1;
        $defpage=$page;
        $element=9;
        if(isset($_GET['page']))
        {
            if(is_numeric($_GET['page']) && $_GET['page']!=0)
            {
                $page=$_GET['page'];
                $defpage=(int)$page;
            }
        }

        $user=DB::table('users')->where('user',$user)->get();
        if(count($user)==0)
        {
            return redirect()->back();
        }
        $user=$user[0];
        $p=[];
        $page=abs($page-1)*$element;
        $posts=DB::select("select posts.id,posts.user_id,posts.title,posts.text,posts.type,posts.location,posts.created_at,posts.view,users.first_name,users.last_name,users.user from posts inner join users on posts.user_id=users.id where posts.user_id='$user->id' ORDER BY id DESC LIMIT $element OFFSET $page");
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
        $maxpage=(int)ceil(DB::select("select count(*) as count from posts where user_id='$user->id'")[0]->count/$element);
        return view('Home.usercontent',['user'=>$user,'posts'=>$posts,'dpage'=>$defpage,'mpage'=>$maxpage]);
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
