@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Diario</div>

                <div class="card-body">
                        <tareas-component></tareas-component>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Personajes</div>

                <div class="card-body">

                    <listar-personajes-component></listar-personajes-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
