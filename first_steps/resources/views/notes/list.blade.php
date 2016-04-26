@extends('layout')

@section('content')
    <h2>Notes</h2>
    <p>
        <a href="{{ url('notes/create') }}">Add a note</a>
    </p>
    <ul class="list-group">
        @foreach($notes as $note)
            <li class="list-group-item">
                    <span class="label label-info">
                        @if($note->category)
                            {{ $note->category->name }}
                        @else
                            Others
                        @endif
                        </span>
                @if(strlen($note->note)>50)
                    {{ substr($note->note , 0 , 50) }}...
                @else
                    {{ $note->note }}
                @endif
                <a href="{{ url('view/'.$note->id) }}"><span class="label label-primary">View note</span></a>
            </li>
        @endforeach
    </ul>
    {!! $notes->render() !!}

@endsection
