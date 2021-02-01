@extends('layouts.app')

@section('content')
    @if(Auth::check())
        {{--ここにインデックスを挿入する--}}
        <h1>{{$user->name}}の岐路</h1>
        @if (count($kiros) > 0)
            <table class="table table-bordered ">
                <thead class="table-secondary">
                    <tr>
                        <th class="text-center"　style="width:5%">id</th></th>
                        <th class="text-center"　style="width:25%">岐路</th>
                        <th class="text-center" style="width:70%">詳細</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kiros as $kiro)
                    <tr>
                        <td class="text-center">{!! link_to_route("kiros.show", $kiro->id, ['kiro' => $kiro->id ]) !!}</td>
                        <td class="text-center">{{ $kiro->kiro }}</td>
                        <td >{{ $kiro->detail }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! link_to_route('kiros.create','新しく追加',[],['class'=>'btn btn-success']) !!}
        @endif

    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>人生の岐路を共有しよう！</h1>
                {!! link_to_route('signup.get', '登録', [], ['class' => 'btn btn-lg btn-success']) !!}
            </div>
        </div>
    @endif
@endsection