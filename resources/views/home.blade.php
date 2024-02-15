@extends('master')

@section('page_title', 'Home')

@section('content')
    @if ($page_name == true)
        <h1>{{ $page_name }}</h1>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">NID Card</th>
                <th scope="col">Joined Date</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->nidcard->card_number ?? '' }}</td>
                    <td>{{ $user->created_at }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

@endsection
