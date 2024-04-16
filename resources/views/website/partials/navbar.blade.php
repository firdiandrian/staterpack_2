 <!-- <header class="p-4 bg-transparent tp-main-menu">
<div class="container flex justify-between  items-centerh-16 mx-auto control-2">
            <ul class="items-stretch hidden space-x-3 mx-auto md:hidden lg:flex">
                <li class="flex has-dropdown">
                    <a rel="noopener noreferrer" href="#"
                        class="flex items-center px-4 -mb-1 border-b-2 dark:border-transparent text-[#020617] font text-[18px] font-bold">Shop</a>
                    <ul class="submenu text-start">
                        <li><a href="index.html">Creative Agency</a></li>
                        <li><a href="index-2.html">Personal Portfolio</a></li>
                        <li><a href="index-3.html">Startup Business</a></li>
                        <li><a href="index-4.html">Digital Agency</a></li>
                        <li><a href="index-5.html">Business Advisor</a></li>
                        <li><a href="index-6.html">IT shop Agency</a></li>
                        <li><a href="index-7.html">Corporate Agency</a></li>
                        <li><a href="index-8.html">Fashion Blog 01</a></li>
                        <li><a href="index-9.html">Fashion Blog 02</a></li>
                    </ul>
                </li>
                <li class="flex">
                    <a rel="noopener noreferrer" href="#"
                        class="flex items-center px-4 -mb-1 border-b-2 dark:border-transparent text-[#020617] font text-[18px] font-bold">Collection</a>
                </li>
                <li class="flex">
                    <a rel="noopener noreferrer" href="#"
                        class="flex items-center px-4 -mb-1 border-b-2 dark:border-transparent text-[#020617] font text-[18px] font-bold">Blog</a>
                </li>
                <li class="flex">
                    <a rel="noopener noreferrer" href="#"
                        class="flex items-center px-4 -mb-1 border-b-2 dark:border-transparent text-[#020617] font text-[18px] font-bold">By
                        M2</a>
                </li>
                <li class="flex">
                    <a rel="noopener noreferrer" href="#"
                        class="flex items-center px-4 -mb-1 border-b-2 dark:border-transparent text-[#020617] font text-[18px] font-bold">More
                        From Unkl M</a>
                </li>
                <li class="flex">
                    <a rel="noopener noreferrer" href="#"
                        class="flex items-center px-4 -mb-1 border-b-2 dark:border-transparent text-[#020617] font text-[18px] font-bold">Text
                        Us</a>
                </li>
            </ul>
            <fieldset class=" space-y-1 dark:text-gray-100">
                <label for="Search" class="hidden">Search</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-32 flex items-center pl-2">
                        <button type="button" title="search" class="p-1 focus:outline-none focus:ring">
                            <svg fill="currentColor" viewBox="0 0 512 512" class="w-4 h-4 text-black">
                                <path
                                    d="M479.6,399.716l-81.084-81.084-62.368-25.767A175.014,175.014,0,0,0,368,192c0-97.047-78.953-176-176-176S16,94.953,16,192,94.953,368,192,368a175.034,175.034,0,0,0,101.619-32.377l25.7,62.2L400.4,478.911a56,56,0,1,0,79.2-79.195ZM48,192c0-79.4,64.6-144,144-144s144,64.6,144,144S271.4,336,192,336,48,271.4,48,192ZM456.971,456.284a24.028,24.028,0,0,1-33.942,0l-76.572-76.572-23.894-57.835L380.4,345.771l76.573,76.572A24.028,24.028,0,0,1,456.971,456.284Z">
                                </path>
                            </svg>
                        </button>
                    </span>
                    <input type="" name="Search" placeholder="Search..."
                        class="w-32 py-2 pl-10 text-sm rounded-md sm:w-auto focus:outline-none bg-white text-black focus:bg-white border-[1px] border-[#CBD5E1] focus:border-[#CBD5E1]">
                </div>
            </fieldset>
            <button class="flex justify-end p-4 xl:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>
    </header>  -->

 <a href="{{ route('article.index') }}" class="mx-auto justify-center flex mb-20 mt-[60px]">
     <img class="control-logo" src="{{ asset(@$setting->firstWhere('key', 'logo')->value) }}"
         alt="{{ @$setting->firstWhere('key', 'meta_description')->value }}"> </a>

 <header id="navbar" class="hidden lg:block fixed w-full -mt-[280px]" style="z-index: 999;">
     <div id="navbar_2" class="tp-header-area header-transparent z-auto">
         <div class="container-custom-3 mx-auto">
             <div class="flex mx-auto items-center justify-between">
                 <div class="tp-main-menu">
                     <nav id="mobile-menu ">

                         {{-- <ul class="prefer">
                             @foreach ($menu_navbar as $menu_1)
                                 @php
                                     $hasSubmenu = isset($submenus[$menu_1->id]);
                                 @endphp
                                 <li
                                     class="{{ $hasSubmenu ? 'has-dropdown' : '' }} {{ $menu == $menu_1->title ? 'active-link' : '' }}">
                                     <a class="font hover:border-b-[2px] hover:border-b-[#FF00A6]"
                                         href="{{ $menu_1->link }}">{{ $menu_1->title }}</a>
                                     @if ($hasSubmenu)
                                         <ul class="submenu text-start">
                                             @foreach ($submenus[$menu_1->id] as $submenu)
                                                 <li><a href="{{ $submenu->link }}">{{ $submenu->title }}</a></li>
                                             @endforeach
                                         </ul>
                                     @endif
                                 </li>
                             @endforeach
                         </ul> --}}

                     </nav>
                 </div>
                 <div class="flex items-center gap-10">
                     <!-- <div class="flex items-center gap-2">
                            <button class="Bag">Bag</button>
                            <img src="{{ asset('static/website/images/Vector.png') }}" alt="">
                        </div> -->
                     <fieldset class=" space-y-1 dark:text-gray-100 hokya">
                         <label for="Search" class="hidden">Search</label>
                         <div class="relative">
                             <span class="absolute inset-y-0 left-32 flex items-center pl-2">
                                 <button type="button" title="search" class="p-1 focus:outline-none focus:ring">
                                     <svg fill="currentColor" viewBox="0 0 512 512" class="w-4 h-4 dark:text-black">
                                         <path
                                             d="M479.6,399.716l-81.084-81.084-62.368-25.767A175.014,175.014,0,0,0,368,192c0-97.047-78.953-176-176-176S16,94.953,16,192,94.953,368,192,368a175.034,175.034,0,0,0,101.619-32.377l25.7,62.2L400.4,478.911a56,56,0,1,0,79.2-79.195ZM48,192c0-79.4,64.6-144,144-144s144,64.6,144,144S271.4,336,192,336,48,271.4,48,192ZM456.971,456.284a24.028,24.028,0,0,1-33.942,0l-76.572-76.572-23.894-57.835L380.4,345.771l76.573,76.572A24.028,24.028,0,0,1,456.971,456.284Z">
                                         </path>
                                     </svg>
                                 </button>
                             </span>
                             <input type="" name="Search" placeholder="Search..."
                                 class="w-32 h-12 py-2 pl-10 text-sm rounded-3xl sm:w-auto focus:outline-none bg-white text-black focus:bg-white border-[1px] border-[#CBD5E1] focus:border-[#CBD5E1]">
                         </div>
                     </fieldset>
                     <!-- <div class="tp-menu-bar text-end button-nav">
                            <button id="navbar-root"><i class="fal fa-bars"></i></button>
                        </div> -->
                 </div>
             </div>
         </div>
         <!-- <aside id="sidebar-2"
                class="hidden w-full h-[470px] p-6 sm:w-60 bg-gray-900 dark:text-gray-100 mt-20 z-50 overflow-y-scroll absolute mx-auto justify-center">
                <nav class="text-sm">
                    <fieldset class=" space-y-1 dark:text-gray-100">
                        <label for="Search" class="hidden">Search</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 filter flex items-center pl-2">
                                <button type="button" title="search" class="p-1 focus:outline-none focus:ring">
                                    <svg fill="currentColor" viewBox="0 0 512 512" class="w-4 h-4 dark:text-black">
                                        <path
                                            d="M479.6,399.716l-81.084-81.084-62.368-25.767A175.014,175.014,0,0,0,368,192c0-97.047-78.953-176-176-176S16,94.953,16,192,94.953,368,192,368a175.034,175.034,0,0,0,101.619-32.377l25.7,62.2L400.4,478.911a56,56,0,1,0,79.2-79.195ZM48,192c0-79.4,64.6-144,144-144s144,64.6,144,144S271.4,336,192,336,48,271.4,48,192ZM456.971,456.284a24.028,24.028,0,0,1-33.942,0l-76.572-76.572-23.894-57.835L380.4,345.771l76.573,76.572A24.028,24.028,0,0,1,456.971,456.284Z">
                                        </path>
                                    </svg>
                                </button>
                            </span>
                            <input type="search" name="Search" placeholder="Search..."
                                class="w-32 h-12 py-2 pl-10 text-sm rounded-md sm:w-auto focus:outline-none bg-white text-black focus:bg-white border-[1px] border-[#CBD5E1] focus:border-[#CBD5E1]">
                        </div>
                    </fieldset>
                    <details class="mt-6">
                        <summary
                            class="py-2 outline-none cursor-pointer text-sm font-semibold tracki uppercase dark:text-gray-400">
                            Shop</summary>
                        <div class="px-4 flex flex-col space-y-1 pb-4">
                            <a rel="noopener noreferrer" href="#">Header</a>
                            <a rel="noopener noreferrer" href="#">Drawer</a>
                            <a rel="noopener noreferrer" href="#">Page Title</a>
                            <a rel="noopener noreferrer" href="#">Menus</a>
                            <a rel="noopener noreferrer" href="#">Sidebar</a>
                            <a rel="noopener noreferrer" href="#">Footer</a>
                        </div>
                    </details>
                    <details>
                        <summary
                            class="py-2 outline-none cursor-pointer text-sm font-semibold tracki uppercase dark:text-gray-400">
                            Collection</summary>
                        <div class="px-4 flex flex-col space-y-1 pb-4">
                            <a rel="noopener noreferrer" href="#">Header</a>
                            <a rel="noopener noreferrer" href="#">Drawer</a>
                            <a rel="noopener noreferrer" href="#">Page Title</a>
                            <a rel="noopener noreferrer" href="#">Menus</a>
                            <a rel="noopener noreferrer" href="#">Sidebar</a>
                            <a rel="noopener noreferrer" href="#">Footer</a>
                        </div>
                    </details>
                    <details>
                        <summary
                            class="py-2 outline-none cursor-pointer text-sm font-semibold tracki uppercase dark:text-gray-400">
                            Collaboration</summary>
                        <div class="px-4 flex flex-col space-y-1 pb-4">
                            <a rel="noopener noreferrer" href="#">Header</a>
                            <a rel="noopener noreferrer" href="#">Drawer</a>
                            <a rel="noopener noreferrer" href="#">Page Title</a>
                            <a rel="noopener noreferrer" href="#">Menus</a>
                            <a rel="noopener noreferrer" href="#">Sidebar</a>
                            <a rel="noopener noreferrer" href="#">Footer</a>
                        </div>
                    </details>
                    <details>
                        <summary
                            class="py-2 outline-none cursor-pointer text-sm font-semibold tracki uppercase dark:text-gray-400">
                            Blog</summary>
                        <div class="px-4 flex flex-col space-y-1 pb-4">
                            <a rel="noopener noreferrer" href="#">Header</a>
                            <a rel="noopener noreferrer" href="#">Drawer</a>
                            <a rel="noopener noreferrer" href="#">Page Title</a>
                            <a rel="noopener noreferrer" href="#">Menus</a>
                            <a rel="noopener noreferrer" href="#">Sidebar</a>
                            <a rel="noopener noreferrer" href="#">Footer</a>
                        </div>
                    </details>
                    <details>
                        <summary
                            class="py-2 outline-none cursor-pointer text-sm font-semibold tracki uppercase dark:text-gray-400">
                            By M2</summary>
                        <div class="px-4 flex flex-col space-y-1 pb-4">
                            <a rel="noopener noreferrer" href="#">Header</a>
                            <a rel="noopener noreferrer" href="#">Drawer</a>
                            <a rel="noopener noreferrer" href="#">Page Title</a>
                            <a rel="noopener noreferrer" href="#">Menus</a>
                            <a rel="noopener noreferrer" href="#">Sidebar</a>
                            <a rel="noopener noreferrer" href="#">Footer</a>
                        </div>
                    </details>
                    <details>
                        <summary
                            class="py-2 outline-none cursor-pointer text-sm font-semibold tracki uppercase dark:text-gray-400">
                            More From Unkl M</summary>
                        <div class="px-4 flex flex-col space-y-1 pb-4">
                            <a rel="noopener noreferrer" href="#">Header</a>
                            <a rel="noopener noreferrer" href="#">Drawer</a>
                            <a rel="noopener noreferrer" href="#">Page Title</a>
                            <a rel="noopener noreferrer" href="#">Menus</a>
                            <a rel="noopener noreferrer" href="#">Sidebar</a>
                            <a rel="noopener noreferrer" href="#">Footer</a>
                        </div>
                    </details>
                    <details>
                        <summary
                            class="py-2 outline-none cursor-pointer text-sm font-semibold tracki uppercase dark:text-gray-400">
                            Text Us</summary>
                        <div class="px-4 flex flex-col space-y-1 pb-4">
                            <a rel="noopener noreferrer" href="#">Header</a>
                            <a rel="noopener noreferrer" href="#">Drawer</a>
                            <a rel="noopener noreferrer" href="#">Page Title</a>
                            <a rel="noopener noreferrer" href="#">Menus</a>
                            <a rel="noopener noreferrer" href="#">Sidebar</a>
                            <a rel="noopener noreferrer" href="#">Footer</a>
                        </div>
                    </details>
                </nav>
            </aside> -->
     </div>
 </header>

 <!-- mobile -->
 <div id="navbar_mobile" class="lg:hidden" style="z-index: 999;">
     <div id="navbar_mobile_2" class="p-4" style="z-index: 999;">
         <div class="container-custom-3 mx-auto">
             <div class="flex justify-between items-center">
                 <fieldset class=" space-y-1 dark:text-gray-100">
                     <label for="Search" class="hidden">Search</label>
                     <div class="relative">
                         <span class="absolute inset-y-0 filter flex items-center pl-2">
                             <button type="button" title="search" class="p-1 focus:outline-none focus:ring">
                                 <svg fill="currentColor" viewBox="0 0 512 512" class="w-4 h-4 dark:text-black">
                                     <path
                                         d="M479.6,399.716l-81.084-81.084-62.368-25.767A175.014,175.014,0,0,0,368,192c0-97.047-78.953-176-176-176S16,94.953,16,192,94.953,368,192,368a175.034,175.034,0,0,0,101.619-32.377l25.7,62.2L400.4,478.911a56,56,0,1,0,79.2-79.195ZM48,192c0-79.4,64.6-144,144-144s144,64.6,144,144S271.4,336,192,336,48,271.4,48,192ZM456.971,456.284a24.028,24.028,0,0,1-33.942,0l-76.572-76.572-23.894-57.835L380.4,345.771l76.573,76.572A24.028,24.028,0,0,1,456.971,456.284Z">
                                     </path>
                                 </svg>
                             </button>
                         </span>
                         <input type="" name="Search" placeholder="Search..."
                             class="w-32 h-12 py-2 pl-10 text-sm rounded-3xl sm:w-auto focus:outline-none bg-white text-black focus:bg-white border-[1px] border-[#CBD5E1] focus:border-[#CBD5E1]">
                     </div>
                 </fieldset>
                 <div class="flex gap-9">
                     <!-- <div class="flex items-center gap-2">
                            <button class="Bag">Bag</button>
                            <img src="{{ asset('static/website/images/Vector.png') }}" alt="">
                        </div> -->
                     <div class="tp-menu-bar text-end">
                         <button id="toggleSidebar"><i class="fal fa-bars"></i></button>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 {{-- navbar mobile parent sidebar --}}
 <aside id="sidebar" style="z-index: 4000;"
     class="hidden w-60 h-[2000px] top-[-20px] right-0 p-6 bg-white rounded-tl-3xl dark:text-gray-100 mt-20 z-50 mx-auto justify-center fixed">
     <nav class="text-sm">
         <div class="tp-menu-bar text-start mt-[-10px] mb-[40px]">
             <button id="closeSidebar" class="hidden"><i class="fal fa-bars text-black text-lg"></i></button>
         </div>
         <img style="width: auto; height: 90px" src="{{ asset(@$setting->firstWhere('key', 'logo')->value) }}"
             alt="{{ @$setting->firstWhere('key', 'meta_description')->value }}">

         <div class="pt-12">
             {{-- @foreach ($menu_navbar as $menu_2)
                 <div class="{{ $menu == $menu_2->title ? 'active-link' : '' }}">
                     <div
                         class="flex items-center py-2 outline-none cursor-pointer text-sm font-semibold tracki uppercase text-gray-400 dropdown-toggle">
                         <a href="{{ $menu_2->link }}">{{ $menu_2->title }}</a>
                         <span class="ml-1">
                             @if (isset($submenus[$menu_2->id]))
                                 <i class="fas fa-chevron-down"></i>
                             @endif
                         </span>
                     </div>

                     @if (isset($submenus[$menu_2->id]))
                         <div class="dropdown-menu px-4 pb-1 text-gray-400"
                             style="display: none;">
                             @foreach ($submenus[$menu_2->id] as $submenu)
                                 <div class=" flex flex-col space-y-4 text-gray-400 text-sm">
                                     <a rel="noopener noreferrer"
                                         href="{{ $submenu->link }}">{{ $submenu->title }}</a>
                                 </div>
                             @endforeach
                         </div>
                     @endif
                 </div>
             @endforeach --}}
         </div>
     </nav>
 </aside>
