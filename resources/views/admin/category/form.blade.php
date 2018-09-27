<div class="form-group">
	{{ Form::label('name', 'Nombre *') }}
	{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) }}
</div>
<div class="form-group">
	{{ Form::label('image', 'Imagen *') }}<br>
	{{ Form::file('image', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('departament_id', 'Departamento') }}
	{{ Form::select('departament_id', $select, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un departamento']) }}
</div>

 <a class="btn btn-danger" href="{{ route('categoria.index') }}">Cancelar</a>
 {{ Form::submit('Enviar', ['class' => 'btn btn-primary']) }}
