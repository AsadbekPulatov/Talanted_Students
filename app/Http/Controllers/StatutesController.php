<?php

namespace App\Http\Controllers;

use App\Models\Statutes;
use Illuminate\Http\Request;

class StatutesController extends Controller
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
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'statute' => ['required', 'file'],
            ]
        );
        $user=auth()->user();
        if ($user->position!="Creator")
        {
            return redirect()->back();
        }
        $file=\request()->statute;
        if($file->getClientOriginalExtension()=='pdf')
        {
            $data=new Statutes();
            $filename = "statute" . time() . ".pdf";
            $file->move(public_path("/StatutesFile"), $filename);
            $data->name=$request->name;
            $data->location=$filename;
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
        $request->validate(
            [
                'id' => ['required'],
                'name' => ['required', 'string', 'max:255'],
            ]
        );
        $user=auth()->user();
        if ($user->position=="Creator")
        {
            $data=Statutes::find($request->id);
            $data->name=$request->name;
            $data->save();
            if(isset($request->statute))
            {
                $file=\request()->statute;
                if($file->getClientOriginalExtension()=='pdf')
                {
                    $oldloc=$data->location;
                    $filename = "statute" . time() . ".pdf";
                    $file->move(public_path("/StatutesFile"), $filename);
                    $data->location = $filename;
                    $data->save();
                    unlink(public_path("StatutesFile/".$oldloc));
                }
            }
        }
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
            $loc=Statutes::find($id)->location;
            Statutes::destroy($id);
            unlink(public_path("StatutesFile/".$loc));
        }
        return redirect()->back();
    }
}
