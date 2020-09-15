@extends('template')

@section('main')
<div id="createanak">
	<h2>Tambah Anak</h2>

	
{!! Form::open(['url' => 'anak','files'=>true]) !!}
@include('anak.form', ['submitButtonText' => 'Simpan'])
{!! Form::close() !!}
</div>
	@stop

	@section('footer')
	
	<div id="footer">
		<p>&copy; 2020 Siswaku App</p>
	</div>
	@stop