@extends('layouts.twits.layouts')

@section('content')

<add-twit-component :csrf="{{ json_encode(['token' => csrf_token()]) }}"></add-twit-component>

@endsection