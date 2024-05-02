<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpWord\TemplateProcessor;

class ReferenceController extends Controller
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
            'FIO' => ['required', 'string', 'max:255'],
            'group' => ['required', 'string', 'max:255'],
            'passport' => ['required', 'string', 'max:255'],
            'JSHSHIR' => ['required', 'string', 'max:255'],
            'date_birthday' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'succes' => ['required', 'string', 'max:255'],
        ]);
        $users=auth()->user();
        $rid=DB::select("select id,info_id from users where info_id='$request->id' LIMIT 1")[0]->id;
        if($users->position=="Creator" || $rid==auth()->id()) {
            $data = Info::find($request->id);
            $data->FIO = $request->FIO;
            $data->group = $request->group;
            $data->passport = $request->passport;
            $data->JSHSHIR = $request->JSHSHIR;
            $data->date_birthday = $request->date_birthday;
            $data->location = $request->location;
            $data->succes = $request->succes;
            $data->phone = $request->phone;

            if($request->image != null) {
                $file = $request->file('image');
                if ($file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png') {
                    $filename = "info" . $request->id . time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path("Images/" . $request->id . '/'), $filename);
                    if(is_file(public_path("Images/" . $request->id . '/' . $data->image))) {
                        unlink(public_path("Images/" . $request->id . '/' . $data->image));
                    }
                    $data->image = $filename;
                }
            }

            $data->save();
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
        //
    }
}
