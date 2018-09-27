<div class="form-group">
	{{ Form::label('name', 'Nombre *') }}
	{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) }}
</div>
<div class="form-group">
	{{ Form::label('description', 'Descripción *') }}
	{{ Form::textarea('description', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('image', 'Imagen *') }}<br>
	{{ Form::file('image', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('price', 'Precio *') }}
	{{ Form::number('price', null, ['class' => 'form-control', 'min' => 0]) }}
</div>
<div class="form-group">
	{{ Form::label('quantity', 'Stock *') }}
	{{ Form::number('quantity', null, ['class' => 'form-control', 'min' => 0]) }}
</div>
<div class="form-group">
	{{ Form::label('category_id', 'Categoria *') }}
	{{ Form::select('category_id', $select_cat, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una categoria']) }}
</div>
<div class="form-group">
	{{ Form::label('genre_id', 'Género') }}
	{{ Form::select('genre_id', $select_gen, null,  ['class' => 'form-control', 'placeholder' => 'Seleccione Género']) }}
</div>

 <a class="btn btn-danger" href="{{ route('producto.index') }}">Cancelar</a>
 {{ Form::submit('Enviar', ['class' => 'btn btn-primary']) }}
