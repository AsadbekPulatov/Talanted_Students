@extends('AdminPanel.master')
@section('title', 'Fayllar')
@section('content')
    <style>
        #filterForm {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding: 20px;
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
        let i = 0;
    </script>


    <div class="w-full px-6 py-6 mx-auto">
        <!-- table 1 -->

        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="dark:text-white text-justify">Fayllar</h6>
                    </div>
                    <form id="filterForm" action="{{ route('AdminStatutes') }}" method="get">
                        @csrf
                        <input type="text" id="searchText" placeholder="Search..." name="search">
                        <input type="date" id="searchText" placeholder="Search..." name="date">
                        <button type="submit" class="btn btn-success">Filter</button>
                    </form>
                    @if($user->position=="Creator")
                        <div class="p-6" align="end">
                            <a onclick="sw2newsadd()" class="w-100" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                                     class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                            </a>
                        </div>
                    @endif
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto mb-5">
                            <table
                                class="items-center w-full mb-3 align-top border-collapse dark:border-white/40 text-slate-500">
                                <thead class="align-bottom">
                                <tr>
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
                                </tr>
                                </thead>
                                <tbody id="tablebody">

                                @foreach($data as $val)
                                    <tr>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                <div class="flex flex-col justify-center">
                                                    <h3 class="mb-0 text-sm leading-normal dark:text-white">
                                                        <a href="{{asset("StatutesFile/".$val->location)}}"
                                                           target="_blank">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="30"
                                                                 height="30" fill="currentColor"
                                                                 class="bi bi-file-earmark-pdf m-4" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                                                                <path
                                                                    d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"/>
                                                            </svg>
                                                            {{$val->name}}
                                                        </a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $val->date }}</td>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            @if($user->position=="Creator")
                                                <form action="{{route('Statutes.destroy',$val->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="sw2newsedit({{$val->id}})" type="button"
                                                            class="btn btn-warning" style="color: #ffc400">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                             fill="currentColor" class="bi bi-pen" viewBox="0 0 20 20">
                                                            <path
                                                                d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                                        </svg>
                                                    </button>
                                                    <button onclick="fireSweetAlert({{$val->id}})" type="button"
                                                            class="btn btn-danger m-6" style="color: red">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                             fill="currentColor" class="bi bi-trash"
                                                             viewBox="0 0 20 20">
                                                            <path
                                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                            <path fill-rule="evenodd"
                                                                  d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                        </svg>
                                                    </button>
                                                    <button id="button{{$val->id}}" type="submit" style="display: none"
                                                            class="btn btn-danger m-6">
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
                                <h3 id="morebtn" style="color: blue">
                                    <button onclick="More(10)">More...</button>
                                </h3>
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
                            <a href="https://t.me/sfarruhbek_7" class="font-semibold dark:text-white text-slate-700"
                               target="_blank">S.Farruhbek</a>.
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 mt-0 shrink-0 lg:w-1/2 lg:flex-none">
                        <ul class="flex flex-wrap justify-center pl-0 mb-0 list-none lg:justify-end">
                            <li class="nav-item">
                                <a href="https://instagram.com/unusual_team_official"
                                   class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-slate-500"
                                   target="_blank">Unusual Team</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://t.me/unusual_team_official"
                                   class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-slate-500"
                                   target="_blank">About Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <div fixed-plugin>

        @if($user->position=="Creator")
            <form style="display: none" action="{{ route('Statutes.update',1)}}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input id="nid" required name="id">
                <input id="nname" required name="name">
                <input type="date" id="ndate" required name="date">
                <input id="nfile" type="file" accept="application/pdf" name="statute">
                <button id="submitedit" type="submit"></button>
            </form>
            <form style="display: none" action="{{ route('Statutes.store')}}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                <input id="naddname" required name="name">
                <input type="date" id="nadddate" required name="date">
                <input id="naddfile" type="file" accept="application/pdf" required name="statute">
                <button id="newsaddsubmit" type="submit">Save</button>
            </form>
            <form style="display: none" method="POST" action="{{ url('/morestatutes') }}" enctype="multipart/form-data"
                  onsubmit="return onsubmitForm(this);">
                @csrf
                <input id="morenum" required name="offset">

                <input id="moresubmit" type="submit">
            </form>
        @endif
    </div>
@endsection
@section('script')
    <script>
        @if($user->position=="Creator")
        let data = @json($data);

        function sw2newsedit(id) {
            document.getElementById('nid').value = data[id]['id'];
            document.getElementById('nname').value = data[id]['name'];
            Swal.fire({
                title: 'Faylni tahrirlash',
                html: '<div class="container" align="justify"><div class="mb-2">' +
                    '<div class="flex-auto w-full mb-2"><div class="flex flex-row -mx-3 w-full"> <input id="swedname" value="' + data[id]['name'] + '" type="text" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Nizom nomini kiriting..."> </div></div>' +
                    '<div class="flex-auto w-full mb-2"><div class="flex flex-row -mx-3 w-full"> <input id="sweddate" value="' + data[id]['date'] + '" type="date" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Nizom nomini kiriting..."> </div></div>' +
                    '<div class="flex-auto w-full mb-2"><div class="flex flex-row -mx-3 w-full"><input value="Faylni tanlang(pdf)" onclick="document.getElementById(' + "'nfile'" + ').click()" type="button" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow"></div></div>' +
                    '</div></div>',
                showCancelButton: true,
                confirmButtonText: 'Save',
            }).then((result) => {
                let re1 = document.getElementById('swedname').value;
                let re2 = document.getElementById('sweddate').value;
                if (result.isConfirmed && re1 != '') {
                    document.getElementById('nname').value = re1;
                    document.getElementById('ndate').value = re2;
                    document.getElementById('submitedit').click();
                    Swal.fire('Saved!', '', 'success')
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                } else {
                    Swal.fire('Ma`lumot to`liq kiritilmagan', '', 'info')
                }
            })

        }

        function sw2newsadd() {
            Swal.fire({
                title: 'Yangi fayl qo`shish',
                html: '<div class="container" align="justify"><div class="mb-2">' +
                    '<div class="flex-auto w-full mb-2"><div class="flex flex-row -mx-3 w-full"> <input id="swname" type="text" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Fayl nomini kiriting..."> </div></div>' +
                    '<div class="flex-auto w-full mb-2"><div class="flex flex-row -mx-3 w-full"> <input id="swdate" type="date" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Fayl nomini kiriting..."> </div></div>' +
                    '<div class="flex-auto w-full mb-2"><div class="flex flex-row -mx-3 w-full"><input value="Faylni tanlang" onclick="document.getElementById(' + "'naddfile'" + ').click()" type="button" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow"></div></div>' +
                    '</div></div>',
                showCancelButton: true,
                confirmButtonText: 'Save',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                let re1 = document.getElementById('swname').value;
                let re2 = document.getElementById('swdate').value;
                if (result.isConfirmed && re1 != '') {
                    document.getElementById('naddname').value = re1;
                    document.getElementById('nadddate').value = re2;
                    document.getElementById('newsaddsubmit').click();
                    Swal.fire('Saved!', '', 'success')
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'news');
                } else {
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
                    var de = 'button' + id;
                    document.getElementById(de).click();
                }
            })
        }
        @endif
    </script>
    <script>
        function More(i) {
            document.getElementById('morenum').value = i;
            document.getElementById('moresubmit').click();
            document.getElementById('morebtn').innerHTML = '<button onclick="More(' + (i + 10) + ')">More...</button>';
        }
    </script>
@endsection
