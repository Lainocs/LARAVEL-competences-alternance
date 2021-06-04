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
            <h1>Modifier un compte</h1>
        </div>

        {!! Form::open([
            'route' => ['accounts.update', $account->id],
            'method' => 'PUT',
        ]) !!}

        <div>
            {!! Form::label('firstname', 'Firstname') !!}
            {!! Form::text('firstname', $account->firstname) !!}
        </div>

        <br>
        <br>

        <div>
            {!! Form::label('lastname', 'Lastname') !!}
            {!! Form::text('lastname', $account->lastname) !!}
        </div>

        <br>
        <br>

        <div>
            {!! Form::label('email', 'Email') !!}
            {!! Form::text('email', $account->email) !!}
        </div>

        <br>
        <br>

        <div>
            {!! Form::label('phone', 'Phone') !!}
            {!! Form::tel('phone', $account->phone) !!}
        </div>

        <br>
        <br>

        <div>
            {!! Form::label('address', 'Address') !!}
            {!! Form::text('address', $account->address) !!}
        </div>

        <br>
        <br>

        <div>
            {!! Form::label('zipcode', 'ZipCode') !!}
            {!! Form::text('zipcode', $account->zipcode) !!}
        </div>

        <br>
        <br>

        <div>
            {!! Form::label('city', 'City') !!}
            {!! Form::select('city',[$account->city]) !!}
        </div>

        <br>
        <br>

        {!! Form::hidden('region',$account->region, ['id' => 'region'] ) !!}

        <br>
        <br>

        {!! Form::submit('Modifier') !!}

        {!! Form::close() !!}
    </div>

@endsection
