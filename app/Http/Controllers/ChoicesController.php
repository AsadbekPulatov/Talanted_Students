<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use App\Models\News;
use Illuminate\Http\Request;

class ChoicesController extends Controller
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
        if(auth()->user()['position']=='Creator')
        {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'text' => ['required', 'string'],
                'location' => ['required', 'string'],
                'start_date' => ['required', 'date'],
                'end_date' => ['required', 'date'],
                'files_list' => ['required', 'string'],
                'deadline' => ['required', 'date'],
            ]);
            $data=new Choice();
            $data->name=$request->name;
            $data->text=$request->text;
            $data->location=$request->location;
            $data->start_date=$request->start_date;
            $data->end_date=$request->end_date;
            $data->files_list=$request->files_list;
            $data->deadline=$request->deadline;
            $data->save();
        }
        return redirect()->back();
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'text' => ['required', 'string'],
            'location' => ['required', 'string'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'files_list' => ['required', 'string'],
            'deadline' => ['required', 'date'],
        ]);
        $user=auth()->user();
        if ($user->position!="Creator")
        {
            return redirect()->back();
        }
        $id=$request->id;
        $data=Choice::find($id);
        $data->name=$request->name;
        $data->text=$request->text;
        $data->location=$request->location;
        $data->start_date=$request->start_date;
        $data->end_date=$request->end_date;
        $data->files_list=$request->files_list;
        $data->deadline=$request->deadline;
        $data->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=auth()->user();
        if ($user->position=="Creator")
        {
            Choice::destroy($id);
        }
        return redirect()->back();
    }
}
