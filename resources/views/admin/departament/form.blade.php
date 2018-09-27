<div class="form-group">
	{{ Form::label('name', 'Nombre *') }}
	{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) }}
</div>

 <a class="btn btn-danger" href="{{ route('departamento.index') }}">Cancelar</a>
 {{ Form::submit('Enviar', ['class' => 'btn btn-primary']) }}
