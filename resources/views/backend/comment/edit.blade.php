@extends('backend.layouts.master')

@section('title','ویرایش نظر')

@section('main-content')
<div class="card">
  <h5 class="card-header">ویرایش نظر</h5>
  <div class="card-body">
    <form action="{{route('comment.update',$comment->id)}}" method="POST">
      @csrf
      @method('PATCH')
      <div class="form-group">
        <label for="name">توسط:</label>
        <input type="text" disabled class="form-control" value="{{$comment->user_info->name}}">
      </div>
      <div class="form-group">
        <label for="comment">نظر</label>
      <textarea name="comment" id="" cols="20" rows="10" class="form-control">{{$comment->comment}}</textarea>
      </div>
      <div class="form-group">
        <label for="status">وضعیت :</label>
        <select name="status" id="" class="form-control">
          <option value="">--انتخاب وضعیت--</option>
          <option value="active" {{(($comment->status=='active')? 'selected' : '')}}>فعال</option>
          <option value="inactive" {{(($comment->status=='inactive')? 'selected' : '')}}>غیرفعال</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">به‌روزرسانی</button>
    </form>
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