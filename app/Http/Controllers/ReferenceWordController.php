<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\ReferenceDocument;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \PhpOffice\PhpWord\TemplateProcessor;
use function PHPUnit\Framework\isNull;

class ReferenceWordController extends Controller
{

    public function DateMonth($m)
    {
        if($m==1) return "yanvar";
        elseif($m==2) return "fevral";
        elseif($m==3) return "mart";
        elseif($m==4) return "aprel";
        elseif($m==5) return "may";
        elseif($m==6) return "iyun";
        elseif($m==7) return "iyul";
        elseif($m==8) return "avgust";
        elseif($m==9) return "sentabr";
        elseif($m==10) return "oktabr";
        elseif($m==11) return "noyabr";
        elseif($m==12) return "dekabr";
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
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'patronymic' => ['required', 'string', 'max:255'],
            'text' => ['required', 'string', 'max:255'],
            'birthday_location' => ['required', 'max:255'],
            'nation' => ['required', 'string', 'max:255'],
            'info' => ['required', 'string', 'max:255'],
            'party' => ['required', 'string', 'max:255'],
            'graduated' => ['required', 'string', 'max:255'],
            'specialist' => ['required', 'string', 'max:255'],
            'academic_degree' => ['required', 'string', 'max:255'],
            'academic_title' => ['required', 'string', 'max:255'],
            'language' => ['required', 'string', 'max:255'],
            'state_award' => ['required', 'string', 'max:255'],
            'party_member' => ['required', 'string', 'max:255'],
        ]);
        $request->first_name=strtoupper(substr($request->first_name,0,1)).strtolower(substr($request->first_name,1));
        $request->last_name=strtoupper(substr($request->last_name,0,1)).strtolower(substr($request->last_name,1));
        $request->patronymic=strtoupper(substr($request->patronymic,0,1)).strtolower(substr($request->patronymic,1));
        $request->text=strtoupper(substr($request->text,0,1)).substr($request->text,1);
        $request->birthday_location=strtoupper(substr($request->birthday_location,0,1)).substr($request->birthday_location,1);
        $request->nation=strtoupper(substr($request->nation,0,1)).strtolower(substr($request->nation,1));
        $request->info=strtoupper(substr($request->info,0,1)).strtolower(substr($request->info,1));
        $request->party=strtoupper(substr($request->party,0,1)).substr($request->party,1);
        $request->graduated=strtoupper(substr($request->graduated,0,1)).substr($request->graduated,1);
        $request->specialist=strtoupper(substr($request->specialist,0,1)).substr($request->specialist,1);
        $request->academic_degree=strtoupper(substr($request->academic_degree,0,1)).strtolower(substr($request->academic_degree,1));
        $request->academic_title=strtoupper(substr($request->academic_title,0,1)).substr($request->academic_title,1);
        $request->language=strtoupper(substr($request->language,0,1)).strtolower(substr($request->language,1));
        $request->state_award=strtoupper(substr($request->state_award,0,1)).substr($request->state_award,1);
        $request->party_member=strtoupper(substr($request->party_member,0,1)).substr($request->party_member,1);
        $user=auth()->user();
        $ref=DB::select("select * from reference_documents where user_id=$user->id");

        if(count($ref)!=0)
        {
            $data=ReferenceDocument::find($ref[0]->id);
            if ($data->imglocation!=null)
            {
                $img=public_path('References/'.$data->imglocation);
            }
            else
            {
                if ($user->gender=='Male')
                {
                    $img=public_path('BackUp/male.png');
                }
                else
                {
                    $img=public_path('BackUp/female.png');
                }
            }
        }
        else
        {
            $data=new ReferenceDocument();
            if ($user->gender=='Male')
            {
                $img=public_path('BackUp/male.png');
            }
            else
            {
                $img=public_path('BackUp/female.png');
            }
        }
        if(isset($request->img))
        {
            if($data->imglocation!=null)
            {
                unlink(public_path('References/'.$data->imglocation));
            }
            $img=\request()->img;
        }
        $data->user_id=$user->id;
        $data->first_name=$request->first_name;
        $data->last_name=$request->last_name;
        $data->patronymic=$request->patronymic;
        $data->date=$request->date;
        $data->text=$request->text;
        $data->birthday=$request->birthday;
        $data->birthday_location=$request->birthday_location;
        $data->nation=$request->nation;
        $data->info=$request->info;
        $data->party=$request->party;
        $data->graduated=$request->graduated;
        $data->specialist=$request->specialist;
        $data->academic_degree=$request->academic_degree;
        $data->academic_title=$request->academic_title;
        $data->language=$request->language;
        $data->state_award=$request->state_award;
        $data->party_member=$request->party_member;
        $data->family=json_encode($request->family);
        $data->fullname=json_encode($request->fullname);
        $data->fbirthday=json_encode($request->fbirthday);
        $data->fbirthday_location=json_encode($request->fbirthday_location);
        $data->workplace=json_encode($request->workplace);
        $data->location=json_encode($request->location);

        $fcount=count($request->family);

        $temp='temp'.$fcount.'.docx';

        $templateProcess=new TemplateProcessor(public_path('Template/'.$temp));

        $dateparse=date_parse($request->date);
        $date=$dateparse['year']."-yil, ".$dateparse['day']."-".$this->DateMonth($dateparse['month']);

        $dateparse=date_parse($request->birthday);
        $birthday=$dateparse['year']."-yil, ".$dateparse['day']."-".$this->DateMonth($dateparse['month']);

        $templateProcess->setValues(
            [
                'first_name'=> $request->first_name,
                'last_name' => $request->last_name,
                'patronymic' => $request->patronymic,
                'date' => $date,
                'text' => $request->text,
                'birthday' => $birthday,
                'birthday_location' => $request->birthday_location,
                'nation' => $request->nation,
                'party' => $request->party,
                'info' => $request->info,
                'graduated' => $request->graduated,
                'specialist' => $request->specialist,
                'academic_degree' => $request->academic_degree,
                'academic_title' => $request->academic_title,
                'languages' => $request->language,
                'state_award' => $request->state_award,
                'party_member' => $request->party_member
            ]
        );
        for($i=0;$i<$fcount;$i++){
            $dateparse=date_parse($request->fbirthday[$i]);
            $fb=$dateparse['year']."-yil, ".$dateparse['day']."-".$this->DateMonth($dateparse['month']);
            $templateProcess->setValues(
                [
                'family'.($i+1)=>strtoupper(substr($request->family[$i],0,1)).substr($request->family[$i],1),
                'fullname'.($i+1)=>strtoupper(substr($request->fullname[$i],0,1)).substr($request->fullname[$i],1),
                'birthday_year'.($i+1)=>$fb,
                'birthday_location'.($i+1)=>strtoupper(substr($request->fbirthday_location[$i],0,1)).substr($request->fbirthday_location[$i],1),
                'workplace'.($i+1)=>strtoupper(substr($request->workplace[$i],0,1)).substr($request->workplace[$i],1),
                'location'.($i+1)=>strtoupper(substr($request->location[$i],0,1)).substr($request->location[$i],1),
                ]
            );
        }
        $old=null;
        $il=$user->id.time().'.jpg';

        if(isset($request->img))
        {
            $img->move(public_path("/References"), $il);
            $data->imglocation=$il;
            $img=public_path("References/".$il);
        }
        $templateProcess->setImageValue(
            'image',
            [
                'wrappingStyle' => 'tight',
                'path' => $img,
                'width' => 100,
                'height' => 133,
                'ratio' => false,
            ]
        );
        $fl=$user->id.time().'.docx';
        $pathname= public_path('References/'.$fl);
        $templateProcess->saveAs($pathname);

        $old=$data->filelocation;
        $data->filelocation=$fl;
        $data->save();
        if($old!=null)
        {
            unlink(public_path("References/".$old));
        }
        $filename=$data->first_name." ".$data->last_name." ".$data->patronymic;
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename='.$filename.'.docx');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessignml.document');
        readfile($pathname);

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
        if (auth()->id()!=$id)
        {
            if (auth()->user()->position!='Creator')
            {
                return redirect()->back();
            }
            $ref=DB::select("select * from reference_documents where user_id=$id");
            if(count($ref)!=0) {
                $ref=$ref[0];
                $filename=$ref->first_name." ".$ref->last_name." ".$ref->patronymic;
                header('Content-Description: File Transfer');
                header('Content-Disposition: attachment; filename='.$filename.'.docx');
                header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessignml.document');
                $pathname = public_path('References/'.$ref->filelocation);
                readfile($pathname);
            }
            return redirect()->back();
        }
        $user=User::find($id);
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
        $reference=DB::select("select * from reference_documents where user_id=$user->id");
        $img=null;
        if(count($reference)==0) {
            $info=Info::find($user->info_id);
            $str=$info->FIO." ";
            $f="";
            $a=null;
            for($i=0;$i<strlen($str);$i++)
            {
                if($str[$i]!=' ')
                {
                    $f.=$str[$i];
                }
                else
                {
                    $a[]=$f;
                    $f="";
                }
            }

            $reference=new ReferenceDocument();

            if (count($a)==4)
            {
                $reference->first_name = $a[1];
                $reference->last_name = $a[0];
                $reference->patronymic = $a[2]." ".$a[3];
            }
            elseif(count($a)==3) {
                $reference->first_name = $a[1];
                $reference->last_name = $a[0];
                $reference->patronymic = $a[2];
            }
            elseif (count($a)==2){
                $reference->first_name = $a[1];
                $reference->last_name = $a[0];
                $reference->patronymic = "";
            }
            else
            {
                $reference->first_name = $user->first_name;
                $reference->last_name = $user->last_name;
                $reference->patronymic = "";
            }
            $reference->date="";
            $reference->text="";
            $reference->birthday=$info->date_birthday;
            $reference->birthday_location=$info->location;
            $reference->nation="O`zbek";
            $reference->party="Yo`q";
            $reference->info="";
            $reference->graduated="";
            $reference->specialist="";
            $reference->academic_degree="Yo`q";
            $reference->academic_title="Yo`q";
            $reference->language="Yo`q";
            $reference->state_award="Yo`q";
            $reference->party_member="Yo`q";
            $family=[""];
            $fullname=[""];
            $fbirthday=[""];
            $fbirthday_location=[""];
            $location=[""];
            $workplace=[""];
        }
        else
        {
            $reference=$reference[0];
            $family=json_decode($reference->family);
            $fullname=json_decode($reference->fullname);
            $fbirthday=json_decode($reference->fbirthday);
            $fbirthday_location=json_decode($reference->fbirthday_location);
            $location=json_decode($reference->location);
            $workplace=json_decode($reference->workplace);
            $img=$reference->imglocation;
        }
        return view('AdminPanel.Users.reference',['user'=>$user,'setting'=>$setting,'reference'=>$reference,'family'=>$family,'fullname'=>$fullname,'fbirthday'=>$fbirthday,'fbirthday_location'=>$fbirthday_location,'location'=>$location,'workplace'=>$workplace,'img'=>$img]);
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
