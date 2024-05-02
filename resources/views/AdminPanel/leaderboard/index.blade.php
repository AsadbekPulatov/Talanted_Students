@extends('AdminPanel.master')
@section('title', 'Tanlovlar')
@section('content')
<style>
    #filterForm {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
        padding: 20px   ;
    }

    #searchText {
        padding: 8px;
        margin-right: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    #filterType {
        padding: 8px;
        margin-right: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button[type="submit"] {
        padding: 8px 12px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>    
<script>
    let i=0;
</script>

    <div class="w-full px-6 py-6 mx-auto">
        <!-- table 1 -->

        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="dark:text-white text-justify">Leaderboard</h6>
                    </div>
                    <form id="filterForm" action="{{ route('leaderboard') }}" method="get">
                        @csrf
                        <input type="text" id="searchText" placeholder="Search..." name="search">
                        <select id="filterType" name="type">
                            <option value="student">Talaba</option>
                            <option value="choice">Tanlov</option>
                        </select>
                        <button type="submit" class="btn btn-success">Filter</button>
                    </form>

                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto mb-5">
                            @if($type==null)
                            <table class="items-center w-full mb-3 align-top border-collapse dark:border-white/40 text-slate-500">
                                <thead class="align-bottom">
                                <tr>
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Talaba</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanlovlar soni</th>
                                </tr>
                                </thead>
                                <tbody id="tablebody">

                                @foreach($data as $val)
                                    <tr>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                <div class="flex flex-col justify-center">
                                                    <h3 class="mb-0 text-sm leading-normal dark:text-white">{{$val['user']}}</h3>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40  shadow-transparent">
                                            <div class="flex flex-row -mx-3 p-4">
                                                <div class="flex-none max-w-full">
                                                    {{$val['count']}}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @endif

                            @if($type=='student')
                            <table class="items-center w-full mb-3 align-top border-collapse dark:border-white/40 text-slate-500">
                                <thead class="align-bottom">
                                <tr>
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Talaba</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanlov</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Fayl</th>
                                </tr>
                                </thead>
                                <tbody id="tablebody">

                                @foreach($data as $key => $val)
                                    @foreach($val->tasks as $key2 => $v)
                                    <tr>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                <div class="flex flex-col justify-center">
                                                    <h3 class="mb-0 text-sm leading-normal dark:text-white">{{$v['user']->last_name.' '.$v['user']->first_name}}</h3>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40  shadow-transparent">
                                            <div class="flex flex-row -mx-3 p-4">
                                                <div class="flex-none max-w-full">
                                                    {{$v['task']->name}}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40  shadow-transparent">
                                            <div class="flex flex-row -mx-3 p-4">
                                                <div class="flex-none max-w-full">
                                                    <a href="{{ route('download.choice_users', $v->id) }}">
                                                    <i class="bi bi-download"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                            @endif

                            @if($type=='choice')
                            <table class="items-center w-full mb-3 align-top border-collapse dark:border-white/40 text-slate-500">
                                <thead class="align-bottom">
                                <tr>
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanlov</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Talaba</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Fayl</th>
                                </tr>
                                </thead>
                                <tbody id="tablebody">

                                @foreach($data as $key => $val)
                                    @foreach($val->tasks as $key2 => $v)
                                    <tr>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                <div class="flex flex-col justify-center">
                                                    <h3 class="mb-0 text-sm leading-normal dark:text-white">{{$v['task']->name}}</h3>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40  shadow-transparent">
                                            <div class="flex flex-row -mx-3 p-4">
                                                <div class="flex-none max-w-full">
                                                    {{$v['user']->last_name.' '.$v['user']->first_name}}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40  shadow-transparent">
                                            <div class="flex flex-row -mx-3 p-4">
                                                <div class="flex-none max-w-full">
                                                    <a href="{{ route('download.choice_users', $v->id) }}">
                                                    <i class="bi bi-download"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                            @endif

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

@endsection
@section('script')
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