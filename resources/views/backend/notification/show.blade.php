<div id="notifications">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
        <!-- شمارنده - اعلان‌ها -->
        <span class="badge badge-danger badge-counter">
            @if(count(Auth::user()->unreadNotifications) >5 )<span data-count="5" class="count">5+</span>
            @else 
                <span class="count" data-count="{{count(Auth::user()->unreadNotifications)}}">{{count(Auth::user()->unreadNotifications)}}</span>
            @endif
        </span>
      </a>
      <!-- Dropdown - اعلان‌ها -->
      <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
          مرکز اعلان‌ها
        </h6>
        @foreach(Auth::user()->unreadNotifications as $notification)
        <a class="dropdown-item d-flex align-items-center" target="_blank" href="{{route('admin.notification',$notification->id)}}">
            <div class="mr-3">
                <div class="icon-circle bg-primary">
                    @if(isset($notification->data['fas']))
                        <i class="fas {{$notification->data['fas']}} text-white"></i>
                    @else
                        <i class="fas fa-info-circle text-white"></i> <!-- Default icon if 'fas' is not set -->
                    @endif
                </div>
            </div>
            <div>
                <div class="small text-gray-500">{{$notification->created_at->format('F d, Y h:i A')}}</div>
                @if(isset($notification->data['title']))
                    <span class="@if($notification->unread()) font-weight-bold @else small text-gray-500 @endif">{{$notification->data['title']}}</span>
                @else
                    <span class="small text-gray-500">No title</span> <!-- Default text if 'title' is not set -->
                @endif
            </div>
        </a>
        @if($loop->index+1==5)
            @php
                break;
            @endphp
        @endif
    @endforeach

        <a class="dropdown-item text-center small text-gray-500" href="{{route('all.notification')}}">نمایش همه اعلان‌ها</a>
      </div>
</div>