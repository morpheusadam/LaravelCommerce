<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style="direction: rtl;">

  <!-- Sidebar Toggle (Topbar) -->
  <button id="sidebarToggleTop" class="btn btn-link rounded-circle ml-3">
    <i class="fa fa-bars"></i>
  </button>
  <a href="{{route('storage.link')}}" class="btn btn-outline-warning btn-sm ml-3">
      لینک ذخیره‌سازی
  </a>
  <a href="{{route('cache.clear')}}" class="btn btn-outline-danger btn-sm ml-3">
    پاک کردن کش
  </a>

  <!-- Topbar Navbar -->
  <ul class="navbar-nav mr-auto">

    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
    <li class="nav-item dropdown no-arrow d-sm-none">
      <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-search fa-fw"></i>
      </a>
      <!-- Dropdown - Messages -->
      <div class="dropdown-menu dropdown-menu-left p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
        <form class="form-inline ml-auto w-100 navbar-search">
          <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="جستجو برای..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li>

    {{-- Home page --}}
    <li class="nav-item dropdown no-arrow mx-1">
      <a class="nav-link dropdown-toggle" href="{{route('home')}}" target="_blank" data-toggle="tooltip" data-placement="bottom" title="خانه" role="button">
        <i class="fas fa-home fa-fw"></i>
      </a>
    </li>

    <!-- Nav Item - Alerts -->
    <li class="nav-item dropdown no-arrow mx-1">
     @include('backend.notification.show')
    </li>

    <!-- Nav Item - Messages -->
    <li class="nav-item dropdown no-arrow mx-1" id="messageT" data-url="{{route('messages.five')}}">
      @include('backend.message.message')
    </li>

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="ml-2 d-none d-lg-inline text-gray-600 small">{{Auth()->user()->name}}</span>
        @if(Auth()->user()->photo)
          <img class="img-profile rounded-circle" src="{{Auth()->user()->photo}}">
        @else
          <img class="img-profile rounded-circle" src="{{asset('backend/img/avatar.png')}}">
        @endif
      </a>
      <!-- Dropdown - User Information -->
      <div class="dropdown-menu dropdown-menu-left shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="{{route('admin-profile')}}">
          <i class="fas fa-user fa-sm fa-fw ml-2 text-gray-400"></i>
          پروفایل
        </a>
        <a class="dropdown-item" href="{{route('change.password.form')}}">
          <i class="fas fa-key fa-sm fa-fw ml-2 text-gray-400"></i>
          تغییر رمز عبور
        </a>
        <a class="dropdown-item" href="{{route('settings')}}">
          <i class="fas fa-cogs fa-sm fa-fw ml-2 text-gray-400"></i>
          تنظیمات
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
               <i class="fas fa-sign-out-alt fa-sm fa-fw ml-2 text-gray-400"></i> {{ __('خروج') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
      </div>
    </li>

  </ul>

</nav>