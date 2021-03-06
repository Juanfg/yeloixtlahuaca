@extends('layouts.sidebar')

@section('title', 'Integrantes')

@section('content')

@if (session('deleted'))
    <div class="alert alert-warning">
        <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('deleted') }}
    </div>
@endif
@if (session('failDeleted'))
    <div class="alert alert-danger">
        <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('failDeleted') }}
    </div>
@endif
@if (session('message'))
    <div class = "alert alert-success" class = "close">
        <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('message') }}
    </div>
@endif

<div class="col-lg-12">
	<h2>Integrantes</h2>
	<p> En esta secci&oacute;n podr&aacute;s agregar, modificar y eliminar a los integrantes de la fundaci&oacute;n</p>
	<div class="content-panel">
		<h4><i class="fa fa-angle-right"></i>Integrantes</h4>
		<section id="no-more-tables">
			<table class="table table-bordered table-striped table-condensed cf">
				<thead class="cf">
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Descripcion</th>
						<th>Foto</th>
						<th>Accion</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($integrantes as $integrante)
					<tr>
						<td data-title="ID"> {{ $integrante->id }}</td>
						<td data-title="Nombre"><a href="{{ route('integrantes.show', [ $integrante->id]) }}"> {{ $integrante->nombre }} </td>
						<td data-title="Descripcion"> {{ $integrante->descripcion }} </td>
						<td dtaa-title="Foto"><img src="{{Storage::url($integrante->foto)}}" width=80 height=80 class="img-responsive col-xs-offset-3 img-thumbnail"></td>
						<td data-title="Accion">
							<div class="col-xs-2 col-xs-offset-3">
								{!! Form::open( [ 'method' => 'GET', 'route'=>['integrantes.edit', $integrante->id]]) !!}
								<button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
								{!! Form::close() !!}
							</div>
							<div class="col-xs-2">
								{!! Form::open( [ 'method' => 'DELETE', 'route'=>['integrantes.destroy', $integrante->id]]) !!}
								<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
								{!! Form::close() !!}
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table> 
		</section>
	</div><!-- /content-panel -->
	<br>
	<div align="right">
		{!! Form::open( [ 'method' => 'GET', 'route' =>['integrantes.create']]) !!}
		{!! Form::submit('Agregar un integrante', ['class' => 'btn btn-success']) !!}
		{!! Form::close() !!}
	</div>
</div>

@endsection