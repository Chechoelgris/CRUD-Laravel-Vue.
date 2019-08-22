@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Listado de Personajes</div>

                        <div class="card-body">
                            <listar-personajes-component></listar-personajes-component>

                        </div>
                    </div>
            </div>
        </div>
    </div
@endsection
