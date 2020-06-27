@extends('layouts.twits.layouts')

@section('content')

<div class="container">
    <div class="col-md-12">
        <form action="{{ route('add-twit-form') }}" method="post">
            @csrf
            <input type="text" name="user">
            <select name="category">
                <option value="">Категория</option>
                <option value="1">Общие</option>
                <option value="2">Ковид</option>
                <option value="3">Шутки</option>
            </select>
            <input type="text" name="text">
            <input type="submit" value="Отправить">
        </form>
    </div>
</div>

<twits-component></twits-component>

@endsection