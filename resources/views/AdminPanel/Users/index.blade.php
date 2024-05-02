@extends('AdminPanel.master')
@section('title', 'Yordamchilar')
@section('content')

    <div class="w-full px-6 py-6 mx-auto">
        <!-- table 1 -->

        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="dark:text-white text-justify">Authors table</h6>
                    </div>

                    @if($user->position=="Creator")
                    <div class="p-6" align="end">
                        <a href="{{route('Users.create')}}" class="w-100" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" color="#008dff" width="40" height="40" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                        </a>
                    </div>
                    @endif

                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                <thead class="align-bottom">
                                <tr>
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Author</th>
                                    <th class="px-6 py-3 capitalize align-middle bg-transparent border-b border-collapse border-solid shadow-none dark:border-white/40 dark:text-white tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td class="p-2 align-middle bg-transparent border-b dark:border-white whitespace-nowrap shadow-transparent btm-with">
                                        <div class="flex px-2 py-1">
                                            <a href="{{route('Users.edit',$user->id)}}">
                                                @if(isset($user->profile))
                                                    <img src="{{asset('UsersContent')."/".$user->id."/".$user->profile}}" class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-in-out h-9 w-9 rounded-circle" alt="user" />
                                                @endif
                                            </a>
                                            <div class="flex flex-col justify-center">
                                                <h6 class="mb-0 text-sm leading-normal dark:text-white">{{$user->first_name}} {{$user->last_name}}</h6>
                                                <a href="{{asset('user/'.$user->user)}}" class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">{{$user->user}}</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b dark:border-white whitespace-nowrap shadow-transparent btm-with">
                                        <button onclick="sw2info({{$user->info_id}})" type="button" class="btn btn-info" style="color: aqua">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-info-lg" viewBox="0 0 20 20">
                                                <path d="m9.708 6.075-3.024.379-.108.502.595.108c.387.093.464.232.38.619l-.975 4.577c-.255 1.183.14 1.74 1.067 1.74.72 0 1.554-.332 1.933-.789l.116-.549c-.263.232-.65.325-.905.325-.363 0-.494-.255-.402-.704l1.323-6.208Zm.091-2.755a1.32 1.32 0 1 1-2.64 0 1.32 1.32 0 0 1 2.64 0Z"/>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                @foreach($sf as $val)
                                <tr>
                                    <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <div class="flex px-2 py-1">
                                            <div>
                                                @if($user->position=="Creator")
                                            <a href="{{route('Users.edit',$val->id)}}">
                                                @endif
                                                @if(isset($val->profile))
                                                <img src="{{asset('UsersContent')."/".$val->id."/".$val->profile}}" class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-in-out h-9 w-9 rounded-circle" alt="user" />
                                                @endif
                                                @if($user->position=="Creator")
                                            </a>
                                                @endif
                                            </div>
                                            <div class="flex flex-col justify-center">
                                                <h6 class="mb-0 text-sm leading-normal dark:text-white">{{$val->first_name}} {{$val->last_name}}</h6>
                                                <a href="{{asset('user/'.$val->user)}}" class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">{{$val->user}}</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">

                                        @if($user->position=="Creator")
                                        <form action="{{route('Users.destroy',$val->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="sw2info({{$val->info_id}})" type="button" class="btn btn-info" style="color: aqua">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-info-lg" viewBox="0 0 20 20">
                                                    <path d="m9.708 6.075-3.024.379-.108.502.595.108c.387.093.464.232.38.619l-.975 4.577c-.255 1.183.14 1.74 1.067 1.74.72 0 1.554-.332 1.933-.789l.116-.549c-.263.232-.65.325-.905.325-.363 0-.494-.255-.402-.704l1.323-6.208Zm.091-2.755a1.32 1.32 0 1 1-2.64 0 1.32 1.32 0 0 1 2.64 0Z"/>
                                                </svg>
                                            </button>
                                            <button onclick="fireSweetAlert({{$val->id}})" type="button" class="btn btn-danger m-6" style="color: red">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash" viewBox="0 0 20 20">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                </svg>
                                            </button>
                                            <button id="button{{$val->id}}" type="submit" style="display: none" class="btn btn-danger m-6">
                                            </button>
                                        </form>
                                        @endif

                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="pt-4">
            <div class="w-full px-6 mx-auto">
                <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
                    <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                        <div class="text-sm leading-normal text-center text-slate-500 lg:text-left">
                            ©
                            <script>
                                document.write(new Date().getFullYear() + ",");
                            </script>
                            Created by
                            <a href="https://t.me/sfarruhbek_7" class="font-semibold dark:text-white text-slate-700" target="_blank">S.Farruhbek</a>.
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 mt-0 shrink-0 lg:w-1/2 lg:flex-none">
                        <ul class="flex flex-wrap justify-center pl-0 mb-0 list-none lg:justify-end">
                            <li class="nav-item">
                                <a href="https://instagram.com/unusual_team_official" class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-slate-500" target="_blank">Unusual Team</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://t.me/unusual_team_official" class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-slate-500" target="_blank">About Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>


    <div fixed-plugin>
        <form style="display: none" action="{{ route('Reference.update',1)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="file" accept=".jpg" id="rimg" name="image">
            <input id="rid" required name="id">
            <input id="rFIO" required name="FIO">
            <input id="rgroup" required name="group">
            <input id="rpassport" required name="passport">
            <input id="rJSHSHIR" required name="JSHSHIR">
            <input type="date" id="rdate_birthday" required name="date_birthday">
            <input id="rlocation" required name="location">
            <input id="rsucces" required name="succes">
            <input id="rphone" required name="phone">
            <button id="submit" type="submit">Save</button>
        </form>
    </div>
@endsection
@section('script')
<script>
    let infos = @json($infos);
    let userid= @json($user->id);
    function sw2info(id)
    {
        document.getElementById('rid').value=infos[id]['id'];
        document.getElementById('rFIO').value=infos[id]['FIO'];
        document.getElementById('rgroup').value=infos[id]['group'];
        document.getElementById('rpassport').value=infos[id]['passport'];
        document.getElementById('rJSHSHIR').value=infos[id]['JSHSHIR'];
        document.getElementById('rdate_birthday').value=infos[id]['date_birthday'];
        document.getElementById('rlocation').value=infos[id]['location'];
        document.getElementById('rsucces').value=infos[id]['succes'];
        document.getElementById('rphone').value=infos[id]['phone'];
        if(id==userid) {
            Swal.fire({
                title: 'Ma`lumotlar',
                html: '<div class="container" align="justify"><div class="mb-2">' +
                    '<div class="post-img mb-10" align="center"><img onclick="image()" id="img" style="width: 100%" src="{{asset('Images')}}/' + infos[id]['id'] + '/' + infos[id]['image'] + '" alt="" class="img-fluid"></div>' +

                    '<div class="mb-2"><div style="color: black"> Familiyasi, ismi va sharifi </div><div class="d-flex" style="color: #0020ff"><input id="fioedit" disabled style="border: none; background-color: unset; color: #0020ff; width: 90%" value="' + infos[id]['FIO'] + '"><button id="fiobut" onclick="FIOEdit()" type="button" style="border: none; background-color: unset" class="fas fa-edit"></button></div></div>' +
                    '<div class="mb-2"> <div style="color: black">Guruhi </div> <div class="d-flex" style="color: #0020ff"><input id="gredit" disabled style="border: none; background-color: unset; color: #0020ff; width: 90%" value="' + infos[id]['group'] + '"> <button id="grbut" onclick="GroupEdit()" type="button" style="border: none; background-color: unset" class="fas fa-edit"></button> </div> </div>' +
                    '<div class="mb-2"><div style="color: black">Passporti</div><div class="d-flex" style="color: #0020ff"><input id="pasedit" disabled style="border: none; background-color: unset; color: #0020ff; width: 90%" value="' + infos[id]['passport'] + '"><button id="pasbut" onclick="PassportEdit()" type="button" style="border: none; background-color: unset" class="fas fa-edit"></button></div></div>' +
                    '<div class="mb-2"><div style="color: black">JSHSHIR</div><div class="d-flex" style="color: #0020ff"><input id="jshshiredit" disabled style="border: none; background-color: unset; color: #0020ff; width: 90%" value="' + infos[id]['JSHSHIR'] + '"><button id="jshshirbut" onclick="JSHSHIREdit()" type="button" style="border: none; background-color: unset" class="fas fa-edit"></button></div></div>' +
                    '<div class="mb-2"><div style="color: black">Tug`ilgan sanasi</div><div class="d-flex" style="color: #0020ff"><input id="dbedit" type="date" disabled style="border: none; background-color: unset; color: #0020ff; width: 90%" value="' + infos[id]['date_birthday'] + '"><button id="dbbut" onclick="DateBirthdayEdit()" type="button" style="border: none; background-color: unset" class="fas fa-edit"></button></div></div>' +
                    '<div class="mb-2"><div style="color: black">Manzili</div><div class="d-flex" style="color: #0020ff"><input id="locedit" disabled style="border: none; background-color: unset; color: #0020ff; width: 90%" value="' + infos[id]['location'] + '"><button id="locbut" onclick="LocationEdit()" type="button" style="border: none; background-color: unset" class="fas fa-edit"></button></div></div>' +
                    '<div class="mb-2"><div style="color: black">Erishgan yutuqlari</div><div class="d-flex" style="color: #0020ff"><input id="eyedit" disabled style="border: none; background-color: unset; color: #0020ff; width: 90%" value="' + infos[id]['succes'] + '"><button id="eybut" onclick="EYEdit()" type="button" style="border: none; background-color: unset" class="fas fa-edit"></button></div></div>' +
                    '<div class="mb-2"><div style="color: black">Telefon raqami</div><div class="d-flex" style="color: #0020ff"><input id="phedit" disabled style="border: none; background-color: unset; color: #0020ff; width: 90%" value="' + infos[id]['phone'] + '"><button id="phbut" onclick="PhoneEdit()" type="button" style="border: none; background-color: unset" class="fas fa-edit"></button></div></div>' +
                    '<br><br><div class="mb-5 d-flex" style="color: green" align="end"><a href="/ReferenceDocument/' + infos[id]['id'] + '">Ma`lumotnoma</a></div>' +

                    '</div></div>',
                showCancelButton: true,
                confirmButtonText: 'Save',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    document.getElementById('submit').click();
                    Swal.fire('Saqlandi, iltimos qayta yuklash amalga oshguncha kuting!', '', 'success')
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
        }
        else {
            Swal.fire({
                title: 'Ma`lumotlar',
                html: '<div class="container" align="justify"><div class="mb-2">' +
                    '<div class="post-img mb-10" align="center"><img style="width: 100%" src="{{asset('Images')}}/' + infos[id]['id'] + '/' + infos[id]['image'] + '" alt="" class="img-fluid"></div>' +

                    '<div class="mb-2"><div style="color: black"> Familiyasi, ismi va sharifi </div><div class="d-flex" style="color: #0020ff"><input id="fioedit" disabled style="border: none; background-color: unset; color: #0020ff; width: 90%" value="' + infos[id]['FIO'] + '"></div></div>' +
                    '<div class="mb-2"> <div style="color: black">Guruhi </div> <div class="d-flex" style="color: #0020ff"><input id="gredit" disabled style="border: none; background-color: unset; color: #0020ff; width: 90%" value="' + infos[id]['group'] + '"></div> </div>' +
                    '<div class="mb-2"><div style="color: black">Passporti</div><div class="d-flex" style="color: #0020ff"><input id="pasedit" disabled style="border: none; background-color: unset; color: #0020ff; width: 90%" value="' + infos[id]['passport'] + '"></div></div>' +
                    '<div class="mb-2"><div style="color: black">JSHSHIR</div><div class="d-flex" style="color: #0020ff"><input id="jshshiredit" disabled style="border: none; background-color: unset; color: #0020ff; width: 90%" value="' + infos[id]['JSHSHIR'] + '"></div></div>' +
                    '<div class="mb-2"><div style="color: black">Tug`ilgan sanasi</div><div class="d-flex" style="color: #0020ff"><input id="dbedit" type="date" disabled style="border: none; background-color: unset; color: #0020ff; width: 90%" value="' + infos[id]['date_birthday'] + '"></div></div>' +
                    '<div class="mb-2"><div style="color: black">Manzili</div><div class="d-flex" style="color: #0020ff"><input id="locedit" disabled style="border: none; background-color: unset; color: #0020ff; width: 90%" value="' + infos[id]['location'] + '"></div></div>' +
                    '<div class="mb-2"><div style="color: black">Erishgan yutuqlari</div><div class="d-flex" style="color: #0020ff"><input id="eyedit" disabled style="border: none; background-color: unset; color: #0020ff; width: 90%" value="' + infos[id]['succes'] + '"></div></div>' +
                    '<div class="mb-2"><div style="color: black">Telefon raqami</div><div class="d-flex" style="color: #0020ff"><input id="phedit" disabled style="border: none; background-color: unset; color: #0020ff; width: 90%" value="' + infos[id]['phone'] + '"></div></div>' +
                    '<br><br><div class="mb-5 d-flex" style="color: green" align="end"><a href="/ReferenceDocument/' + infos[id]['id'] + '">Ma`lumotnoma</a></div>' +

                    '</div></div>',
                showCancelButton: true,
            })
        }
    }
    function fireSweetAlert(id) {
        Swal.fire({
            title: 'Haqiqatdan ham o`chirilsinmi?',
            text: "O`chirilganda so`ng qayta tiklab bo`lmaydi!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ha, o`chirilsin!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'O`chirildi!',
                    '',
                    'success'
                )
                var de='button'+id;
                document.getElementById(de).click();
            }
        })
    }


    function FIOEdit()
    {
        if(document.getElementById('fiobut').className=="fas fa-check")
        {
            document.getElementById('fioedit').disabled = true;
            document.getElementById('rFIO').value=document.getElementById('fioedit').value;
            document.getElementById('fiobut').className="fas fa-edit";
        }
        else
        {
            document.getElementById('fioedit').disabled = false;
            document.getElementById('fiobut').className="fas fa-check";
        }
    }
    function GroupEdit()
    {
        if(document.getElementById('grbut').className=="fas fa-check")
        {
            document.getElementById('gredit').disabled = true;
            document.getElementById('rgroup').value=document.getElementById('gredit').value;
            document.getElementById('grbut').className="fas fa-edit";
        }
        else
        {
            document.getElementById('gredit').disabled = false;
            document.getElementById('grbut').className="fas fa-check";
        }
    }
    function PassportEdit()
    {
        if(document.getElementById('pasbut').className=="fas fa-check")
        {
            document.getElementById('pasedit').disabled = true;
            document.getElementById('rpassport').value=document.getElementById('pasedit').value;
            document.getElementById('pasbut').className="fas fa-edit";
        }
        else
        {
            document.getElementById('pasedit').disabled = false;
            document.getElementById('pasbut').className="fas fa-check";
        }
    }
    function JSHSHIREdit()
    {
        if(document.getElementById('jshshirbut').className=="fas fa-check")
        {
            document.getElementById('jshshiredit').disabled = true;
            document.getElementById('rJSHSHIR').value=document.getElementById('jshshiredit').value;
            document.getElementById('jshshirbut').className="fas fa-edit";
        }
        else
        {
            document.getElementById('jshshiredit').disabled = false;
            document.getElementById('jshshirbut').className="fas fa-check";
        }
    }
    function DateBirthdayEdit()
    {
        if(document.getElementById('dbbut').className=="fas fa-check")
        {
            document.getElementById('dbedit').disabled = true;
            document.getElementById('rdate_birthday').value=document.getElementById('dbedit').value;
            document.getElementById('dbbut').className="fas fa-edit";
        }
        else
        {
            document.getElementById('dbedit').disabled = false;
            document.getElementById('dbbut').className="fas fa-check";
        }
    }
    function LocationEdit()
    {
        if(document.getElementById('locbut').className=="fas fa-check")
        {
            document.getElementById('locedit').disabled = true;
            document.getElementById('rlocation').value=document.getElementById('locedit').value;
            document.getElementById('locbut').className="fas fa-edit";
        }
        else
        {
            document.getElementById('locedit').disabled = false;
            document.getElementById('locbut').className="fas fa-check";
        }
    }
    function EYEdit()
    {
        if(document.getElementById('eybut').className=="fas fa-check")
        {
            document.getElementById('eyedit').disabled = true;
            document.getElementById('rsucces').value=document.getElementById('eyedit').value;
            document.getElementById('eybut').className="fas fa-edit";
        }
        else
        {
            document.getElementById('eyedit').disabled = false;
            document.getElementById('eybut').className="fas fa-check";
        }
    }
    function PhoneEdit()
    {
        if(document.getElementById('phbut').className=="fas fa-check")
        {
            document.getElementById('phedit').disabled = true;
            document.getElementById('rphone').value=document.getElementById('phedit').value;
            document.getElementById('phbut').className="fas fa-edit";
        }
        else
        {
            document.getElementById('phedit').disabled = false;
            document.getElementById('phbut').className="fas fa-check";
        }
    }

    function image()
    {
        document.getElementById('rimg').click();
    }

    function databtn()
    {
        document.getElementById('datain').click();
    }

    rimg.onchange = evt => {
        const [file] = rimg.files
        if (file) {
            let s=file.name;
            if(s.substring(s.length-4,s.length)=='.jpg')
            {
                img.src = URL.createObjectURL(file);
            }
        }
    }
</script>
@endsection