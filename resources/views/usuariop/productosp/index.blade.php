@extends('layouts.app')

@section('template_title')
    Producto
@endsection

@section('content')
    <h1>
        <marquee behavior="smooth   " direction="right"><b>NUESTROS PRODUCTOS </b></marquee>
    </h1>
    <div class="contenedor">

        <div class="row">
            @foreach ($productos as $producto)
                <div class="tarjeta col-md-3">
                    <img src="{{ asset('imagenestienda/' . $producto->imagen) }}" alt=" {{ $producto->imagen }}" height="35%"
                        width="100%">
                    <p><B>PRODUCTO:</B> {{ $producto->nombre }}</p>
                    <p><B>DESCRIPCION:</B>{{ $producto->descripcion }}</p>
                    <p><B>PRECIO:</B> ${{ $producto->precio }}.00</p>
                    <p><B>CATEGORIA:</B> {{ $producto->descripcion_categoria }}</p>
                    <p><B>PROMOCION:</B> {{ $producto->estado }}</p>
                    <p><B>PRECIO DE PROMOCION:</B> {{ $producto->Precio_promocion }}</p>
                    <center>

                        <a class="boton btn btn-sm" href="{{ route('productosC.show', $producto->id) }}"><i
                                class="fa fa-fw fa-eye"></i>
                            {{ __('VER MAS DETALLE') }}</a>

                    </center>
                </div>
            @endforeach
        </div>
    @endsection
    <style>
        .contenedor {
            background-color: #ffffff;
            padding: 1%;
        }

        .tarjeta {
            background-color: #ffffff;
            border-radius: 10px;
            color: #132D46;

        }

        .boton {
            background-color: #132D46;
        }
    </style>
