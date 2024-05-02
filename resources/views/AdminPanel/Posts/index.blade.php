@extends('AdminPanel.master')
@section('title', 'Postlar')
@section('content')
<style id="imgwidth">
    .imgwidth
    {
        width: 550px;
    }
</style>
   
    <div class="w-full px-6 py-6 mx-auto">
        <!-- table 1 -->

        <div align="end" class="mb-4 p-6">
            <a href="{{route('Post.create')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
            </a>
        </div>
        <div id="tablebody">
        @foreach($data as $val)
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border mb-8">
            <div class="flex flex-wrap -mx-3">
                <!-- card1 -->


                <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/2">
                    <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3 mb-4">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        @if($val->type=='jpg')
                                        <img id="blah" class="imgwidth" src="{{asset('Posts/'.$val->user_id."/".$val->location)}}" alt="your image" />
                                        @elseif($val->type=='mp4')
                                            <video class="imgwidth" controls>
                                                <source src="{{asset('Posts/'.$val->user_id."/".$val->location)}}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-row">
                                <div class="p-3" align="justify">
                                    <i class="fas fa-clock"></i>
                                    {{$val->created_at}}
                                </div>
                                <div class="p-3" align="end">
                                    <i class="fas fa-eye"></i> {{$val->view}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/2">
                    <div class="w-70 flex-auto p-4">
                            <div align="end">
                                <div class="dropdown">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                        </svg>
                                    </span>
                                    <div class="dropdown-content dark:bg-slate-850 bg-white">
                                        <a href="{{route('Post.edit',$val->id)}}" style="color: #1aff00" class="dropdown-item">
                                            <i class="fas fa-edit fa-sm fa-fw me-2 text-gray-400"></i>&nbsp
                                            Tahrirlash!
                                        </a>
                                        <hr class="h-px mx-0 my-1 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
                                        <form method="POST" action="{{route('Post.destroy',$val->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="fireSweetAlert({{$val->id}})" style="color: red" type="button" class="dropdown-item" href="">
                                                <i class="fas fa-trash fa-sm fa-fw me-2 text-gray-400"></i>&nbsp
                                                Deleted!
                                            </button>
                                            <button id="button{{$val->id}}" type="submit" style="display: none" class="btn btn-danger m-6">
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-row -mx-3 p-4">
                                <h3 style="width: 650px" class="mt-4 dark:text-white">{{$val->title}}</h3>
                            </div>
                            <div class="flex flex-row -mx-3 p-4">
                                <div class="flex-none max-w-full">
                                {{$val->text}}
                                </div>
                            </div>
                    </div>
                </div>

            </div>
        </div>
        @endforeach
        </div>
        @if(count($data)>=5)
        <div class="p-3 align-items-xl-center" align="center">
            <h3 id="morebtn" style="color: blue"><button onclick="More(5)">More...</button></h3>
        </div>
        @endif
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

<form style="display: none" method="POST" action="{{ url('/moreposts') }}" enctype="multipart/form-data" onsubmit="return onsubmitFormPosts(this);">
    @csrf
    <input id="morenum" required name="offset">

    <input id="moresubmit" type="submit">
</form>
@endsection
@section('script')
<script>

    if(window.innerWidth>575) {
        document.getElementById('imgwidth').innerHTML = ".imgwidth{width: " + parseInt(window.innerWidth / 2.7921) + "px;}";
    }
    else
    {
        document.getElementById('imgwidth').innerHTML = ".imgwidth{width: " + parseInt(window.innerWidth/1.25) + "px;}";
    }
</script>
<script>

    function onsubmitFormPosts(form) {
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
                    let post_id;
                    let p_user_id;
                    let type;
                    let title;
                    let text;
                    let location;
                    let date;
                    let view;

                    for(let i=0;i<data.length;i++) {

                        post_id=data[i]['id'];
                        p_user_id=data[i]['user_id'];
                        type=data[i]['type'];
                        title=data[i]['title'];
                        text=data[i]['text'];
                        location=data[i]['location'];
                        date=data[i]['created_at'];
                        view=data[i]['view'];

                        table += ''+
                        '<div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border mb-8"><div class="flex flex-wrap -mx-3"><div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/2"><div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border"><div class="flex-auto p-4"><div class="flex flex-row -mx-3 mb-4"><div class="flex-none w-2/3 max-w-full px-3"><div>';
                        if(type=='jpg') {
                            table += '<img id="blah" class="imgwidth" src="'+
                                '{{url('/Posts')}}/'+
                                p_user_id+'/'+
                                location+
                            '" alt="your image" />';
                        }else
                        if(type == 'mp4'){
                            table += '<video class="imgwidth" controls><source src="'+
                                '{{url('/Posts')}}/'+
                                p_user_id+'/'+
                                location+
                                '" type="video/mp4">Your browser does not support the video tag.</video>';
                        }
                        table+='</div></div></div><div class="flex flex-row"><div class="p-3" align="justify"><i class="fas fa-clock"></i> '+
                            date+
                            '</div><div class="p-3" align="end"><i class="fas fa-eye"></i> '+
                            view+
                            '</div></div>'+
                            '</div></div></div><div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/2"><div class="w-70 flex-auto p-4"><div align="end"><div class="dropdown"><span><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16"><path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/></svg></span><div class="dropdown-content dark:bg-slate-850 bg-white"><a href="'+
                            '{{url('/Post')}}/'+
                            post_id+
                            '/edit'+
                            '" style="color: #1aff00" class="dropdown-item"><i class="fas fa-edit fa-sm fa-fw me-2 text-gray-400"></i>&nbsp Tahrirlash!</a><hr class="h-px mx-0 my-1 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />'+
                            '<form method="POST" action="'+
                            '{{url('/Post')}}/'+
                            post_id+
                            '">'+
                                '@csrf'+
                                '<input type="hidden" name="_method" value="DELETE"><button style="color: red" class="dropdown-item" href="">'+
                            '<button onclick="fireSweetAlert('+
                            post_id+
                            ')" style="color: red" type="button" class="dropdown-item" href=""> <i class="fas fa-trash fa-sm fa-fw me-2 text-gray-400"></i>&nbsp Deleted! </button><button id="button'+
                            post_id+
                            '" type="submit" style="display: none" class="btn btn-danger m-6"></button></form>'+'</div></div></div><div class="flex flex-row -mx-3 p-4"><h3 style="width: 650px" class="mt-4 dark:text-white">'+
                            title+
                            '</h3></div><div class="flex flex-row -mx-3 p-4"><div class="flex-none max-w-full">'+
                            text+
                            '</div></div></div></div></div></div>'
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
    function More(i)
    {
        document.getElementById('morenum').value=i;
        document.getElementById('moresubmit').click();
        document.getElementById('morebtn').innerHTML = '<button onclick="More(' + (i + 5) + ')">More...</button>';
    }
</script>
<script>
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
@endsection