@extends('backend.layouts.master')
@section('title','فروشگاه اینترنتی || همه اعلان‌ها')
@section('main-content')
<div class="card">
    <div class="row">
        <div class="col-md-12">
           @include('backend.layouts.notification')
        </div>
    </div>
  <h5 class="card-header">اعلان‌ها</h5>
  <div class="card-body">
    @if(count(Auth::user()->Notifications)>0)
    <table class="table  table-hover admin-table" id="notification-dataTable">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">زمان</th>
          <th scope="col">عنوان</th>
          <th scope="col">عملیات</th>
        </tr>
      </thead>
      <tbody>
        @foreach ( Auth::user()->Notifications as $notification)

        <tr class="@if($notification->unread()) bg-light border-left-light @else border-left-success @endif">
          <td scope="row">{{$loop->index +1}}</td>
          <td>{{$notification->created_at->format('F d, Y h:i A')}}</td>
          <td>{{$notification->data['title']}}</td>
          <td>
            <a href="{{route('admin.notification', $notification->id) }}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="مشاهده" data-placement="bottom"><i class="fas fa-eye"></i></a>
            <form method="POST" action="{{ route('notification.delete', $notification->id) }}">
              @csrf
              @method('delete')
                  <button class="btn btn-danger btn-sm dltBtn" data-id={{$notification->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="حذف"><i class="fas fa-trash-alt"></i></button>
            </form>
          </td>
        </tr>

        @endforeach
      </tbody>
    </table>
    @else
      <h2>اعلان‌ها خالی است!</h2>
    @endif
  </div>
</div>
@endsection
@push('styles')
  <link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />

@endpush
@push('scripts')
  <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <!-- اسکریپت‌های سفارشی سطح صفحه -->
  <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
  <script>

      $('#notification-dataTable').DataTable( {
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[3]
                }
            ]
        } );

        // هشدار شیرین

        function deleteData(id){

        }
  </script>
  <script>
    $(document).ready(function(){
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
        $('.dltBtn').click(function(e){
          var form=$(this).closest('form');
            var dataID=$(this).data('id');
            // alert(dataID);
            e.preventDefault();
            swal({
                  title: "آیا مطمئن هستید؟",
                  text: "پس از حذف، قادر به بازیابی این داده نخواهید بود!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              })
              .then((willDelete) => {
                  if (willDelete) {
                    form.submit();
                  } else {
                      swal("داده‌های شما امن است!");
                  }
              });
        })
    })
  </script>
@endpush