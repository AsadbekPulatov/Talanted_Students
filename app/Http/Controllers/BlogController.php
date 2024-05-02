<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
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
        return redirect()->route("Blog.show",1);
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
    public function show($id)
    {
        $contet=10;
        $posts=Posts::all()->sortKeysDesc();
        $sf=Posts::all();
        $ff=News::all();
        $news=News::all()->sortKeysDesc();
        $i=0;
        $max=ceil(count($posts)/$contet);
        if($id>$max)
        {
            return redirect()->back();
        }
        $p=[];
        $ne=[];
        foreach ($posts as $val)
        {
            $i++;
            if($i<=$contet*($id-1))
            {
                continue;
            }
            $p[$val->id]=$val;
            $da = date_format(date_create($val->updated_at), "Y-m-d H:i:s");
            $datebase = date_parse($da);
            $datebase['month']=$this->DateMonth($datebase['month']);
            $date=$datebase['month']." ".$datebase['day'];
            $p[$val->id]->date=$date;
            if($i==$contet*$id)
            {
                break;
            }
        }
        $posts=$p;
        $i=0;
        foreach ($news as $val)
        {
            $i++;
            if($i<=$contet*($id-1))
            {
                continue;
            }
            $ne[$val->id]=$val;
            $da = date_format(date_create($val->updated_at), "Y-m-d H:i:s");
            $datebase = date_parse($da);
            $datebase['month']=$this->DateMonth($datebase['month']);
            $date=$datebase['month']." ".$datebase['day'];
            $ne[$val->id]->date=$date;
            if($i==$contet*$id)
            {
                break;
            }
        }
        $news=$ne;
        $users=DB::select("select * from users");
        foreach ($users as $val)
        {
            $u[$val->id]=$val;
        }
        $users=$u;
        return view('Home.blog',['users'=>$users,'data'=>$posts,'page'=>$id,'max'=>$max,'news'=>$news,'sf'=>$sf,'ff'=>$ff]);
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
