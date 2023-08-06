<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('imagen') }}
            <br>
            <img src="{{ asset('imagenestienda/' . $producto->imagen) }}" alt=" {{ $producto->imagen }}" height="100px"
                width="100px">
            <br>
            <br>
            <!-- Label con el icono -->
            <label for="archivo" style="cursor: pointer;">
                <img src="../../imagenes/subirimg.png" alt="img" height="3%" width="3%"> Selecciona una
                imagen
            </label>
            <!-- Input oculto para subir archivo -->
            <input type="file" id="archivo" name="imagen" accept="image/*" style="display: none;">
            <br>
            <br>

        </div>
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $producto->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $producto->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Precio') }}
            {{ Form::number('precio', $producto->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
            {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Categoria') }}
            <select name="categoriaid" id="" class="form-control">
                @foreach ($categorias as $categoria)
                    @if ($categoria->id == $producto->categoriaid)
                        <option value="{{ $categoria->id }}" selected>{{ $categoria->descripcion_categoria }}</option>
                    @else
                        <option value="{{ $categoria->id }}">{{ $categoria->descripcion_categoria }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{ Form::label('Estado de Promociones') }}
            <select name="estadopromocionid" id="" class="form-control">
                @foreach ($estadopromociones as $estadopromocione)
                    @if ($estadopromocione->id == $producto->estadopromocionid)
                        <option value="{{ $estadopromocione->id }}" selected>{{ $estadopromocione->estado }}</option>
                    @else
                        <option value="{{ $estadopromocione->id }}">{{ $estadopromocione->estado }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{ Form::label('Precio_promocion') }}
            {{ Form::number('Precio_promocion', $producto->Precio_promocion, ['class' => 'form-control' . ($errors->has('Precio_promocion') ? ' is-invalid' : ''), 'placeholder' => 'Precio Promocion']) }}
            {!! $errors->first('Precio_promocion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Actualizar informacion') }}</button>
    </div>
</div>
