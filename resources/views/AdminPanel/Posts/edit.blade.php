@extends('AdminPanel.master')
@section('title', 'Postlar')
@section('content')
<style id="textwith">
    .textwidth{
        width: 650px;
    }
</style>
<style id="imgwith">
    .imgwith
    {
        width: 550px;
    }
</style>

    <div class="w-full px-6 py-6 mx-auto">


        <div class="flex flex-wrap -mx-3">
            <!-- card1 -->
            <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-2/4">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3 mb-4">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    @if($data->type=='jpg')
                                        <img id="postjpg" class="imgwith" src="{{asset("Posts/".$data->user_id."/".$data->location)}}" alt="your image" />
                                    @else
                                        <img id="postjpg" class="imgwith" style="display: none" src="" alt="your image" />
                                    @endif
                                    @if($data->type=='mp4')
                                        <video id="postvd" class="imgwith" controls>
                                            <source id="postmp4" class="imgwith" src="{{asset("Posts/".$data->user_id."/".$data->location)}}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @else
                                        <video id="postvd" style="display: none" class="imgwith" controls>
                                            <source id="postmp4" class="imgwith" src="" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row -mx-3 p-3" align="center">
                            <button onclick=" document.getElementById('imgInp').click(); " style="background: #0a58ca; color: white" class="flex-none w-full max-w-full px-3  break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border p-4">
                                Select Post
                            </button>
                        </div>

                    </div>
                </div>
            </div>

            <!-- card2 -->

            <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-2/4">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <form runat="server" action="{{ route('Post.update',$data->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="flex-auto p-4 w-full">
                        <div class="flex flex-row -mx-3 w-full p-3">
                            <input type="text" value="{{$data->title}}" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Post sarlavhasini kiriting..." required name="title">
                        </div>
                        </div>
                        <div class="flex-auto p-4 w-full">
                            <div class="flex flex-row -mx-3 w-full p-3">
                                <textarea type="text" style="height: 200px" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Post matnini kiriting..." required name="text">{{$data->text}}</textarea>
                            </div>
                        </div>
                        <div class="flex-auto p-4 w-full">
                            <div class="flex flex-row -mx-3 w-full p-3">
                                <input style="display: none" accept=".jpg,.mp4" type='file' id="imgInp" name="post">
                                <button type="submit" style="background: #0a58ca; color: white" class="flex-none w-full max-w-full px-3  break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border p-4">
                                Save Data
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>

@endsection
@section('script')
<script>
    if(window.innerWidth>575) {
        document.getElementById('imgwith').innerHTML = ".imgwith{width: " + parseInt(window.innerWidth / 2.7921) + "px;}";
    }
    else
    {
        document.getElementById('imgwith').innerHTML = ".imgwith{width: " + parseInt(window.innerWidth/1.25) + "px;}";
    }
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            let s=file.name;
            if(s.substring(s.length-4,s.length)=='.jpg')
            {
                document.getElementById('postvd').style="display: none";
                postjpg.src = URL.createObjectURL(file);
                document.getElementById('postjpg').style="display: block";
            }
            if(s.substring(s.length-4,s.length)=='.mp4')
            {
                document.getElementById('postjpg').style="display: none";
                postmp4.src = URL.createObjectURL(file);
                document.getElementById('postvd').style="display: block";
            }
        }
    }
</script>
@endsection
