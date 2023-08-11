@extends('layouts.app')

@section('template_title')
    Producto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header ">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('NUESTROS PRODUCTOS') }}
                            </span>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        
                        <div class="clas row">
                            @foreach ($productos as $producto)
                            <div class="class col-md-3">
                                     <img src="{{ asset('imagenestienda/'. $producto->imagen) }}"
                                     alt=" {{ $producto->imagen }}" height="35%" width="100%">     
                                     <p><B>PRODUCTO:</B> {{ $producto->nombre }}</p>  
                                     <p><B>DESCRIPCION:</B>{{ $producto->descripcion }}</p>
                                     <p><B>PRECIO:</B> ${{ $producto->precio }}.00</p>
                                     <p><B>CATEGORIA:</B> {{ $producto->descripcion_categoria }}</p>
                                     <p><B>PROMOCION:</B> {{ $producto->estado }}</p>
                                     <p><B>PRECIO DE PROMOCION:</B> {{ $producto->Precio_promocion }}</p>
                                        <center>
                                            <form action="{{ route('productos.destroy',$producto->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary " href="{{ route('productos.show',$producto->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('VER MAS DETALLE') }}</a>      
                                            </form>
                                        </center>                    
                            </div>
                            @endforeach
                        </div>       
            </div>
        </div>
    </div>
@endsection
