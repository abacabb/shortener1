@extends('base')

@section('content')
    <div class="container">
        <div class="starter-template">
            <h1>Сократить ссылку</h1>
            <p class="lead"><a href="{{ route('list') }}">Список</a> всех сокращенных ссылок</p>
        </div>

        <form class="form-short-link" id="short-url-form">
            <div class="alert alert-danger hidden-hidden" role="alert"></div>
            <div class="alert alert-success hidden-hidden" role="alert"></div>
            <input type="text" class="form-control short-url" placeholder="Ссылка" required="" autocomplete="off">
            <br>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Сформировать</button>
        </form>


    </div><!-- /.container -->
@endsection