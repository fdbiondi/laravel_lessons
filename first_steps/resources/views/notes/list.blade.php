@extends('layout')

@section('content')
    <h2>Notes</h2>
    <p>
        <a href="{{ url('notes/create') }}">Add a note</a>
    </p>
    <ul class="list-group">
        @foreach($notes as $note)
            <li class="list-group-item">
                {{--@if(strlen($note->note)>50)
                    {{ substr($note->note , 0 , 50) }}...
                @else--}}
                    <span class="label label-info">{{ $note->category->name }}</span>
                    {{ $note->note }}
                {{--@endif--}}
            </li>
        @endforeach
    </ul>
    {!! $notes->render() !!}

@endsection
