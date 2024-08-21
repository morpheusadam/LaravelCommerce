@foreach($comments as $comment)
{{-- {{dd($comments)}} --}}
@php $dep = $depth-1; @endphp
<div class="custom-display-comment" @if($comment->parent_id != null) style="margin-right:40px;" @endif>
    <div class="custom-card p-3 mt-2">
        <div class="d-flex justify-content-between align-items-center">
            <div class="custom-user d-flex flex-row align-items-center">
                @if($comment->user_info['photo'])
                    <img src="{{$comment->user_info['photo']}}" width="45" class="custom-user-img rounded-circle mr-2" alt="#">
                @else 
                    <img src="{{asset('backend/img/avatar.png')}}" width="45" class="custom-user-img rounded-circle mr-2" alt="">
                @endif
                <span class="custom-user-name px-2"><small class="font-weight-bold text-primary">{{$comment->user_info['name']}}</small></span>
            </div>
            <small>{{$comment->created_at->diffForHumans()}}</small>
        </div>
        <div class="custom-comment-text text-center mt-2">
            <h6 class="font-weight-bold">{{$comment->comment}}</h6>
        </div>
        @if($dep)
        <div class="custom-action d-flex justify-content-between mt-2 align-items-center">
            <div class="custom-reply px-4">
                <small class="custom-action-text">حذف</small>
                <span class="custom-dots"></span>
                <small class="custom-action-text">پاسخ</small>
                <span class="custom-dots"></span>
                <small class="custom-action-text">ترجمه</small>
            </div>
            <div class="custom-icons align-items-center">
                <i class="fa fa-check-circle-o custom-check-icon text-primary"></i>
            </div>
        </div>
        @endif
    </div>
    @include('frontend.theme2.pages.comment', ['comments' => $comment->replies, 'depth' => $dep])
</div>    
@endforeach

<style>
body {
    background-color: #f7f6f6;
}

.custom-card {
    border: none;
    box-shadow: 5px 6px 6px 2px #e9ecef;
    border-radius: 4px;
}

.custom-dots {
    height: 6px; /* 50% larger */
    width: 6px; /* 50% larger */
    margin-bottom: 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
}

.custom-badge {
    padding: 7px;
    padding-right: 9px;
    padding-left: 16px;
    box-shadow: 5px 6px 6px 2px #e9ecef;
}

.custom-user-img {
    margin-top: 4px;
}

.custom-user-name {
    margin-right: 10px;
    padding-right: 10px;
    padding-left: 10px;
    font-size: 1.2em; /* 20% larger */
}

.custom-check-icon {
    font-size: 25.5px; /* 50% larger */
    color: #c3bfbf;
    top: 1px;
    position: relative;
    margin-left: 3px;
}

.custom-form-check-input {
    margin-top: 6px;
    margin-right: -24px !important;
    cursor: pointer;
}

.custom-form-check-input:focus {
    box-shadow: none;
}

.custom-icons i {
    margin-left: 8px;
}

.custom-reply {
    margin-right: 12px;
}

.custom-reply small {
    color: #b7b4b4;
}

.custom-reply small:hover {
    color: green;
    cursor: pointer;
}

.custom-comment-text {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100px; /* Adjust height as needed */
    margin-top: 10px;
    text-align: center;
}

.custom-action-text {
    font-size: 0.7em; /* 30% smaller */
}
</style>