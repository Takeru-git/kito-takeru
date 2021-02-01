@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
        <table class="table table-bordered ">
            <thead class="table-secondary">
                <tr>
                    <th class="text-center"　style="width:5%">id</th></th>
                    <th class="text-center"　style="width:25%">岐路</th>
                    <th class="text-center" style="width:70%">詳細</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">{{ $kiro->id }}</td>
                    <td class="text-center">{{ $kiro->kiro }}</td>
                    <td >{{ $kiro->detail }}</td>
                </tr>
            </tbody>
        </table>
        {!! link_to_route('kiros.edit', '編集',['kiro' => $kiro->id], ['class' => 'btn btn-success mb-1']) !!}
        {!! Form::model($kiro, ['route' => ['kiros.destroy', $kiro->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@endsection