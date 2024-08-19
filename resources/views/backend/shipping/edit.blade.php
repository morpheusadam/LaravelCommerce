@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">ویرایش حمل و نقل</h5>
    <div class="card-body">
      <form method="post" action="{{route('shipping.update',$shipping->id)}}">
        @csrf 
        @method('PATCH')
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">نوع <span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="type" placeholder="نوع را وارد کنید"  value="{{$shipping->type}}" class="form-control">
        @error('title')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>     
        <div class="form-group">
          <label for="price" class="col-form-label">قیمت <span class="text-danger">*</span></label>
        <input id="price" type="number" name="price" placeholder="قیمت را وارد کنید"  value="{{$shipping->price}}" class="form-control">
        @error('price')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>        
        <div class="form-group">
          <label for="status" class="col-form-label">وضعیت <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
            <option value="active" {{(($shipping->status=='active') ? 'selected' : '')}}>فعال</option>
            <option value="inactive" {{(($shipping->status=='inactive') ? 'selected' : '')}}>غیرفعال</option>
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

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
    $('#description').summernote({
      placeholder: "توضیحات کوتاه بنویسید.....",
        tabsize: 2,
        height: 150
    });
    });
</script>
@endpush