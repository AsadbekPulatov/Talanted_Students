<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;

class InfosController extends Controller
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
        dd($id);
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
            'FIO' => ['required', 'string', 'max:255'],
            'group' => ['required', 'string', 'max:255'],
            'passport' => ['required', 'string', 'max:255'],
            'JSHSHIR' => ['required', 'string', 'max:255'],
            'date_birthday' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'succes' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
        ]);
        $i=$request->id;
        $data=Info::find($request->id);
        $data->FIO=$request->FIO;
        $data->group=$request->group;
        $data->passport=$request->passport;
        $data->JSHSHIR=$request->JSHSHIR;
        $data->date_birthday=$request->date_birthday;
        $data->location=$request->location;
        $data->succes=$request->succes;
        $data->phone=$request->phone;
        if(isset($request->reference))
        {
            if($request->reference->getClientOriginalExtension()=="pdf" or $request->reference->getClientOriginalExtension()=="doc" or $request->reference->getClientOriginalExtension()=="docx")
            {
                $filename = $i."." . $request->reference->getClientOriginalExtension();
                request()->reference->move(public_path("/Infos"), $filename);
                $data->reference=$request->reference->getClientOriginalExtension();
            }
        }
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
        //
    }
}
