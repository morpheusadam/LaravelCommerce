<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="direction: rtl; right: 0; left: auto;">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin')}}">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">مدیر</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="{{route('admin')}}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>داشبورد</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
      بنر
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <!-- Nav Item - Charts -->
  <li class="nav-item">
      <a class="nav-link" href="{{route('file-manager')}}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>مدیریت رسانه</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-image"></i>
      <span>بنرها</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">گزینه‌های بنر:</h6>
        <a class="collapse-item" href="{{route('banner.index')}}">بنرها</a>
        <a class="collapse-item" href="{{route('banner.create')}}">افزودن بنر</a>
      </div>
    </div>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
          فروشگاه
      </div>

  <!-- Categories -->
  <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#categoryCollapse" aria-expanded="true" aria-controls="categoryCollapse">
        <i class="fas fa-sitemap"></i>
        <span>دسته‌بندی</span>
      </a>
      <div id="categoryCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">گزینه‌های دسته‌بندی:</h6>
          <a class="collapse-item" href="{{route('category.index')}}">دسته‌بندی</a>
          <a class="collapse-item" href="{{route('category.create')}}">افزودن دسته‌بندی</a>
        </div>
      </div>
  </li>
  {{-- Products --}}
  <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#productCollapse" aria-expanded="true" aria-controls="productCollapse">
        <i class="fas fa-cubes"></i>
        <span>محصولات</span>
      </a>
      <div id="productCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">گزینه‌های محصول:</h6>
          <a class="collapse-item" href="{{route('product.index')}}">محصولات</a>
          <a class="collapse-item" href="{{route('product.create')}}">افزودن محصول</a>
        </div>
      </div>
  </li>

  
<!-- Orders -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#orderCollapse" aria-expanded="true" aria-controls="orderCollapse">
      <i class="fas fa-shopping-cart"></i>
      <span>سفارش‌ها</span>
  </a>
  <div id="orderCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">گزینه‌های سفارش:</h6>
          <a class="collapse-item" href="{{route('order.index')}}">سفارش‌ها</a>
          <a class="collapse-item" href="{{route('order.create')}}">افزودن سفارش</a>
      </div>
  </div>
</li>


  {{-- Brands --}}
  <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#brandCollapse" aria-expanded="true" aria-controls="brandCollapse">
        <i class="fas fa-table"></i>
        <span>برندها</span>
      </a>
      <div id="brandCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">گزینه‌های برند:</h6>
          <a class="collapse-item" href="{{route('brand.index')}}">برندها</a>
          <a class="collapse-item" href="{{route('brand.create')}}">افزودن برند</a>
        </div>
      </div>
  </li>

  <!-- Reviews -->
  <li class="nav-item">
      <a class="nav-link" href="{{route('review.index')}}">
          <i class="fas fa-comments"></i>
          <span>نظرات</span></a>
  </li>
  

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    پست‌ها
  </div>

  <!-- Posts -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#postCollapse" aria-expanded="true" aria-controls="postCollapse">
      <i class="fas fa-fw fa-folder"></i>
      <span>پست‌ها</span>
    </a>
    <div id="postCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">گزینه‌های پست:</h6>
        <a class="collapse-item" href="{{route('post.index')}}">پست‌ها</a>
        <a class="collapse-item" href="{{route('post.create')}}">افزودن پست</a>
      </div>
    </div>
  </li>

   <!-- Category -->
   <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#postCategoryCollapse" aria-expanded="true" aria-controls="postCategoryCollapse">
        <i class="fas fa-sitemap fa-folder"></i>
        <span>دسته‌بندی</span>
      </a>
      <div id="postCategoryCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">گزینه‌های دسته‌بندی:</h6>
          <a class="collapse-item" href="{{route('post-category.index')}}">دسته‌بندی</ا>
          <a class="collapse-item" href="{{route('post-category.create')}}">افزودن دسته‌بندی</a>
        </div>
      </div>
    </li>

    <!-- Tags -->
  <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tagCollapse" aria-expanded="true" aria-controls="tagCollapse">
          <i class="fas fa-tags fa-folder"></i>
          <span>برچسب‌ها</span>
      </a>
      <div id="tagCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">گزینه‌های برچسب:</h6>
          <a class="collapse-item" href="{{route('post-tag.index')}}">برچسب‌ها</a>
          <a class="collapse-item" href="{{route('post-tag.create')}}">افزودن برچسب</a>
          </div>
      </div>
  </li>

    <!-- Comments -->
    <li class="nav-item">
      <a class="nav-link" href="{{route('comment.index')}}">
          <i class="fas fa-comments fa-chart-area"></i>
          <span>نظرات</span>
      </a>
    </li>


  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
   <!-- Heading -->
  <div class="sidebar-heading">
      تنظیمات عمومی
  </div>
  <li class="nav-item">
    <a class="nav-link" href="{{route('coupon.index')}}">
        <i class="fas fa-table"></i>
        <span>کوپن</span></a>
  </li>
   <!-- Users -->
   <li class="nav-item">
      <a class="nav-link" href="{{route('users.index')}}">
          <i class="fas fa-users"></i>
          <span>کاربران</span></ا>
  </li>
   <!-- General settings -->
   <li class="nav-item">
      <a class="nav-link" href="{{route('settings')}}">
          <i class="fas fa-cog"></i>
          <span>تنظیمات</span></ا>
  </li>

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>