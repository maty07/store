<div class="form-group">
	{{ Form::label('name', 'Nombre *') }}
	{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) }}
</div>
<div class="form-group">
	{{ Form::label('path', 'Imagen *') }}<br>
	{{ Form::file('path', null, ['class' => 'form-control']) }}
</div>
 <a class="btn btn-danger" href="{{ route('carrusel.index') }}">Cancelar</a>
 {{ Form::submit('Enviar', ['class' => 'btn btn-primary']) }}
