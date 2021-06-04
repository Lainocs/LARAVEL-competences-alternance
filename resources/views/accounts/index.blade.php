@extends('layouts.layout')

@section('main')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="p-4">Accounts</h1>
        <a href="{{ route('accounts.create') }}">Add new account</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Lastname</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($account as $acc)
            <tr class="p-2">
                <th scope="row">{{ $acc->id }}</th>
                <td>{{ $acc->lastname }}</td>
                <td>{{ $acc->email }}</td>
                <td>{{ $acc->address }}</td>
                <td><a href="{{ route('accounts.edit', ['account' => $acc->id]) }}">Modifier</a></td>
                <td><a id="delete" style="cursor: pointer; color: red" onclick="confirmSupr('{{ route('updateStatus',$acc->id) }}')">Supprimer</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
