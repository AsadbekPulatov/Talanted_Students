@extends('AdminPanel.master')
@section('title', 'Tanlovlar')
@section('content')

<script>
    let i=0;
</script>

    <div class="w-full px-6 py-6 mx-auto">
        <!-- table 1 -->

        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="dark:text-white text-justify">Tanlovlar</h6>
                    </div>
                    @if($user->position=="Creator")
                    <div class="p-6" align="end">
                        <a onclick="sw2newsadd()" class="w-100" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                        </a>
                    </div>
                    @endif
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto mb-5">
                            <table class="items-center w-full mb-3 align-top border-collapse dark:border-white/40 text-slate-500">
                                <thead class="align-bottom">
                                <tr>
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Title</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Text</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Location</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Start Date</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">End Date</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Deadline</th>
                                    <th class="px-6 py-3 capitalize align-middle bg-transparent border-b border-collapse border-solid shadow-none dark:border-white/40 dark:text-white tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
                                </tr>
                                </thead>
                                <tbody id="tablebody">

                                @foreach($data as $val)
                                    <tr>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                <div class="flex flex-col justify-center">
                                                    <h3 class="mb-0 text-sm leading-normal dark:text-white">{{$val->name}}</h3>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40  shadow-transparent">
                                            <div class="flex flex-row -mx-3 p-4">
                                                <div class="flex-none max-w-full">
                                                    {{$val->text}}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40  shadow-transparent">
                                            <div class="flex flex-row -mx-3 p-4">
                                                <div class="flex-none max-w-full">
                                                    {{$val->location}}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{$val->start_date}}</span>
                                        </td>

                                        <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{$val->end_date}}</span>
                                        </td>


                                        <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{$val->deadline}}</span>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            @if($user->position=="Creator")
                                            <form action="{{route('Choices.destroy',$val->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <button onclick="sw2choicesedit({{$val->id}})" type="button" class="btn btn-warning" style="color: #ffc400">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-pen" viewBox="0 0 20 20">
                                                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
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
                        @if(count($data)>=10)
                        <div class="p-3 align-items-xl-center" align="center">
                            <h3 id="morebtn" style="color: blue"><button onclick="More(10)">More...</button></h3>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

<div fixed-plugin>
    @if($user->position=="Creator")
    <form style="display: none" action="{{ route('Choices.update',1)}}" method="POST">
        @csrf
        @method('PUT')
        <input id="cid" required name="id">
        <input id="cname" required name="name">
        <input id="ctext" required name="text">
        <input id="clocation" required name="location">
        <input id="c_start_date" type="date" required name="start_date">
        <input id="c_end_date" type="date" required name="end_date">
        <textarea id="c_files_list" required name="files_list"></textarea>
        <input id="c_deadline" type="date" required name="deadline">
        <button id="choiceseditsubmit" type="submit"></button>
    </form>

    <form style="display: none" action="{{ route('Choices.store')}}" method="POST">
        @csrf
        <input id="naddname" required name="name">
        <textarea id="naddtext" required name="text"></textarea>
        <input id="naddlocation" required name="location">
        <input id="nadd_start_date" type="date" required name="start_date">
        <input id="nadd_end_date" type="date" required name="end_date">
        <textarea id="nadd_files_list" required name="files_list"></textarea>
        <input id="nadd_deadline" type="date" required name="deadline">
        <button id="newsaddsubmit" type="submit">Save</button>
    </form>
    @endif
    <form style="display: none" method="POST" action="{{ url('/morestatutes') }}" enctype="multipart/form-data" onsubmit="return onsubmitForm(this);">
        @csrf
        <input id="morenum" required name="offset">

        <input id="moresubmit" type="submit">
    </form>
</div>

@endsection
@section('script')

<script>
    @if($user->position=="Creator")
    let choices = @json($choices);
    function sw2choicesedit(id)
    {
        console.log(choices);
        document.getElementById('cid').value=choices[id]['id'];
        document.getElementById('cname').value=choices[id]['name'];
        document.getElementById('ctext').value=choices[id]['text'];
        document.getElementById('clocation').value=choices[id]['location'];
        document.getElementById('c_start_date').value=choices[id]['start_date'];
        document.getElementById('c_end_date').value=choices[id]['end_date'];
        document.getElementById('c_files_list').value=choices[id]['files_list'];
        document.getElementById('c_deadline').value=choices[id]['deadline'];
        Swal.fire({
            title: 'Tanlovni tahrirlash',
            html: '<div class="container" align="justify"><div class="mb-2">'+
                '<div class="flex-auto w-full mb-2"><div class="flex flex-row -mx-3 w-full"> <input id="swedname" type="text" value="'+choices[id]['name']+'" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Tanlov nomi..." required name="title"> </div></div>'+
                '<div class="flex-auto w-full mb-2"><div class="flex flex-row -mx-3 w-full"><textarea id="swedtext" type="text" style="height: 200px" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Tanlov haqida ma`lumot..." required name="text">'+choices[id]['text']+'</textarea></div></div>'+
                '<div class="flex-auto w-full mb-2"><div class="flex flex-row -mx-3 w-full"> <input id="swedlocation" type="text" value="'+choices[id]['location']+'" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Joylashuv..." required name="title"> </div></div>'+
                '<div class="flex-auto w-full mb-2"><div class="flex flex-row -mx-3 w-full"> <input id="swed_start_date" type="date" value="'+choices[id]['start_date']+'" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="" required name="start_date"> </div></div>'+
                '<div class="flex-auto w-full mb-2"><div class="flex flex-row -mx-3 w-full"> <input id="swed_end_date" type="date" value="'+choices[id]['end_date']+'" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="" required name="end_date"> </div></div>'+
                '<div class="flex-auto w-full mb-2"><div class="flex flex-row -mx-3 w-full"><textarea id="swed_files_list" type="text" style="height: 100px;" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Tanlov uchun kerakli fayllar" required name="files_list">'+choices[id]['files_list']+'</textarea></div></div>'+
                '<div class="flex-auto w-full mb-2"><div class="flex flex-row -mx-3 w-full"> <input id="swed_deadline" type="date" value="'+choices[id]['deadline']+'" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="" required name="deadline"> </div></div>'+
                '</div></div>',
            showCancelButton: true,
            confirmButtonText: 'Save',
        }).then((result) => {

            let re1=document.getElementById('swedname').value;
            let re2=document.getElementById('swedtext').value;
            let re3=document.getElementById('swedlocation').value;
            let re4=document.getElementById('swed_start_date').value;
            let re5=document.getElementById('swed_end_date').value;
            let re6=document.getElementById('swed_files_list').value;
            let re7=document.getElementById('swed_deadline').value;
            if (result.isConfirmed && re1!='' && re2!='') {
                document.getElementById('cname').value=re1;
                document.getElementById('ctext').value=re2;
                document.getElementById('clocation').value=re3;
                document.getElementById('c_start_date').value=re4;
                document.getElementById('c_end_date').value=re5;
                document.getElementById('c_files_list').value=re6;
                document.getElementById('c_deadline').value=re7;
                document.getElementById('choiceseditsubmit').click();
                Swal.fire('Saved!', '', 'success')
            } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info')
            }
            else
            {
                Swal.fire('Ma`lumot to`liq kiritilmagan', '', 'info')
            }
        })

    }
    function sw2newsadd()
    {
        Swal.fire({
            title: 'Tanlov qo`shish',
            html: '<div class="container" align="justify"><div class="mb-2">'+
                '<div class="flex-auto w-full mb-2"><div class="flex flex-row -mx-3 w-full"> <input id="swname" type="text" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Tanlov nomi..." required name="name"> </div></div>'+
                '<div class="flex-auto w-full mb-2"><div class="flex flex-row -mx-3 w-full"><textarea id="swtext" type="text" style="height: 200px" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Tanlov haqida ma`lumot..." required name="text"></textarea></div></div>'+
                '<div class="flex-auto w-full mb-2"><div class="flex flex-row -mx-3 w-full"> <input id="swlocation" type="text" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Joylashuv..." required name="location"> </div></div>'+
                '<div class="flex-auto w-full mb-2"><div class="flex flex-row -mx-3 w-full"> <input id="sw_start_date" type="date" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="" required name="start_date"> </div></div>'+
                '<div class="flex-auto w-full mb-2"><div class="flex flex-row -mx-3 w-full"> <input id="sw_end_date" type="date" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="" required name="end_date"> </div></div>'+
                '<div class="flex-auto w-full mb-2"><div class="flex flex-row -mx-3 w-full"><textarea id="sw_files_list" type="text" style="height: 100px;" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Tanlov uchun kerakli fayllar" required name="files_list"></textarea></div></div>'+
                '<div class="flex-auto w-full mb-2"><div class="flex flex-row -mx-3 w-full"> <input id="sw_deadline" type="date" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="" required name="deadline"> </div></div>'+
                '</div></div>',
            showCancelButton: true,
            confirmButtonText: 'Save',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            let re1=document.getElementById('swname').value;
            let re2=document.getElementById('swtext').value;
            let re3=document.getElementById('swlocation').value;
            let re4=document.getElementById('sw_start_date').value;
            let re5=document.getElementById('sw_end_date').value;
            let re6=document.getElementById('sw_files_list').value;
            let re7=document.getElementById('sw_deadline').value;
            if (result.isConfirmed && re1!='' && re2!='') {
                document.getElementById('naddname').value=re1;
                document.getElementById('naddtext').value=re2;
                document.getElementById('naddlocation').value=re3;
                document.getElementById('nadd_start_date').value=re4;
                document.getElementById('nadd_end_date').value=re5;
                document.getElementById('nadd_files_list').value=re6;
                document.getElementById('nadd_deadline').value=re7;
                document.getElementById('newsaddsubmit').click();
                Swal.fire('Saved!', '', 'success')
            } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'news');
            }
            else
            {
                Swal.fire('Ma`lumot to`liq kiritilmagan', '', 'info')
            }
        })
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
    @endif

</script>
<script>
    function onsubmitForm(form) {
        // create AJAX instance
        var ajax = new XMLHttpRequest();

        // open the request
        ajax.open("POST", form.getAttribute("action"), true);

        ajax.onreadystatechange = function () {
            // when the request is successfull
            if (this.readyState == 4 && this.status == 200) {
                // convert the JSON response into Javascript object
                var data = JSON.parse(this.responseText)['data'];
                if (data.length > 0) {
                    let table = '';
                    for(let i=0;i<data.length;i++) {
                        let title=data[i]['name'];
                        let text=data[i]['text'];
                        let location=data[i]['location'];
                        let time=data[i]['date'];
                        let choiceid=data[i]['id'];
                        table += '<tr><td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent"><div class="flex px-2 py-1"><div class="flex flex-col justify-center"><h3 class="mb-0 text-sm leading-normal dark:text-white">' +
                            title +
                            '</h3></div></div></td><td class="p-2 align-middle bg-transparent border-b dark:border-white/40  shadow-transparent"><div class="flex flex-row -mx-3 p-4"><div class="flex-none max-w-full">' +
                            text +
                            '</h3></div></div></td><td class="p-2 align-middle bg-transparent border-b dark:border-white/40  shadow-transparent"><div class="flex flex-row -mx-3 p-4"><div class="flex-none max-w-full">' +
                            location +
                            '</div></div></td><td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent"><span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">' +
                            time +
                            '</span></td><td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">' +
                            '<form action="{{url('/Choices')}}/' +
                            choiceid +
                            '" method="post">' +
                            '@csrf' +
                            '<input type="hidden" name="_method" value="DELETE">' +
                            '<button onclick="fireSweetAlert(' +
                            choiceid +
                            ')" type="button" class="btn btn-danger m-6" style="color: red"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash" viewBox="0 0 20 20"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path></svg></button>' +
                            '<button id="button' +
                            choiceid +
                            '" type="submit" style="display: none" class="btn btn-danger m-6"></button></form></td></tr>';
                    }
                    document.getElementById('tablebody').innerHTML += table;
                }
            }

            // if the request fails
            if (this.status == 500) {
                alert(this.responseText);
            }
        };
        var formData = new FormData(form);
        ajax.send(formData);
        return false;
    }
    </script>
<script>
function More(i)
{
    document.getElementById('morenum').value=i;
    document.getElementById('moresubmit').click();
    document.getElementById('morebtn').innerHTML = '<button onclick="More(' + (i + 10) + ')">More...</button>';
}
</script>
@endsection
