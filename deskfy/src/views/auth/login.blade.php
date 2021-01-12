@extends('deskfy::auth.layouts.app')
@section('content')

    {!! Form::open(['url' => route('login')]) !!}
        {!! Form::label('email', 'E-mail') !!}
        {!! Form::email('email', null) !!}
        {!! Form::label('password', 'Senha') !!}
        {!! Form::password('password') !!}

        <hr>
        {!! Form::submit('Entrar') !!}
    {!! Form::close() !!}

@endsection