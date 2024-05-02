@extends('AdminPanel.master')
@section('title', 'Yangiliklar')
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
                        <h6 class="dark:text-white text-justify">Yangiliklar</h6>
                    </div>
                    <div class="p-6" align="end">
                        <a onclick="sw2newsadd()" class="w-100" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                        </a>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto mb-5">
                            <table class="items-center w-full mb-3 align-top border-collapse dark:border-white/40 text-slate-500">
                                <thead class="align-bottom">
                                <tr>
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Title</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Text</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Data</th>
                                    <th class="px-6 py-3 capitalize align-middle bg-transparent border-b border-collapse border-solid shadow-none dark:border-white/40 dark:text-white tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
                                </tr>
                                </thead>
                                <tbody id="tablebody">

                                @foreach($data as $val)
                                    <tr>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                <div class="flex flex-col justify-center">
                                                    <h3 class="mb-0 text-sm leading-normal dark:text-white">{{$val->title}}</h3>
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
                                        <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{$val->created_at}}</span>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">

                                            <form action="{{route('News.destroy',$val->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="sw2newsedit({{$val->id}})" type="button" class="btn btn-warning" style="color: #ffc400">
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
    <form style="display: none" action="{{ route('News.update',1)}}" method="POST">
        @csrf
        @method('PUT')
        <input id="nid" required name="id">
        <input id="ntitle" required name="title">
        <input id="ntext" required name="text">
        <button id="newseditsubmit" type="submit"></button>
    </form>
    <form style="display: none" action="{{ route('News.store')}}" method="POST">
        @csrf
        <input id="naddtitle" required name="title">
        <input id="naddtext" required name="text">
        <button id="newsaddsubmit" type="submit">Save</button>
    </form>
    <form style="display: none" method="POST" action="{{ url('/morenews') }}" enctype="multipart/form-data" onsubmit="return onsubmitForm(this);">
        @csrf
        <input id="morenum" required name="offset">

        <input id="moresubmit" type="submit">
    </form>
</div>

@endsection
@section('script')
<script>
    let news = @json($news);
    function sw2newsedit(id)
    {
        document.getElementById('nid').value=news[id]['id'];
        document.getElementById('ntitle').value=news[id]['title'];
        document.getElementById('ntext').value=news[id]['text'];
        Swal.fire({
            title: 'Yangilikni tahrirlash',
            html: '<div class="container" align="justify"><div class="mb-2">'+
                '<div class="flex-auto w-full mb-2"><div class="flex flex-row -mx-3 w-full"> <input id="swedtitle" type="text" value="'+news[id]['title']+'" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Post sarlavhasini kiriting..." required name="title"> </div></div>'+
                '<div class="flex-auto w-full mb-2"><div class="flex flex-row -mx-3 w-full"><textarea id="swedtext" type="text" style="height: 200px" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Post matnini kiriting..." required name="text">'+news[id]['text']+'</textarea></div></div>'+
                '</div></div>',
            showCancelButton: true,
            confirmButtonText: 'Save',
        }).then((result) => {

            let re1=document.getElementById('swedtitle').value;
            let re2=document.getElementById('swedtext').value;
            console.log(re1+" "+re2);
            if (result.isConfirmed && re1!='' && re2!='') {
                document.getElementById('ntitle').value=re1;
                document.getElementById('ntext').value=re2;
                document.getElementById('newseditsubmit').click();
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
            title: 'Yangilik qo`shish',
            html: '<div class="container" align="justify"><div class="mb-2">'+
                '<div class="flex-auto w-full mb-2"><div class="flex flex-row -mx-3 w-full"> <input id="swtitle" type="text" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Post sarlavhasini kiriting..." required name="title"> </div></div>'+
                '<div class="flex-auto w-full mb-2"><div class="flex flex-row -mx-3 w-full"><textarea id="swtext" type="text" style="height: 200px" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Post matnini kiriting..." required name="text"></textarea></div></div>'+
                '</div></div>',
            showCancelButton: true,
            confirmButtonText: 'Save',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            let re1=document.getElementById('swtitle').value;
            let re2=document.getElementById('swtext').value;
            if (result.isConfirmed && re1!='' && re2!='') {
                document.getElementById('naddtitle').value=re1;
                document.getElementById('naddtext').value=re2;
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
                        let title=data[i]['title'];
                        let text=data[i]['text'];
                        let time=data[i]['created_at'];
                        let newsid=data[i]['id'];
                        table += '<tr><td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent"><div class="flex px-2 py-1"><div class="flex flex-col justify-center"><h3 class="mb-0 text-sm leading-normal dark:text-white">' +
                            title +
                            '</h3></div></div></td><td class="p-2 align-middle bg-transparent border-b dark:border-white/40  shadow-transparent"><div class="flex flex-row -mx-3 p-4"><div class="flex-none max-w-full">' +
                            text +
                            '</div></div></td><td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent"><span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">' +
                            time +
                            '</span></td><td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">' +
                            '<form action="{{url('/News')}}/' +
                            newsid +
                            '" method="post">' +
                            '@csrf' +
                            '<input type="hidden" name="_method" value="DELETE">' +
                            '<button onclick="fireSweetAlert(' +
                            newsid +
                            ')" type="button" class="btn btn-danger m-6" style="color: red"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash" viewBox="0 0 20 20"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path></svg></button>' +
                            '<button id="button' +
                            newsid +
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
