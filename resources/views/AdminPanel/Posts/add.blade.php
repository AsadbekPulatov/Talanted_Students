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
                                    <img id="postjpg" class="imgwith" style="display: none" src="" alt="your image" />
                                    <video id="postvd" style="display: none" class="imgwith" controls>
                                        <source id="postmp4" class="imgwith" src="" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
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
                    <form runat="server" action="{{ route('Post.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="flex-auto p-4 w-full">
                        <div class="flex flex-row -mx-3 w-full p-3">
                            <input type="text" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Post sarlavhasini kiriting..." required name="title">
                        </div>
                        </div>
                        <div class="flex-auto p-4 w-full">
                            <div class="flex flex-row -mx-3 w-full p-3">
                                <textarea type="text" style="height: 200px" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Post matnini kiriting..." required name="text"></textarea>
                            </div>
                        </div>
                        <div class="flex-auto p-4 w-full">
                            <div class="flex flex-row -mx-3 w-full p-3">
                                <input style="display: none" accept=".jpg,.mp4" type='file' id="imgInp" required name="post">
                                <button type="submit" style="background: #0a58ca; color: white" class="flex-none w-full max-w-full px-3  break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border p-4">
                                Save Data
                                </button>
                            </div>
                        </div>
                    </form>
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