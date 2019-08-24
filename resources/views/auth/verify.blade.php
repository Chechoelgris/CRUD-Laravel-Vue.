@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu dirección de correo electrónico') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Hemos enviado un nuevo link de verificación a tu correo.') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar, por favor revisar su correo electrónico con el link de confirmación.') }}
                    {{ __('Si no recibiste el correo electrónico de verificación') }}, <a href="{{ route('verification.resend') }}">{{ __('Reenviar link') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
