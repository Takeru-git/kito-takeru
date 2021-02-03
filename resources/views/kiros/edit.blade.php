@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
    <div class="row">
        <div class="col-6">
            {!! Form::model($kiro,['route'=>['kiros.update',$kiro->id],'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('kiro','岐路') !!}
                    {!! Form::text('kiro',null,['class' =>'form-control']) !!}
                    {!! Form::label('detail','詳細') !!}
                    {!! Form::text('detail',null,['class' =>'form-control']) !!}
                </div>
                
                {!! Form::submit('更新',['class'=>'btn btn-success']) !!}
            
            {!! Form::close() !!}
        </div>
    </div>
@endsection