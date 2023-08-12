<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('imagen') }}
            <br>
            Selecciona una
            imagen
            <label for="archivo" style="cursor: pointer;">
                <img src="../../imagenes/subirimagen.jpg" alt="img" height="15%" width="15%">
            </label>
            <!-- Input oculto para subir archivo -->
            <input type="file" id="archivo" name="imagen" accept="image/*" style="display: none;">
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
                    <option value="{{ $categoria->id }}">{{ $categoria->descripcion_categoria }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{ Form::label('Estado de Promociones') }}
            <select name="estadopromocionid" id="" class="form-control">
                @foreach ($estadopromociones as $estadopromocione)
                    <option value="{{ $estadopromocione->id }}">{{ $estadopromocione->estado }}</option>
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
        <button type="submit" class="btn btn-primary">{{ __('Registrar Producto') }}</button>
    </div>
</div>
