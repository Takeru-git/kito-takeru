@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
            <h1>人生の岐路を共有しよう！</h1>
            {!! link_to_route('signup.get', '登録', [], ['class' => 'btn btn-lg btn-success']) !!}
        </div>
    </div>
@endsection