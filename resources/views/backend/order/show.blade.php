@extends('backend.layouts.master')

@section('title','جزئیات سفارش')

@section('main-content')
<div class="card">
<h5 class="card-header">سفارش       <a href="{{route('order.pdf',$order->id)}}" class=" btn btn-sm btn-primary shadow-sm float-right"><i class="fas fa-download fa-sm text-white-50"></i> تولید PDF</a>
  </h5>
  <div class="card-body">
    @if($order)
    <table class="table table-striped table-hover">
      <thead>
        <tr>
            <th>شماره</th>
            <th>شماره سفارش</th>
            <th>نام</th>
            <th>ایمیل</th>
            <th>تعداد</th>
            <th>هزینه</th>
            <th>مبلغ کل</th>
            <th>وضعیت</th>
            <th>عملیات</th>
        </tr>
      </thead>
      <tbody>
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->order_number}}</td>
            <td>{{$order->first_name}} {{$order->last_name}}</td>
            <td>{{$order->email}}</td>
            <td>{{$order->quantity}}</td>
            <td>${{$order->shipping->price}}</td>
            <td>${{number_format($order->total_amount,2)}}</td>
            <td>
                @if($order->status=='new')
                  <span class="badge badge-primary">{{$order->status}}</span>
                @elseif($order->status=='process')
                  <span class="badge badge-warning">{{$order->status}}</span>
                @elseif($order->status=='delivered')
                  <span class="badge badge-success">{{$order->status}}</span>
                @else
                  <span class="badge badge-danger">{{$order->status}}</span>
                @endif
            </td>
            <td>
                <a href="{{route('order.edit',$order->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="ویرایش" data-placement="bottom"><i class="fas fa-edit"></i></a>
                <form method="POST" action="{{route('order.destroy',[$order->id])}}">
                  @csrf
                  @method('delete')
                      <button class="btn btn-danger btn-sm dltBtn" data-id={{$order->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="حذف"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>

        </tr>
      </tbody>
    </table>

    <section class="confirmation_part section_padding">
      <div class="order_boxes">
        <div class="row">
          <div class="col-lg-6 col-lx-4">
            <div class="order-info">
              <h4 class="text-center pb-4">اطلاعات سفارش</h4>
              <table class="table">
                    <tr class="">
                        <td>شماره سفارش</td>
                        <td> : {{$order->order_number}}</td>
                    </tr>
                    <tr>
                        <td>تاریخ سفارش</td>
                        <td> : {{$order->created_at->format('D d M, Y')}} در {{$order->created_at->format('g : i a')}} </td>
                    </tr>
                    <tr>
                        <td>تعداد</td>
                        <td> : {{$order->quantity}}</td>
                    </tr>
                    <tr>
                        <td>وضعیت سفارش</td>
                        <td> : {{$order->status}}</td>
                    </tr>
                    <tr>
                        <td>هزینه حمل و نقل</td>
                        <td> : $ {{$order->shipping->price}}</td>
                    </tr>
                    <tr>
                      <td>کوپن</td>
                      <td> : $ {{number_format($order->coupon,2)}}</td>
                    </tr>
                    <tr>
                        <td>مبلغ کل</td>
                        <td> : $ {{number_format($order->total_amount,2)}}</td>
                    </tr>
                    <tr>
                        <td>روش پرداخت</td>
                        <td> : @if($order->payment_method=='cod') پرداخت در محل @else پی‌پال @endif</td>
                    </tr>
                    <tr>
                        <td>وضعیت پرداخت</td>
                        <td> : {{$order->payment_status}}</td>
                    </tr>
              </table>
            </div>
          </div>

          <div class="col-lg-6 col-lx-4">
            <div class="shipping-info">
              <h4 class="text-center pb-4">اطلاعات حمل و نقل</h4>
              <table class="table">
                    <tr class="">
                        <td>نام کامل</td>
                        <td> : {{$order->first_name}} {{$order->last_name}}</td>
                    </tr>
                    <tr>
                        <td>ایمیل</td>
                        <td> : {{$order->email}}</td>
                    </tr>
                    <tr>
                        <td>شماره تلفن</td>
                        <td> : {{$order->phone}}</td>
                    </tr>
                    <tr>
                        <td>آدرس</td>
                        <td> : {{$order->address1}}, {{$order->address2}}</td>
                    </tr>
                    <tr>
                        <td>کشور</td>
                        <td> : {{$order->country}}</td>
                    </tr>
                    <tr>
                        <td>کد پستی</td>
                        <td> : {{$order->post_code}}</td>
                    </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endif

  </div>
</div>
@endsection

@push('styles')
<style>
    .order-info,.shipping-info{
        background:#ECECEC;
        padding:20px;
    }
    .order-info h4,.shipping-info h4{
        text-decoration: underline;
    }

</style>
@endpush