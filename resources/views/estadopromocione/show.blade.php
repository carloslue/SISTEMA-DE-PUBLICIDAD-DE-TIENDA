@extends('layouts.app')

@section('template_title')
    {{ $estadopromocione->name ?? "{{ __('Show') Estadopromocione" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Estadopromocione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('estadopromociones.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $estadopromocione->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
