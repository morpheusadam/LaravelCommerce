@extends('backend.layouts.master')

@section('main-content')
 <!-- مثال DataTales -->
 <div class="card shadow mb-4">
     <div class="row">
         <div class="col-md-12">
            @include('backend.layouts.notification')
         </div>
     </div>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">لیست محصولات</h6>
      <a href="{{route('product.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="افزودن کاربر"><i class="fas fa-plus"></i> افزودن محصول</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($products)>0)
        <table class="table table-bordered" id="product-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>شماره</th>
              <th>عنوان</th>
              <th>دسته‌بندی</th>
              <th>ویژه است</th>
              <th>قیمت</th>
              <th>تخفیف</th>
              <th>اندازه</th>
              <th>شرایط</th>
              <th>برند</th>
              <th>موجودی</th>
              <th>عکس</th>
              <th>وضعیت</th>
              <th>عملیات</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>شماره</th>
              <th>عنوان</th>
              <th>دسته‌بندی</th>
              <th>ویژه است</th>
              <th>قیمت</th>
              <th>تخفیف</th>
              <th>اندازه</th>
              <th>شرایط</th>
              <th>برند</th>
              <th>موجودی</th>
              <th>عکس</th>
              <th>وضعیت</th>
              <th>عملیات</th>
            </tr>
          </tfoot>
          <tbody>

            @foreach($products as $product)
            @php
            $sub_cat_info=DB::table('categories')->select('title')->where('id',$product->child_cat_id)->first();
            $brand_info=DB::table('brands')->select('title')->where('id',$product->brand_id)->first();
            @endphp
              <tr>
                  <td>{{$product->id}}</td>
                  <td>{{$product->title}}</td>
                  <td>{{$product->cat_info['title']}}
                    <sub>
                        {{$sub_cat_info->title ?? ''}}
                    </sub>
                  </td>
                  <td>{{(($product->is_featured==1)? 'بله': 'خیر')}}</td>
                  <td>Rs. {{$product->price}} /-</td>
                  <td>  {{$product->discount}}% تخفیف</td>
                  <td>{{$product->size}}</td>
                  <td>{{$product->condition}}</td>
                  <td> {{ucfirst($brand_info->title ?? '')}}</td>
                  <td>
                    @if($product->stock>0)
                    <span class="badge badge-primary">{{$product->stock}}</span>
                    @else
                    <span class="badge badge-danger">{{$product->stock}}</span>
                    @endif
                  </td>
                  <td>
                      @if($product->photo)
                          @php
                            $photo=explode(',',$product->photo);
                          @endphp
                          <img src="{{$photo[0]}}" class="img-fluid zoom" style="max-width:80px" alt="{{$product->photo}}">
                      @else
                          <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid" style="max-width:80px" alt="avatar.png">
                      @endif
                  </td>
                  <td>
                      @if($product->status=='active')
                          <span class="badge badge-success">{{$product->status}}</span>
                      @else
                          <span class="badge badge-warning">{{$product->status}}</span>
                      @endif
                  </td>
                  <td>
                      <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="ویرایش" data-placement="bottom"><i class="fas fa-edit"></i></a>
                  <form method="POST" action="{{route('product.destroy',[$product->id])}}">
                    @csrf
                    @method('delete')
                        <button class="btn btn-danger btn-sm dltBtn" data-id={{$product->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="حذف"><i class="fas fa-trash-alt"></i></button>
                      </form>
                  </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <span style="float:right">{{$products->links()}}</span>
        @else
          <h6 class="text-center">هیچ محصولی یافت نشد!!! لطفاً محصول ایجاد کنید</h6>
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
      .zoom {
        transition: transform .2s; /* انیمیشن */
      }

      .zoom:hover {
        transform: scale(5);
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

      $('#product-dataTable').DataTable( {
        "scrollX": false,
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[10,11,12]
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