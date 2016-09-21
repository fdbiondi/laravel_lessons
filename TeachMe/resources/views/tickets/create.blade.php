@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Nueva solicitud</h1>
                @include('partials.errors')
                {!! Form::open(['route' => 'tickets.store', 'method' => 'POST']) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'Titulo') !!}
                        {!! Form::textarea('title', null, [
                            'rows' => 2,
                            'class' => 'form-control',
                            'placeholder' => 'Describe brevemente de qué quieres que se trata el tutorial']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('link', 'Enlace') !!}
                        {!! Form::text('link', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Comparte un tutorial o recurso colocando una URL (opcional)']) !!}
                    </div>
                    <p>
                        <button type="submit" class="btn btn-primary">
                            Enviar solicitud
                        </button>
                    </p>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection