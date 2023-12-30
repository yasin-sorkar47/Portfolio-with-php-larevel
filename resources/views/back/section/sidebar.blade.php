<!-- BEGIN: Sidebar -->
<div class="sidebar-wrapper group">
  <div id="bodyOverlay" class="w-screen h-screen fixed top-0 bg-slate-900 bg-opacity-50 backdrop-blur-sm z-10 hidden"></div>
  <div class="logo-segment">
      <a class="flex items-center" href="index.html">
          <img src="{{ asset('back/assets/images/logo/logo-c.svg')}}" class="black_logo" alt="logo" />
          <img src="{{ asset('back/assets/images/logo/logo-c-white.svg')}}" class="white_logo" alt="logo" />
          <span class="ltr:ml-3 rtl:mr-3 text-xl font-Inter font-bold text-slate-900 dark:text-white">DashCode</span>
      </a>
      <!-- Sidebar Type Button -->
      <div id="sidebar_type" class="cursor-pointer text-slate-900 dark:text-white text-lg">
          <span class="sidebarDotIcon extend-icon cursor-pointer text-slate-900 dark:text-white text-2xl">
              <div
                  class="h-4 w-4 border-[1.5px] border-slate-900 dark:border-slate-700 rounded-full transition-all duration-150 ring-2 ring-inset ring-offset-4 ring-black-900 dark:ring-slate-400 bg-slate-900 dark:bg-slate-400 dark:ring-offset-slate-700"
              ></div>
          </span>
          <span class="sidebarDotIcon collapsed-icon cursor-pointer text-slate-900 dark:text-white text-2xl">
              <div class="h-4 w-4 border-[1.5px] border-slate-900 dark:border-slate-700 rounded-full transition-all duration-150"></div>
          </span>
      </div>
      <button class="sidebarCloseIcon text-2xl">
          <iconify-icon class="text-slate-900 dark:text-slate-200" icon="clarity:window-close-line"></iconify-icon>
      </button>
  </div>
  <div id="nav_shadow" class="nav_shadow h-[60px] absolute top-[80px] nav-shadow z-[1] w-full transition-all duration-200 pointer-events-none opacity-0"></div>
  <div class="sidebar-menus bg-white dark:bg-slate-800 py-2 px-4 h-[calc(100%-80px)] overflow-y-auto z-50" id="sidebar_menus">
      <ul class="sidebar-menu">
          <li class="sidebar-menu-title">MENU</li>
          <li class="">
              <a href="#" class="navItem">
                  <span class="flex items-center">
                      <iconify-icon class="nav-icon" icon="heroicons-outline:home"></iconify-icon>
                      <span>Dashboard</span>
                  </span>
              </a>
          </li>
          <!-- Pages Area -->
          <li class="sidebar-menu-title">PAGES</li>

          <!-- Apps -->
          <li class="{{ Route::is('back.appearance.*') ? 'active' : '' }}">
              <a href="javascript:void(0)" class="navItem">
                  <span class="flex items-center">
                      <iconify-icon class=" nav-icon" icon="heroicons-outline:view-boards"></iconify-icon>
                      <span>Apps</span>
                  </span>
                  <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
              </a>
              <ul class="sidebar-submenu">
                  <li class="{{ Route::is('back.appearance.create') ? 'active' : '' }}">
                      <a href="{{ route('back.appearance.create')}}">Appearance</a>
                  </li>
                  <li class="{{ Route::is('back.social.create') ? 'active' : '' }}">
                      <a href="{{route('back.social.create')}}">Create Social</a>
                  </li>
              </ul>
          </li>

          <!-- Slider -->
          <li class="{{ Route::is('back.slider.*') ? 'active' : '' }}">
              <a href="javascript:void(0)" class="navItem">
                  <span class="flex items-center">
                      <iconify-icon class=" nav-icon" icon="heroicons-outline:view-boards"></iconify-icon>
                      <span>Sliders</span>
                  </span>
                  <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
              </a>
              <ul class="sidebar-submenu">
                  <li>
                      <a href="{{ route('back.slider.index')}}">All Sliders</a>
                  </li>
                  <li>
                      <a href="{{route('back.slider.create')}}">Create Slider</a>
                  </li>
              </ul>
          </li>

          {{-- About --}}
          <li class="{{ Route::is('back.about.*') ? 'active' : '' }}">
              <a href="javascript:void(0)" class="navItem">
                  <span class="flex items-center">
                      <iconify-icon class=" nav-icon" icon="heroicons-outline:view-boards"></iconify-icon>
                      <span>About</span>
                  </span>
                  <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
              </a>
              <ul class="sidebar-submenu">
                  <li>
                      <a href="{{ route('back.about.index')}}">All About</a>
                  </li>
                  <li>
                      <a href="{{route('back.about.create')}}">Create About</a>
                  </li>
              </ul>
          </li>

          {{-- Service --}}
          <li class="{{ Route::is('back.service.*') ? 'active' : '' }}">
              <a href="javascript:void(0)" class="navItem">
                  <span class="flex items-center">
                      <iconify-icon class=" nav-icon" icon="heroicons-outline:view-boards"></iconify-icon>
                      <span>Services</span>
                  </span>
                  <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
              </a>
              <ul class="sidebar-submenu">
                  <li>
                      <a href="{{ route('back.service.index')}}">All Services</a>
                  </li>
                  <li>
                      <a href="{{route('back.service.create')}}">Create Services</a>
                  </li>
              </ul>
          </li>

          {{-- Category --}}
          <li class="{{ Route::is('back.category.*') ? 'active' : '' }}">
              <a href="javascript:void(0)" class="navItem">
                  <span class="flex items-center">
                      <iconify-icon class=" nav-icon" icon="heroicons-outline:view-boards"></iconify-icon>
                      <span>Category</span>
                  </span>
                  <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
              </a>
              <ul class="sidebar-submenu">
                  <li>
                      <a href="{{ route('back.category.index')}}">All Categories</a>
                  </li>
                  <li>
                      <a href="{{route('back.category.create')}}">Create Category</a>
                  </li>
              </ul>
          </li>


          {{-- Blog --}}
          <li class="{{ Route::is('back.blog.*') ? 'active' : '' }}">
              <a href="javascript:void(0)" class="navItem">
                  <span class="flex items-center">
                      <iconify-icon class=" nav-icon" icon="heroicons-outline:view-boards"></iconify-icon>
                      <span>Blog</span>
                  </span>
                  <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
              </a>
              <ul class="sidebar-submenu">
                  <li>
                      <a href="{{ route('back.blog.index')}}">All Blogs</a>
                  </li>
                  <li>
                      <a href="{{route('back.blog.create')}}">Create Blog</a>
                  </li>
              </ul>
          </li>

          {{-- User --}}
          <li class="{{ Route::is('back.user.*') ? 'active' : '' }}">
              <a href="javascript:void(0)" class="navItem">
                  <span class="flex items-center">
                      <iconify-icon class=" nav-icon" icon="heroicons-outline:view-boards"></iconify-icon>
                      <span>User</span>
                  </span>
                  <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
              </a>
              <ul class="sidebar-submenu">
                  <li>
                      <a href="{{ route('back.user.index')}}">All Users</a>
                  </li>
                  <li>
                      <a href="{{route('back.user.create')}}">Create User</a>
                  </li>
              </ul>
          </li>
          
          {{-- Address --}}
          <li class="{{ Route::is('back.address.*') ? 'active' : '' }}">
              <a href="javascript:void(0)" class="navItem">
                  <span class="flex items-center">
                      <iconify-icon class=" nav-icon" icon="heroicons-outline:view-boards"></iconify-icon>
                      <span>Address</span>
                  </span>
                  <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
              </a>
              <ul class="sidebar-submenu">
                  <li>
                      <a href="{{ route('back.address.index')}}">All Address</a>
                  </li>
                  <li>
                      <a href="{{route('back.address.create')}}">Create Address</a>
                  </li>
              </ul>
          </li>


          {{-- Portfolio --}}
          <li class="{{ Route::is('back.portfolio.*') ? 'active' : '' }}">
              <a href="javascript:void(0)" class="navItem">
                  <span class="flex items-center">
                      <iconify-icon class=" nav-icon" icon="heroicons-outline:view-boards"></iconify-icon>
                      <span>Porfolio</span>
                  </span>
                  <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
              </a>
              <ul class="sidebar-submenu">
                  <li>
                      <a href="{{ route('back.portfolio.index')}}">All Porfolio</a>
                  </li>
                  <li>
                      <a href="{{route('back.portfolio.create')}}">Create Porfolio</a>
                  </li>
              </ul>
          </li>


          {{-- Technology --}}
          <li class="{{ Route::is('back.portfolio.*') ? 'active' : '' }}">
              <a href="javascript:void(0)" class="navItem">
                  <span class="flex items-center">
                      <iconify-icon class=" nav-icon" icon="heroicons-outline:view-boards"></iconify-icon>
                      <span>Technology</span>
                  </span>
                  <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
              </a>
              <ul class="sidebar-submenu">
                  <li>
                      <a href="{{ route('back.technology.create')}}">All Technology</a>
                  </li>
                  <li>
                      <a href="{{route('back.technology.create')}}">Create Technology</a>
                  </li>
              </ul>
          </li>
          
      </ul>

      <div class="bg-slate-900 mb-10 mt-24 p-4 relative text-center rounded-2xl text-white" id="sidebar_bottom_wizard">
        <img src="{{ asset('back/assets/images/svg/rabit.svg')}}" alt="" class="mx-auto relative -mt-[73px]">
        <div class="max-w-[160px] mx-auto mt-6">
          <div class="widget-title font-Inter mb-1">Unlimited Access</div>
          <div class="text-xs font-light font-Inter">
            Upgrade your system to business plan
          </div>
        </div>
        <div class="mt-6">
          <button class="bg-white hover:bg-opacity-80 text-slate-900 text-sm font-Inter rounded-md w-full block py-2 font-medium">
            Upgrade
          </button>
        </div>
      </div>

  </div>
</div>
<!-- End: Sidebar -->

