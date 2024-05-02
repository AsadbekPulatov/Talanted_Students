<?php $a=false; if (isset($reference)) $a=true; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('AdminPanel/assets/assets/img/apple-icon.png')}}" />
    <link rel="icon" type="image/png" href="{{asset('AdminPanel/assets/img/favicon.png')}}" />
    <title>AvtoReference</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="{{asset('AdminPanel/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('AdminPanel/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <link href="{{asset('AdminPanel/assets/css/argon-dashboard-tailwind.css?v=1.0.1')}}" rel="stylesheet" />
    <script src="{{asset('sweetalert.js')}}"></script>
</head>
<style>

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        padding: 12px 16px;
        z-index: 1;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }
</style>
<style id="imgwith">
    .imgwith
    {
        width: 150px;
    }
</style>
<body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
<div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
<!-- sidenav  -->

<aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 xl:ml-6 max-w-64 ease-nav-brand z-990 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false">
    <div class="h-19">
        <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden" sidenav-close></i>
        <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700" href="{{route('home')}}" target="_blank">
            <img src="{{asset('AdminPanel/assets/img/logo-ct-dark.png')}}" class="inline h-full max-w-full transition-all duration-200 dark:hidden ease-nav-brand max-h-8" alt="main_logo" />
            <img src="{{asset('AdminPanel/assets/img/logo-ct.png')}}" class="hidden h-full max-w-full transition-all duration-200 dark:inline ease-nav-brand max-h-8" alt="main_logo" />
            <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Iqtidorli talabalar</span>
        </a>
    </div>

    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

    <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
        <ul class="flex flex-col pl-0 mb-0">
            <li class="mt-0.5 w-full">
                <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{route('AdminDashboard')}}">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-black ni ni-tv-2"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{route('AdminUsers')}}">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-blue-500 fas fa-users"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Yordamchilar</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{route('AdminPosts')}}">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-orange-500 fas fa-images"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Postlar</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{route('AdminNews')}}">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-green-800 fas fa-newspaper"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Yangiliklar</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{route('AdminChoices')}}">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-yellow-800 ni ni-trophy"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Tanlovlar</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{route('AdminStatutes')}}">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-red-500 ni ni-book-bookmark"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Nizomlar</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{route('AdminPrivileges')}}">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-cyan-500 fas fa-award"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Imtiyozlar</span>
                </a>
            </li>
        </ul>
    </div>

    {{--    <div class="mx-4">--}}
    <!-- load phantom colors for card after: -->
    {{--        <p class="invisible hidden text-gray-800 text-red-500 text-red-600 text-blue-500 after:bg-gradient-to-tl after:from-zinc-800 after:to-zinc-700 after:from-blue-700 after:to-cyan-500 after:from-orange-500 after:to-yellow-500 after:from-green-600 after:to-lime-400 after:from-red-600 after:to-orange-600 after:from-slate-600 after:to-slate-300 text-emerald-500 text-cyan-500 text-slate-400"></p>--}}
    {{--        <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border" sidenav-card>--}}
    {{--            <img class="w-1/2 mx-auto" src="{{asset('AdminPanel/assets/img/illustrations/icon-documentation.svg')}}" alt="sidebar illustrations">--}}
    {{--            <div class="flex-auto w-full p-4 pt-0 text-center">--}}
    {{--                <div class="transition-all duration-200 ease-nav-brand">--}}
    {{--                    <h6 class="mb-0 dark:text-white text-slate-700 ">Need help?</h6>--}}
    {{--                    <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Please check our docs</p>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <a href="https://www.creative-tim.com/learning-lab/tailwind/html/quick-start/argon-dashboard/" target="_blank" class="inline-block w-full px-8 py-2 mb-4 text-xs font-bold leading-normal text-center text-white capitalize transition-all ease-in rounded-lg shadow-md bg-slate-700 bg-150 hover:shadow-xs hover:-translate-y-px">Documentation</a>--}}
    <!-- pro btn  -->
    {{--        <a class="inline-block w-full px-8 py-2 text-xs font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md select-none bg-150 bg-x-25 hover:shadow-xs hover:-translate-y-px" href="https://www.creative-tim.com/product/argon-dashboard-pro-tailwind?ref=sidebarfree" target="_blank">Upgrade to pro</a>--}}
    {{--    </div>--}}
</aside>

<!-- end sidenav -->

<main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
    <!-- Navbar -->
    <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start sticky top-[1%] backdrop-saturate-200 backdrop-blur-2xl dark:bg-slate-850/80 dark:shadow-dark-blur bg-[hsla(0,0%,100%,0.8)] shadow-blur z-110" navbar-main="" navbar-scroll="true">
        <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
            <nav>
                <!-- breadcrumb -->
                <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                    <li class="text-sm leading-normal">
                        <a class="opacity-50 dark:text-white" href="javascript:;">Pages</a>
                    </li>
                    <li class="text-sm pl-2 capitalize leading-normal before:float-left before:pr-2 before:content-['/'] dark:text-white dark:before:text-white" aria-current="page">AvtoReference</li>
                </ol>
                <h6 class="mb-0 font-bold capitalize dark:text-white">AvtoReference</h6>
            </nav>

            <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
                <div class="flex items-center md:ml-auto md:pr-4">
                </div>
                <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
                    <li class="flex items-center">
                        <a href="" class="block px-0 py-2 text-sm font-semibold transition-all ease-nav-brand dark:text-white">
                            <i class="fa fa-user sm:mr-1" aria-hidden="true"></i>
                            <span class="hidden sm:inline">{{$user->first_name." ".$user->last_name}}</span>
                        </a>
                    </li>
                    <li class="flex items-center pl-4 xl:hidden">
                        <a href="javascript:;" class="block p-0 text-sm transition-all ease-nav-brand dark:text-white" sidenav-trigger="">
                            <div class="w-4.5 overflow-hidden">
                                <i class="ease mb-0.75 relative block h-0.5 rounded-sm transition-all dark:bg-white bg-slate-500"></i>
                                <i class="ease mb-0.75 relative block h-0.5 rounded-sm transition-all dark:bg-white bg-slate-500"></i>
                                <i class="ease relative block h-0.5 rounded-sm transition-all dark:bg-white bg-slate-500"></i>
                            </div>
                        </a>
                    </li>
                    <li class="flex items-center px-4">
                        <a href="javascript:;" class="p-0 text-sm transition-all ease-nav-brand dark:text-white">
                            <i fixed-plugin-button-nav="" class="cursor-pointer fa fa-cog" aria-hidden="true"></i>
                            <!-- fixed-plugin-button-nav  -->
                        </a>
                    </li>

                    <!-- notifications -->

                    <li class="relative flex items-center pr-2">
                        <p class="hidden transform-dropdown-show"></p>
                        <a href="javascript:;" class="block p-0 text-sm transition-all ease-nav-brand dark:text-white" dropdown-trigger="" aria-expanded="false">
                            <i class="cursor-pointer fa fa-bell" aria-hidden="true"></i>
                        </a>

                        <ul dropdown-menu="" class="text-sm transform-dropdown before:font-awesome before:leading-default dark:shadow-dark-xl before:duration-350 before:ease lg:shadow-3xl duration-250 min-w-44 before:sm:right-8 before:text-5.5 pointer-events-none absolute right-0 top-0 z-50 origin-top list-none rounded-lg border-0 border-solid border-transparent dark:bg-slate-850 bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-2 before:left-auto before:top-0 before:z-50 before:inline-block before:font-normal before:antialiased before:transition-all before:content-['\f0d8'] sm:-mr-6 lg:absolute lg:right-0 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer dark:before:text-white">
                            <!-- add show class on dropdown open js -->
                            <li class="relative mb-2">
                                <a class="dark:hover:bg-slate-900 ease py-1.2 clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 duration-300 hover:bg-gray-200 hover:text-slate-700 lg:transition-colors" href="javascript:;">
                                    <div class="flex py-1">
                                        <div class="my-auto">
                                            <img src="{{asset('BackUp/user.png')}}" class="inline-flex items-center justify-center mr-4 text-sm h-9 w-9 max-w-none rounded-circle dark:text-white">
                                        </div>
                                        <div class="flex flex-col justify-center">
                                            <h6 class="mb-1 text-sm font-normal leading-normal dark:text-white"><span class="font-semibold">(New message)</span> from (users)</h6>
                                            <p class="mb-0 text-xs leading-tight text-slate-400 dark:text-white/80">
                                                <i class="mr-1 fa fa-clock" aria-hidden="true"></i>
                                                (number) minutes ago
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end Navbar -->

    <!-- cards -->


    <div class="w-full px-6 py-6 mx-auto">


        <form runat="server" action="{{ route('ReferenceDocument.store',$user->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-wrap -mx-3">
                <!-- card1 -->
                <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-2/4">
                    <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border mb-2">
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3 mb-4">
                                <div class="flex-none w-1/3 max-w-full px-3">
                                    <div>
                                        @if($img!=null)
                                            <img id="postjpg" class="imgwith" src="{{asset('References/'.$img)}}" alt="your image" />
                                        @elseif($user->gender=='Male')
                                            <img id="postjpg" class="imgwith" src="{{asset('BackUp/male.png')}}" alt="your image" />
                                        @else
                                            <img id="postjpg" class="imgwith" src="{{asset('BackUp/female.png')}}" alt="your image" />
                                        @endif
                                    </div>
                                </div>
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div class="flex-auto p-1 w-2/3">
                                        <button type="button" onclick=" document.getElementById('imgInp').click();" style="background: #ca8d0a; color: white" class="flex-none w-full max-w-full px-3  break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border p-4">
                                            Rasmingizni tanlang (3x4 bo`lishi shart)
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <div class="flex flex-wrap">
                            <div class="flex-auto pl-3">
                                <div>
                                    <label class="dark:text-white">Ismingiz</label>
                                </div>
                                <div class="flex flex-row -mx-3 w-full p-3">
                                    <input value="@if($a){{$reference->first_name}}@endif" type="text" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Ismingizni kiriting ..." required name="first_name">
                                </div>
                            </div>
                            <div class="flex-auto pl-3">
                                <div>
                                    <label class="dark:text-white">Familiyangiz</label>
                                </div>
                                <div class="flex flex-row -mx-3 w-full p-3">
                                    <input value="@if($a){{$reference->last_name}}@endif" type="text" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Familiyangizni kiriting ..." required name="last_name">
                                </div>
                            </div>
                            <div class="flex-auto pl-3">
                                <div>
                                    <label class="dark:text-white">Otangizning ismi</label>
                                </div>
                                <div class="flex flex-row -mx-3 w-full p-3">
                                    <input value="@if($a){{$reference->patronymic}}@endif" type="text" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Otangizning ismi ..." required name="patronymic">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="flex-auto w-full pl-3">
                            <div>
                                <label class="dark:text-white">Ishlash yoki o`qish joyingizga qachon qabul qilingansiz</label>
                            </div>
                            <div class="flex flex-row -mx-3 w-full p-3">
                                <input value="@if($a){{$reference->date}}@endif" type="date" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" required name="date">
                            </div>
                        </div>
                        <div class="flex-auto w-full pl-3">
                            <div>
                                <label class="dark:text-white">Qayerga va qanday lavozimda qabul qilingansiz</label>
                            </div>
                            <div class="flex flex-row -mx-3 w-full p-3">
                                <input value="@if($a){{$reference->text}}@endif" type="text" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Ex: ______ga grand asosida qabul qilingan"  required name="text">
                            </div>
                        </div>
                        <br>
                        <div class="flex-auto w-full pl-3">
                            <div>
                                <label class="dark:text-white">Tug`ilgan sanangiz</label>
                            </div>
                            <div class="flex flex-row -mx-3 w-full p-3">
                                <input value="@if($a){{$reference->birthday}}@endif" type="date" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" required name="birthday">
                            </div>
                        </div>
                        <div class="flex-auto w-full pl-3">
                            <div>
                                <label class="dark:text-white">Tug`ilgan joyingiz</label>
                            </div>
                            <div class="flex flex-row -mx-3 w-full p-3">
                                <input value="@if($a){{$reference->birthday_location}}@endif" type="text" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Ex: __ viloyati, .... , __-uy" required name="birthday_location">
                            </div>
                        </div>
                        <br>
                        <div class="flex flex-wrap">
                            <div class="flex-auto pl-3">
                                <div>
                                    <label class="dark:text-white">Millatingiz</label>
                                </div>
                                <div class="flex flex-row -mx-3 w-full p-3">
                                    <input value="@if($a){{$reference->nation}}@else O`zbek @endif" type="text" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Ex: O`zbek" required name="nation">
                                </div>
                            </div>
                            <div class="flex-auto pl-3">
                                <div>
                                    <label class="dark:text-white">Partiyaviyligizngiz</label>
                                </div>
                                <div class="flex flex-row -mx-3 w-full p-3">
                                    <input value="@if($a){{$reference->party}}@else Yo`q @endif" type="text" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Kiriting ..." required name="party">
                                </div>
                            </div>
                            <div class="flex-auto pl-3">
                                <div>
                                    <label class="dark:text-white">Ma`lumotingiz</label>
                                </div>
                                <div class="flex flex-row -mx-3 w-full p-3">
                                    <input value="@if($a){{$reference->info}}@endif" type="text" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Ex: O`rta" required name="info">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="flex-auto w-full pl-3">
                            <div>
                                <label class="dark:text-white">Tamomlagan(bitirgan) joyigiz</label>
                            </div>
                            <div class="flex flex-row -mx-3 w-full p-3">
                                <input value="@if($a){{$reference->graduated}}@endif" type="text" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Ex: Xorazm viloyati, ___dagi __-maktab" required name="graduated">
                            </div>
                        </div>
                        <div class="flex-auto w-full pl-3">
                            <div>
                                <label class="dark:text-white">Sohangiz(Yo`nalishingiz)</label>
                            </div>
                            <div class="flex flex-row -mx-3 w-full p-3">
                                <input value="@if($a){{$reference->specialist}}@endif" type="text" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Ex: Kompyuter injineringi(Kompyuter injineringi)" required name="specialist">
                            </div>
                        </div>
                        <div class="flex-auto w-full pl-3">
                            <div>
                                <label class="dark:text-white">Ilmiy darajangiz</label>
                            </div>
                            <div class="flex flex-row -mx-3 w-full p-3">
                                <input value="@if($a){{$reference->academic_degree}}@else Yo`q @endif" type="text" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Kiriting ..." required name="academic_degree">
                            </div>
                        </div>
                        <div class="flex-auto w-full pl-3">
                            <div>
                                <label class="dark:text-white">Ilmiy unvoningiz</label>
                            </div>
                            <div class="flex flex-row -mx-3 w-full p-3">
                                <input value="@if($a){{$reference->academic_title}}@else Yo`q @endif" type="text" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Kiriting ..." required name="academic_title">
                            </div>
                        </div>
                        <br>
                        <div class="flex flex-wrap">
                            <div class="flex-auto pl-3">
                                <div>
                                    <label class="dark:text-white">Qaysi chet tillarini bilasiz</label>
                                </div>
                                <div class="flex flex-row -mx-3 w-full p-3">
                                    <input value="@if($a){{$reference->language}}@else Yo`q @endif" type="text" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Ex: Ingliz tili, rus tili" required name="language">
                                </div>
                            </div>
                            <div class="flex-auto pl-3">
                                <div>
                                    <label class="dark:text-white">Davlat mukofoti bilan taqdirlanganmisiz(Qaysilari)</label>
                                </div>
                                <div class="flex flex-row -mx-3 w-full p-3">
                                    <input value="@if($a){{$reference->state_award}}@else Yo`q @endif" type="text" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Kiriting ..." required name="state_award">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="flex-auto w-full pl-3">
                            <div>
                                <label class="dark:text-white">Xalq deputatlari respublika, viloyat, shahar va tuman Kengashi deputatimi yoki boshqa saylanadigan organlarning a’zosimi(to‘liq ko‘rsatilishi lozim):</label>
                            </div>
                            <div class="flex flex-row -mx-3 w-full p-3">
                                <input value="@if($a){{$reference->party_member}}@else Yo`q @endif" type="text" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Kiriting ..." required name="party_member">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- card2 -->

                <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-2/4">
                    <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border mb-2">
                        <div class="flex-auto pl-3 w-1/3">
                            <div class="flex flex-row -mx-3 w-25 p-3" align="center">
                                <h3 class="pl-2 focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:outline-none focus:transition-shadow">Oila a`zolaringiz</h3>
                            </div>
                        </div>
                    </div>


                    <div id="Family">

                        @foreach($family as $key=>$val)
                        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border mb-2">
                            <div class="flex flex-wrap">
                                <div class="flex-auto pl-3 w-1/3">
                                    <div>
                                        <label class="dark:text-white">Foydalanuvchining kimi</label>
                                    </div>
                                    <div class="flex flex-row -mx-3 w-full p-3">
                                        <input value="{{$family[$key]}}" type="text" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Ex: Otasi" required name="family[]">
                                    </div>
                                </div>
                                <div class="flex-auto pl-3 w-2/3">
                                    <div>
                                        <label class="dark:text-white">To`liq ismi</label>
                                    </div>
                                    <div class="flex flex-row -mx-3 w-full p-3">
                                        <input value="{{$fullname[$key]}}" type="text" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Kiriting ..." required name="fullname[]">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="flex-auto w-full pl-3">
                                <div>
                                    <label class="dark:text-white">Tug`ilgan sanasi</label>
                                </div>
                                <div class="flex flex-row -mx-3 w-full p-3">
                                    <input value="{{$fbirthday[$key]}}" type="date" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" required name="fbirthday[]">
                                </div>
                                <div>
                                    <label class="dark:text-white">Tug`ilgan joyi</label>
                                </div>
                                <div class="flex flex-row -mx-3 w-full p-3">
                                    <input value="{{$fbirthday_location[$key]}}" type="text" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Kiriting ..." required name="fbirthday_location[]">
                                </div>
                            </div>
                            <div class="flex-auto w-full pl-3">
                                <div>
                                    <label class="dark:text-white">Kasbi</label>
                                </div>
                                <div class="flex flex-row -mx-3 w-full p-3">
                                    <input value="{{$workplace[$key]}}" type="text" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Kiriting ..." required name="workplace[]">
                                </div>
                            </div>
                            <div class="flex-auto w-full pl-3">
                                <div>
                                    <label class="dark:text-white">Hozirda qayerda yashayapdi</label>
                                </div>
                                <div class="flex flex-row -mx-3 w-full p-3">
                                    <input value="{{$location[$key]}}" type="text" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Kiriting ..." required name="location[]">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border mb-2">
                        <div class="flex-auto p-4 w-full">
                            <div class="flex flex-row -mx-3 w-full p-3">
                                <button type="button" onclick="AddFamily()" style="background: #108300; color: white" class="flex-none w-full max-w-full px-3  break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border p-4">
                                    Yana qo`shish
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>



            <div class="flex flex-wrap">
                <div class="flex-auto pl-3">
                    <div class="flex flex-row -mx-3 w-full p-3">
                        <input style="display: none" accept=".jpg" type='file' id="imgInp" name="img">
                        <button type="submit" style="background: #0a58ca; color: white" class="flex-none w-full max-w-full px-3  break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border p-4">
                            Ma`lumotlarni saqlash
                        </button>
                    </div>
                </div>
            </div>
        </form>

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

    <!-- end cards -->
</main>

<div fixed-plugin>
    <a fixed-plugin-button class="fixed px-4 py-2 text-xl bg-white shadow-lg cursor-pointer bottom-8 right-8 z-990 rounded-circle text-slate-700">
        <i class="py-2 pointer-events-none fa fa-cog"> </i>
    </a>
    <!-- -right-90 in loc de 0-->
    <div fixed-plugin-card class="z-sticky backdrop-blur-2xl backdrop-saturate-200 dark:bg-slate-850 shadow-3xl w-90 ease -right-90 fixed top-0 left-auto flex h-full min-w-0 flex-col break-words rounded-none border-0 bg-white bg-clip-border px-2.5 duration-200">
        <div class="px-6 pt-4 pb-0 mb-0 border-b-0 rounded-t-2xl">
            <div class="float-left">
                <div class="dropdown">
                    <span>
                        <img src='{{asset("UsersContent/$user->id/$user->profile")}}' class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-in-out h-30 w-30 rounded-circle">
                    </span>
                    <div class="dropdown-content dark:bg-slate-850 bg-white">
                        <a href="{{asset("Users")."/".$user->id."/edit"}}" style="color: #1aff00" class="dropdown-item">
                            <i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp
                            Profile!
                        </a>
                        <hr class="h-px mx-0 my-1 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button style="color: red" class="dropdown-item" href="{{ __('Log Out') }}">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp
                                Log Out!
                            </button>
                        </form>
                    </div>
                </div>
                <h5 class="mt-4 mb-0 dark:text-white">{{$user->first_name." ".$user->last_name}}</h5>
                <p class="dark:text-white dark:opacity-80">{{$user->user}}</p>
            </div>
            <div class="float-right mt-6">
                <button fixed-plugin-close-button class="inline-block p-0 mb-4 text-sm font-bold leading-normal text-center uppercase align-middle transition-all ease-in bg-transparent border-0 rounded-lg shadow-none cursor-pointer hover:-translate-y-px tracking-tight-rem bg-150 bg-x-25 active:opacity-85 dark:text-white text-slate-700">
                    <i class="fa fa-close"></i>
                </button>
            </div>
            <!-- End Toggle Button -->
        </div>
        <hr class="h-px mx-0 my-1 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
        <div class="flex-auto p-6 pt-0 overflow-auto sm:pt-4">
            <div class="mt-4" style="display: none">
                <h6 class="mb-0 dark:text-white">Sidenav Type</h6>
                <p class="text-sm leading-normal dark:text-white dark:opacity-80">Choose between 2 different sidenav types.</p>
            </div>
            <div class="flex" style="display: none">
                <button transparent-style-btn class="inline-block w-full px-4 py-2.5 mb-2 font-bold leading-normal text-center text-white capitalize align-middle transition-all bg-blue-500 border border-transparent border-solid rounded-lg cursor-pointer text-sm xl-max:cursor-not-allowed xl-max:opacity-65 xl-max:pointer-events-none xl-max:bg-gradient-to-tl xl-max:from-blue-500 xl-max:to-violet-500 xl-max:text-white xl-max:border-0 hover:-translate-y-px dark:cursor-not-allowed dark:opacity-65 dark:pointer-events-none dark:bg-gradient-to-tl dark:from-blue-500 dark:to-violet-500 dark:text-white dark:border-0 hover:shadow-xs active:opacity-85 ease-in tracking-tight-rem shadow-md bg-150 bg-x-25 bg-gradient-to-tl from-blue-500 to-violet-500 hover:border-blue-500" data-class="bg-transparent" active-style>Light</button>
                <button white-style-btn class="inline-block w-full px-4 py-2.5 mb-2 ml-2 font-bold leading-normal text-center text-blue-500 capitalize align-middle transition-all bg-transparent border border-blue-500 border-solid rounded-lg cursor-pointer text-sm xl-max:cursor-not-allowed xl-max:opacity-65 xl-max:pointer-events-none xl-max:bg-gradient-to-tl xl-max:from-blue-500 xl-max:to-violet-500 xl-max:text-white xl-max:border-0 hover:-translate-y-px dark:cursor-not-allowed dark:opacity-65 dark:pointer-events-none dark:bg-gradient-to-tl dark:from-blue-500 dark:to-violet-500 dark:text-white dark:border-0 hover:shadow-xs active:opacity-85 ease-in tracking-tight-rem shadow-md bg-150 bg-x-25 bg-none hover:border-blue-500" data-class="bg-white">Dark</button>
            </div>
            <p style="display: none" class="block mt-2 text-sm leading-normal dark:text-white dark:opacity-80 xl:hidden">You can change the sidenav type just on desktop view.</p>
            <!-- Navbar Fixed -->
            <div class="flex my-4" style="display: none">
                <h6 class="mb-0 dark:text-white">Pinning the Navigation bar</h6>
                <div class="block pl-0 ml-auto min-h-6">
                    <input id="navbtn" navbarFixed onclick="if(document.getElementById('navbtn').checked){ document.getElementById('navpin').value='1'; } else { document.getElementById('navpin').value='0'; } document.getElementById('sendnav').click();" class="rounded-10 duration-250 ease-in-out after:rounded-circle after:shadow-2xl after:duration-250 after:translate-x-5.3 h-5 relative float-left mt-1 ml-auto w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] border-blue-500/95 bg-blue-500/95 bg-none bg-right" type="checkbox" />
                </div>
            </div>
            <hr class="h-px my-6 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />
            <div class="flex mt-2 mb-12">
                <h6 class="mb-0 dark:text-white">Light / Dark</h6>
                <div class="block pl-0 ml-auto min-h-6">

                    <input id="thema" dark-toggle onclick="if(document.getElementById('thema').checked){ document.getElementById('alltheme').value='dark'; } else { document.getElementById('alltheme').value='light'; } document.getElementById('sendsetting').click(); " @if($setting->theme=='dark') checked @endif class="rounded-10 duration-250 ease-in-out after:rounded-circle after:shadow-2xl after:duration-250 checked:after:translate-x-5.3 h-5 relative float-left mt-1 ml-auto w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-blue-500/95 checked:bg-blue-500/95 checked:bg-none checked:bg-right" type="checkbox" />

                    <div style="display: none">
                        <form method="POST" action="{{ url('/Setting') }}" enctype="multipart/form-data" onsubmit="return onsubmitForm(this);">
                            @csrf

                            <input id="alltheme" type="text" name="theme" value="1">

                            <input id="sendsetting" type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</body>
<input id="addnum" style="display: none" value="1">
<!-- plugin for charts  -->
<script src="{{asset('AdminPanel/assets/js/plugins/chartjs.min.js')}}" async></script>
<!-- plugin for scrollbar  -->
<script src="{{asset('AdminPanel/assets/js/plugins/perfect-scrollbar.min.js')}}" async></script>
<!-- main script file  -->
<script src="{{asset('AdminPanel/assets/js/argon-dashboard-tailwind.js?v=1.0.1')}}" async></script>
<script>
    let th = @json($setting->theme);
    if(th == 'dark')
    {
        var dark_mode = document.querySelector("[dark-toggle]");
        var root = document.querySelector("html");
        root.classList.add("dark");
    }
</script>
<script>
    function onsubmitForm(form) {
        // create AJAX instance
        var ajax = new XMLHttpRequest();

        // open the request
        ajax.open("POST", form.getAttribute("action"), true);

        // ajax.onreadystatechange = function () {
        //     // when the request is successfull
        //     if (this.readyState == 4 && this.status == 200) {
        //         // convert the JSON response into Javascript object
        //         var data = JSON.parse(this.responseText);
        //
        //         // show the response
        //         alert(data.status + " - " + data.message);
        //     }
        //
        //     // if the request fails
        //     if (this.status == 500) {
        //         alert(this.responseText);
        //     }
        // };

        var formData = new FormData(form);
        ajax.send(formData);
        return false;
    }
</script>
<script>
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            let s=file.name;
            if(s.substring(s.length-4,s.length)=='.jpg')
            {
                postjpg.src = URL.createObjectURL(file);
                document.getElementById('postjpg').style="display: block";
            }
        }
    }
</script>
<script src="{{asset("jquery.min.js")}}"></script>
<script>
    function AddFamily()
    {
        let number=parseInt(document.getElementById('addnum').value);
        number+=1;
        if(number>15)
        {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Siz maximal 15 oila a`zosini kirita olasiz!'
            })
            return 0;
        }
        let family='family[]';
        let fullname='fullname[]';
        let birthday='fbirthday[]';
        let birthday_location='fbirthday_location[]';
        let workplace='workplace[]';
        let locations='location[]';

        addhtml=""+
            '<div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border mb-2"> <div class="flex flex-wrap"> <div class="flex-auto pl-3 w-1/3"><div> <label class="dark:text-white">Foydalanuvchining kimi</label> </div> <div class="flex flex-row -mx-3 w-full p-3"> <input type="text" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Ex: Otasi" required name="'+
            family+
            '"></div></div><div class="flex-auto pl-3 w-2/3"><div> <label class="dark:text-white">To`liq ismi</label> </div><div class="flex flex-row -mx-3 w-full p-3"><input value="" type="text" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Kiriting" required name="'+
            fullname+
            '"></div></div></div><br><div class="flex-auto w-full pl-3"><div><label class="dark:text-white">Tug`ilgan sanasi</label></div><div class="flex flex-row -mx-3 w-full p-3"><input value="" type="date" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" required name="'+
            birthday+
            '"></div><div> <label class="dark:text-white">Tug`ilgan joyi</label> </div><div class="flex flex-row -mx-3 w-full p-3"><input value="" type="text" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Kiriting ..." required name="'+
            birthday_location+
            '"></div></div><div class="flex-auto w-full pl-3"><div> <label class="dark:text-white">Kasbi</label> </div><div class="flex flex-row -mx-3 w-full p-3"><input value="" type="text" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Kiriting ..." required name="'+
            workplace+
            '"></div></div><div class="flex-auto w-full pl-3"><div> <label class="dark:text-white">Hozirda qayerda yashayapdi</label> </div><div class="flex flex-row -mx-3 w-full p-3"><input value="" type="text" class="pl-2 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Kiriting ..." required name="'+
            locations+
            '"></div></div></div>';
        // document.getElementById('Family').innerHTML+=addhtml;
        $('#Family').append(addhtml);
        document.getElementById('addnum').value=number;
    }
</script>
</html>
