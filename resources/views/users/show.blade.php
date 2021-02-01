@extends('layouts.app')

@section('content')
        {{--ここにインデックスを挿入する--}}
        <h1>{{$user->name}}の岐路</h1>
        @if (count($kiros) > 0)
            <table class="table table-bordered ">
                <thead class="table-secondary">
                    <tr>
                        <th class="text-center"　style="width:20%">岐路</th>
                        <th class="text-center" style="width:80%">詳細</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kiros as $kiro)
                    <tr>
                        <td class="text-center">{{ $kiro->kiro }}</td>
                        <td >{{ $kiro->detail }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

@endsection