@extends('layouts.app')

@section('content')
<div class="container contenedor">
    <h1 ><center><b>SISTEMA DE PUBLICIDAD ELNUEVO</b></center></h1>
    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
    <img src="imagenestienda/bienvenidos.gif" alt="img" height="100%" width="100%">     
                                            

</div>
@endsection

<style>
    .contenedor{
        background-color : #000000;
    }
 
</style>