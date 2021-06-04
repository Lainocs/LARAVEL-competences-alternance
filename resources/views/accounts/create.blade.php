@extends('layouts.layout')

@section('main')
    @if($errors->any())
        <div style="background: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="main-form">
        <div class="p-4">
            <h1>Créer un compte</h1>
        </div>

        {!! Form::open([
        'route' => 'accounts.store',
        'method' => 'POST'
    ]) !!}

        <div>
            {!! Form::label('firstname', 'Firstname') !!}
            {!! Form::text('firstname') !!}
        </div>

        <br>
        <br>

        <div>
            {!! Form::label('lastname', 'Lastname') !!}
            {!! Form::text('lastname') !!}
        </div>

        <br>
        <br>

        <div>
            {!! Form::label('email', 'Email') !!}
            {!! Form::text('email') !!}
        </div>

        <br>
        <br>

        <div>
            {!! Form::label('phone', 'Phone') !!}
            {!! Form::tel('phone') !!}
        </div>

        <br>
        <br>

        <div>
            {!! Form::label('address', 'Address') !!}
            {!! Form::text('address') !!}
        </div>

        <br>
        <br>

        <div>
            {!! Form::label('zipcode', 'ZipCode') !!}
            {!! Form::text('zipcode') !!}
        </div>

        <br>
        <br>

        <div>
            {!! Form::label('city', 'City') !!}
            {!! Form::select('city',[]) !!}
        </div>

        <br>
        <br>

        {!! Form::hidden('region',"", ['id' => 'region']) !!}

        <br>
        <br>

        {!! Form::submit('Create') !!}

        {!! Form::close() !!}
    </div>

@endsection
