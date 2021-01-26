@extends('layouts.app')

@section('content')
    @if(Auth::check())
        {{Auth::user()->name}}
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>人生の岐路を共有しよう！</h1>
                {!! link_to_route('signup.get', '登録', [], ['class' => 'btn btn-lg btn-success']) !!}
            </div>
        </div>
    @endif
@endsection