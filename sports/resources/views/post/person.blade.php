@extends('layouts.app')

@section('content')



<div class="containter text-center">
    <h1>{{ $user->name }}さんのページ</h1>
</div>


<div class="container">
  <div class="container_title">
      <h1 class="text-center">{{ $sports->sport }}</h1>
  </div>


  <div>
<div class="container m-auto">
  <div class="">
    <div class="card m-auto" style="max-width: 700px; max-height: 500px;">
      <div class="row">
        <div class="col-md-4">
          <img src="{{ Gravatar::src($user->email, 500) }}" class="card-img rounded-circle ml-2" alt="">
          <div class="card-text text-center">{{ $user->introduce }}</div>
        </div>

   
        <div class="col-md-7 offset-md-1">
          <div class="card-header text-center">{{ $sports->caption }}</div>
            <div class="row justify-content-around">
                <div class="card-text">場所:{{ $sports->place }}</div>
                <div class="card-text">値段:{{ $sports->cost }}円</div>
            </div> 
            <br>
            <div class="card-header text-left">
                コメント
            </div> 
            <div class="">
                <div class="card-text">{{ $sports->comment }}</div>
            </div>
        </div>
      </div>
  

        @if(Auth::id() == $user->id)
            <div class="text-center">
            <a class="btn btn-primary btn-sm mb-1" href="/home/{{ $sports->sport }}/edit/{{ $user->id }}">投稿編集</a>
            </div>
    
            <div class="text-center">
            <form action="/home/{sport}/delete/{id}">
            {{ csrf_field() }}
                <div class="destroy">
                    <button type="submit" class="btn btn-danger">投稿削除</button>
                </div>
            </form>
            </div>
        @else

            @if($reactions->status === 0)
                <p>マッチしました</p>
            @elseif($reactions->status === 1)
                <button class="btn btn-danger btn-sm mb-1">リクエスト送信済み</button>
            @else
                <a href="/like/{{ $user->id }}/{{ Auth::user()->id }}/{{ $reactions->status }}" class="btn btn-primary btn-sm mb-1">参加リクエスト</a>
            @endif 
           

           
        @endif 
    </div>   
  </div>
</div>



@endsection