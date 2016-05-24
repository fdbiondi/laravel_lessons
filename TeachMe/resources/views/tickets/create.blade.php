@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>
                    Nueva solicitud
                    {!! Form::open(['route' => 'tickets.store', 'method' => 'POST']) !!}
                        <p>
                            <button type="submit" class="btn btn-primary">
                                Enviar solicitud
                            </button>
                        </p>
                    {!! Form::close() !!}
                </h1>
            </div>
        </div>
    </div>
@endsection