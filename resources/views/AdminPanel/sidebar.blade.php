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
                <a class="@if(request()->routeIs('AdminDashboard')) bg-blue-500/13 rounded-lg text-slate-700 @endif dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 font-semibold transition-colors" href="{{route('AdminDashboard')}}">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-black ni ni-tv-2"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="@if(request()->routeIs('leaderboard')) bg-blue-500/13 rounded-lg text-slate-700 @endif dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 font-semibold transition-colors" href="{{route('leaderboard')}}">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-black bi bi-backpack4-fill"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Leaderboard</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="@if(request()->routeIs('AdminUsers')) bg-blue-500/13 rounded-lg text-slate-700 @endif dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{route('AdminUsers')}}">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-blue-500 fas fa-users"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Yordamchilar</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="@if(request()->routeIs('AdminPosts')) bg-blue-500/13 rounded-lg text-slate-700 @endif dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{route('AdminPosts')}}">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-orange-500 fas fa-images"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Postlar</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="@if(request()->routeIs('AdminNews')) bg-blue-500/13 rounded-lg text-slate-700 @endif dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{route('AdminNews')}}">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-green-800 fas fa-newspaper"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Yangiliklar</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="@if(request()->routeIs('AdminChoices')) bg-blue-500/13 rounded-lg text-slate-700 @endif dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{route('AdminChoices')}}">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-yellow-800 ni ni-trophy"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Tanlovlar</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="@if(request()->routeIs('AdminStatutes')) bg-blue-500/13 rounded-lg text-slate-700 @endif dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{route('AdminStatutes')}}">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-red-500 ni ni-book-bookmark"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Nizomlar</span>
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