@extends('backend.layouts.master')
@section('title','فروشگاه اینترنتی || صفحه نظرات')
@section('main-content')
 <!-- مثال DataTales -->
 <div class="card shadow mb-4">
     <div class="row">
         <div class="col-md-12">
            @include('backend.layouts.notification')
         </div>
     </div>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">لیست نظرات</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($comments)>0)
        <table class="table table-bordered" id="order-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>شماره</th>
              <th>نویسنده</th>
              <th>عنوان پست</th>
              <th>پیام</th>
              <th>تاریخ</th>
              <th>وضعیت</th>
              <th>عملیات</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>شماره</th>
              <th>نویسنده</th>
              <th>عنوان پست</th>
              <th>پیام</th>
              <th>تاریخ</th>
              <th>وضعیت</th>
              <th>عملیات</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->user_info['name']}}</td>
                    <td>{{$comment->post->title}}</td>
                    <td>{{$comment->comment}}</td>
                    <td>{{$comment->created_at->format('M d D, Y g: i a')}}</td>
                    <td>
                        @if($comment->status=='active')
                          <span class="badge badge-success">{{$comment->status}}</span>
                        @else
                          <span class="badge badge-warning">{{$comment->status}}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('comment.edit',$comment->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="ویرایش" data-placement="bottom"><i class="fas fa-edit"></i></a>
                        <form method="POST" action="{{route('comment.destroy',[$comment->id])}}">
                          @csrf
                          @method('delete')
                              <button class="btn btn-danger btn-sm dltBtn" data-id={{$comment->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="حذف"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
        <span style="float:right">{{$comments->links()}}</span>
        @else
          <h6 class="text-center">هیچ نظری یافت نشد!!!</h6>
        @endif
      </div>
    </div>
</div>
@endsection

@push('styles')
  <link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <style>
      div.dataTables_wrapper div.dataTables_paginate{
          display: none;
      }
  </style>
@endpush

@push('scripts')

  <!-- افزونه‌های سطح صفحه -->
  <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <!-- اسکریپت‌های سفارشی سطح صفحه -->
  <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
  <script>

      $('#order-dataTable').DataTable( {
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[5,6]
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