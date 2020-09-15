@extends('template')

@section('main')
	<div id="anak">
		<h2>Edit Anak</h2>

{!! Form::model($anak, ['method' => 'PATCH', 'action' => ['AnakController@update', $anak->id]]) !!}

	
	@include('anak.form', ['submitButtonText' => 'Update'])
	{!! Form::close() !!}
</div>
	@stop
	@section('footer')
	@stop
