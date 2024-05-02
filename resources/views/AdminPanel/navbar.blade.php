<nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start sticky top-[1%] backdrop-saturate-200 backdrop-blur-2xl dark:bg-slate-850/80 dark:shadow-dark-blur bg-[hsla(0,0%,100%,0.8)] shadow-blur z-110" navbar-main="" navbar-scroll="true">
        <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
            <nav>
                <!-- breadcrumb -->
                <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                    <li class="text-sm leading-normal">
                        <a class="opacity-50 dark:text-white" href="javascript:;">Pages</a>
                    </li>
                    <li class="text-sm pl-2 capitalize leading-normal before:float-left before:pr-2 before:content-['/'] dark:text-white dark:before:text-white" aria-current="page">@yield('title')</li>
                </ol>
                <h6 class="mb-0 font-bold capitalize dark:text-white">@yield('title')</h6>
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