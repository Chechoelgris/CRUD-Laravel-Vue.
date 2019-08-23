@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card text-white bg-dark">
                <div class="card-header">Diario</div>

                <div class="card-body">
                        <tareas-component></tareas-component>

                </div>
            </div>
        </div>
        <div class="col-md-6">

                    <listar-personajes-component></listar-personajes-component>

        </div>
    </div>
</div>
@endsection
