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
<td>T{{$order->shipping->price}}</td>
<td>T{{number_format($order->total_amount,2)}}</td>
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
                      <td>   {{$order->order_number}}</td>
                        <td>شماره سفارش </td>
                    </tr>
                    <tr>
                        <td>  {{$order->created_at->format('D d M, Y')}} در {{$order->created_at->format('g : i a')}} </td>

                        <td>تاریخ سفارش </td>

                    </tr>
                    <tr>
                        <td>  {{$order->quantity}}</td>

                        <td>تعداد  </td>

                    </tr>
                    <tr>
                        <td>  {{$order->status}}</td>

                        <td>وضعیت سفارش </td>

                    </tr>
                    <tr>
                        <td>  تومان {{$order->shipping->price}}</td>

                        <td>هزینه حمل و نقل  </td>

                    </tr>
                    <tr>
                      <td>  تومان {{number_format($order->coupon,2)}}</td>
                      <td>کوپن   </td>

                    </tr>
                    <tr>
                        <td>  تومان {{number_format($order->total_amount,2)}}</td>
                        <td>مبلغ کل </td>

                    </tr>
                    <tr>
                        <td>  @if($order->payment_method=='cod') پرداخت در محل @else پی‌پال @endif</td>
                        <td>روش پرداخت </td>

                      </tr>
                    <tr>
                        <td>  {{$order->payment_status}}</td>

                        <td>وضعیت پرداخت </td>

                    </tr>
              </table>
            </div>
          </div>

          <div class="col-lg-6 col-lx-4">
            <div class="shipping-info">
              <h4 class="text-center pb-4">اطلاعات حمل و نقل</h4>
              <table class="table">
                    <tr class="">
                       
                      <td>  {{$order->first_name}} {{$order->last_name}}</td>
                      <td>نام کامل</td>

                    </tr>
                    <tr>
                        <td> {{$order->email}}</td>
                        <td>ایمیل</td>

                    </tr>
                    <tr>
                        <td>  {{$order->phone}}</td>
                        <td>شماره تلفن</td>

                    </tr>
                    <tr>

                        <td>  {{$order->address1}}, {{$order->address2}}</td>
                        <td>آدرس</td>

                    </tr>
                    <tr>
                        <td>   {{$order->country}}</td>
                        <td>کشور</td>

                    </tr>
                    <tr>
                        <td>  {{$order->post_code}}</td>
                        <td>کد پستی</td>

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