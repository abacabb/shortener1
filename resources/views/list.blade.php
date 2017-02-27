@extends('base')

@section('content')
    <table class="table">
        <tr>
            <th>#</th>
            <th>Original</th>
            <th>Short link</th>
            <th>Code</th>
            <th>Count</th>
        </tr>
    @foreach($links as $link)
            <tr>
                <td>{{ $link->id }}</td>
                <td>{{ $link->original_url }}</td>
                @php($href = route('expand_short_url', ['code' => $link->code]))
                <td><a href="{!! $href !!}" target="_blank">{!! $href !!}</a></td>
                <td>{{ $link->code }}</td>
                <td>{{ $link->count }}</td>
            </tr>
    @endforeach
    </table>

@endsection