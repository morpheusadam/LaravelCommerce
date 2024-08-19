@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">ویرایش دسته‌بندی پست</h5>
    <div class="card-body">
      <form method="post" action="{{route('post-category.update',$postCategory->id)}}">
        @csrf 
        @method('PATCH')
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">عنوان</label>
          <input id="inputTitle" type="text" name="title" placeholder="عنوان را وارد کنید"  value="{{$postCategory->title}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="status" class="col-form-label">وضعیت</label>
          <select name="status" class="form-control">
            <option value="active" {{(($postCategory->status=='active') ? 'selected' : '')}}>فعال</option>
            <option value="inactive" {{(($postCategory->status=='inactive') ? 'selected' : '')}}>غیرفعال</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">به‌روزرسانی</button>
        </div>
      </form>
    </div>
</div>

@endsection