@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Producto
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <center>
                <div class="col-md-4">
                    @includeif('partials.errors')
                    <div class="card card-default">
                        <div class="card-header">
                            <span class="card-title">{{ __('Nuevo') }} Producto</span>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('productos.store') }}" role="form"
                                enctype="multipart/form-data">
                                @csrf
                                @include('producto.form')
                            </form>
                        </div>
                    </div>
                </div>
            </center>
        </div>
    </section>
@endsection
