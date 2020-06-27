@extends('layouts.twits.layouts')

@section('content')

<div class="container">
    <div class="col-md-12">
        <form action="{{ route('addTwit') }}" method="post">
            @csrf

            <input type="hidden" name="name" value="anonymous">

            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group" class="form-control">
                    <select class="form-control" name="category">
                        <option value="">Выберите категорию</option>
                        <option value="1">Общие</option>
                        <option value="2">Ковид</option>
                        <option value="3">Шутки</option>
                    </select>
                </div>
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                    <textarea class="form-control" name="text" placeholder="Введите сообщение"></textarea>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group text-right">
                    <button type="submit" class="btn btn-info">
                        Отправить
                    </buttom>
                </div>
            </div>
        </form>
    </div>
</div>

<twits-component></twits-component>

@endsection