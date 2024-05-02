<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Posts;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isNull;

class PostController extends Controller
{
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
        $id=auth()->id();
        $user=auth()->user();
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
        return view('AdminPanel.Posts.add',["user"=>$user,'news'=>$news,'setting'=>$setting]);
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
            'title' => ['required', 'string', 'max:255'],
            'text' => ['required', 'string'],
            'post' => ['required'],
        ]);
        if(isset($request->title) && isset($request->text) && ($request->post->getClientOriginalExtension()=="mp4" or $request->post->getClientOriginalExtension()=="jpg")) {
            $id=auth()->id();
            $data=new Posts();
            $data->user_id=$id;
            $data->title=$request->title;
            $data->text=$request->text;
            $filename = "img".time() . "." . $request->post->getClientOriginalExtension();
            request()->post->move(public_path("/Posts/$id"), $filename);
            $data->type=$request->post->getClientOriginalExtension();
            $data->location=$filename;
            $data->save();
        }
        return redirect()->route('AdminPosts');
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
        $uid=auth()->id();
        $post=Posts::find($id);
        if($post==null)
            return redirect()->back();
        if($uid!=$post->user_id)
        {
            return redirect()->back();
        }
        $user=auth()->user();
        $news=News::all()->sortKeysDesc();
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
        return view('AdminPanel.Posts.edit',["user"=>$user,'news'=>$news,'setting'=>$setting,'data'=>$post]);
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
            'title' => ['required', 'string', 'max:255'],
            'text' => ['required', 'string'],
            'post' => ['required'],
        ]);
        $uid=auth()->id();
        $data=Posts::find($id);
        if($data==null)
            return redirect()->back();
        if($uid!=$data->user_id)
        {
            return redirect()->back();
        }
        if(isset($request->title)) {
            $data->title = $request->title;
        }
        if(isset($request->text)) {
            $data->title = $request->title;
        }
        $oldfile=null;
        if(isset($request->post)){
            if($request->post->getClientOriginalExtension()=="mp4" or $request->post->getClientOriginalExtension()=="jpg") {
                $oldfile=$data->location;
                $filename = "img" . time() . "." .$request->post->getClientOriginalExtension();
                request()->post->move(public_path("/Posts/$uid"), $filename);
                $data->type = $request->post->getClientOriginalExtension();
                $data->location = $filename;
            }
        }
        $data->save();
        if($oldfile!=null)
        {
            unlink(public_path("Posts/".$uid."/".$oldfile));
        }
        return redirect()->route('AdminPosts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $uid = auth()->id();
        $data = Posts::find($id);
        if ($data == null)
            return redirect()->back();
        if ($uid != $data->user_id) {
            return redirect()->back();
        }
        $oldfile = $data->location;
        if ($oldfile != null) {
            unlink(public_path("Posts/" . $uid . "/" . $oldfile));
        }
        $data->save();
        Posts::destroy($id);
        return redirect()->back();
    }
}
