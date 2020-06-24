@extends('layouts.home.home')


@section('content')

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Category</th>
            <th>Username</th>
            <th>Content</th>
            <th>CreatedAt</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($twits as $twit)
        <tr>
            <td>{{ $twit->Id }}</td>
            <td>{{ $twit->CategoryId }}
            <td>{{ $twit->Username }}</td>
            <td>{{ $twit->Content }}</td>
            <td>{{ $twit->CreatedAt }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection